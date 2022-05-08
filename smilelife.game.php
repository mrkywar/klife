<?php
 /**
  *------
  * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
  * Smile Life implementation : © Jean Portemer <jportemer@mailz.org>
  * 
  * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
  * See http://en.boardgamearena.com/#!doc/Studio for more information.
  * -----
  * 
  * smilelife.game.php
  *
  * This is the main file for your game logic.
  *
  * In this PHP file, you are going to defines the rules of the game.
  *
  */

// Build the autoloader which enables to include the file containing a class if the code has not been loaded yet
$autoloader = function($class_name) {
	$file = 'modules/classes/' . $class_name . '.php'; 
	require_once $file;
};
spl_autoload_register($autoloader);

require_once APP_GAMEMODULE_PATH.'module/table/table.game.php';

class SmileLife extends Table {
	function __construct() {
        // Your global variables labels:
        //  Here, you can assign labels to global variables you are using for this game.
        //  You can use any number of global variables with IDs between 10 and 99.
        //  If your game has options (variants), you also have to associate here a label to
        //  the corresponding ID in gameoptions.inc.php.
        // Note: afterwards, you can get/set the global variables with getGameStateValue/setGameStateInitialValue/setGameStateValue
        parent::__construct();
        
        self::initGameStateLabels(array(
            //    "my_first_global_variable" => 10,
            //    "my_second_global_variable" => 11,
            //      ...
            //    "my_first_game_variant" => 100,
            //    "my_second_game_variant" => 101,
            //      ...
			
			"choice_game_length" => OP_LENGTH
        ));
		
		// Create deck component and add a link to it in the Card class
        $this->cards = self::getNew("module.common.deck");
        $this->cards->init("card");
		
		Card::$game = $this;
	}
	
    protected function getGameName() {
		// Used for translations and stuff. Please do not modify.
        return "smilelife";
    }	

    /*
        setupNewGame:
        
        This method is called only once, when a new game is launched.
        In this method, you must setup the game according to the game rules, so that
        the game is ready to be played.
    */
    protected function setupNewGame($players, $options = array()) {		
		// Game length
		$choice_game_length = self::getGameStateValue('choice_game_length');
		
		// Modules
		// (Search values in table options instead if expansions are developed)
		$choice_modules = CH_MODULES_BASE_GAME;
	
        // Init global values with their initial values
        // TODO
			
		// Create players
		self::createPlayers($players);
		
		// Create cards in deck (directly shuffled before sending to DB, to spare memory)
		// This takes the choice of the game length which determines the ratio of the deck to be used
		$card_count = self::createShuffleddeck($choice_game_length, $choice_modules);
		
		// Give five cards to each player
		/* foreach($players as $player_id => $player) {
			for($_=0; $_<5; $_++) {
				self::drawCard($player_id);
			}
		}*/
		
		// Give all cards to one player (testing purposes)
		foreach($players as $player_id => $player) {
			for($_=0; $_<$card_count; $_++) {
				self::drawCard($player_id);
			}
			break;
		}

        // Activate first player (which is in general a good idea :) )
        $this->activeNextPlayer();

        /************ End of the game initialization *****/
    }

    /*
        getAllDatas: 
        
        Gather all informations about current game situation (visible by the current player).
        
        The method is called each time the game interface is displayed to a player, ie:
        _ when the game starts
        _ when a player refreshes the game page (F5)
    */
    protected function getAllDatas() {
        $result = array();
    
        $current_player_id = self::getCurrentPlayerId();    // !! We must only return informations visible by this player !!
    
        // Get information about players
        // Note: you can retrieve some extra field you added for "player" table in "dbmodel.sql" if you need it.
        $sql = "SELECT player_id id, player_score score FROM player";
        $result['players'] = self::getCollectionFromDb($sql);
		
        // Base reference value for card dimension
		$result['ref_card_width'] = Card::$ref_width;
		$result['ref_card_height'] = Card::$ref_height;
		
		// Cards in player hand
		$result['hand'] = self::getCardsAsObjects(self::getCardsInLocation('hand', $current_player_id));
  
        return $result;
    }

    /*
        getGameProgression:
        
        Compute and return the current game progression.
        The number returned must be an integer beween 0 (=the game just started) and
        100 (= the game is finished or almost finished).
    
        This method is called each time we are in a game state with the "updateGameProgression" property set to true 
        (see states.inc.php)
    */
    function getGameProgression() {
        // TODO: compute and return the game progression

        return 99;
    }


//////////////////////////////////////////////////////////////////////////////
//////////// Utility functions
////////////    

    /*
        General utility functions
    */
	
	// Shuffle an array using the Fisher-Yates algorithm. The array is modified in place
	// The bga_rand function is used as the RGN (best RNG function to be used according to Studio documentation)
	function FisherYatesShuffle($array_in) {
		$n = count($array_in);
		$array_out = $array_in; // Hard copy of the array
		for ($i = $n-1; $i > 0; $i--) {
			$j = bga_rand(0, $i); // Pick a random integer between 0 (included) and $i (included)
			
			// Swap $array[i] and array[j]
			$aux = $array_out[$i];
			$array_out[$i] = $array_out[$j];
			$array_out[$j] = $aux;
		}
		return $array_out;
	}
	
	// Utility for loading all classes in modules subfolder.
	// Should only be used for game setup.
	// Return the array of classes.
	function loadAllClasses() {
		$classes = [];
		$directory = dirname(__FILE__) . '/modules/classes';
		foreach (scandir($directory) as $file) {
			if (in_array($file, ['.', '..'])) {
				// Ignore this folder and parent folder
				continue;
			}
			$file_full_path = $directory . '/' . $file;
			require_once $file_full_path;
			
			$class = str_replace('.php', '', $file);
			$classes[] = $class;
		}
		return $classes;
	}
	
	/*
        Functions used to populate the database during game setup
    */
	
	// Create the players in database at the beginning of the game
	function createPlayers($players) {
		// Set the colors of the players with HTML color code
        // The default below is red/green/blue/orange/brown
        // The number of colors defined here must correspond to the maximum number of players allowed for the gams
        $gameinfos = self::getGameinfos();
        $default_colors = $gameinfos['player_colors'];
 
        // Note: if you added some extra field on "player" table in the database (dbmodel.sql), you can initialize it there.
		// First part of the sql: column structure
        $sql = "INSERT INTO player (player_id, player_color, player_canal, player_name, player_avatar) VALUES ";
		
		// Second part of the sql: create one row per player in an array
        $values = [];
        foreach($players as $player_id => $player) {
            $player_color = array_shift($default_colors);
			$player_canal = $player['player_canal'];
			$player_name = addslashes($player['player_name']); // addslashes: escape special caracters
			$player_avatar = addslashes($player['player_avatar']);
            $values[] = "($player_id, '$player_color', '$player_canal', '$player_name', '$player_avatar')";
        }
		
		// Join the array using commas and complete the sql request
        $sql .= implode($values, ',');
		
		// Effectively create players in DB, reattribute colors if needed
        self::DbQuery($sql);
        self::reattributeColorsBasedOnPreferences($players, $gameinfos['player_colors']);
        self::reloadPlayersBasicInfos();
	}
	
	// Browse classes and determine how many copies of each card need to be created
	function getCardSetToCreate($played_modules) {
		$classes = self::loadAllClasses();
		$card_count = 0;
		foreach($classes as $class) {
			// Search for the COUNT class constant, which is only defined on final classes
			if (!defined($class . '::COUNT') || !in_array($class::MODULE, $played_modules) || defined($class . '::REMOVE_IN_MODULE') && in_array($class::REMOVE_IN_MODULE, $played_modules)) {
				// This is not an instanciable class or this card is not included in the current set of chosen modules
				continue;
			}
			// We have to make the specified number of copies for that class
			$card_count += $class::COUNT;
			$instanciable_classes_with_count[$class] = $class::COUNT;
		}
		return ['instanciable_classes_with_count' => $instanciable_classes_with_count, 'total_card_count' => $card_count];
	}
	
	// Create deck using information of the set to create as well as the positions to be used
	function createdeck($instanciable_classes_with_count, $positions, $played_card_count) {
		// First part of the sql: column structure
		$sql = "INSERT INTO card (class, owner_id, location, position, discarder_id, is_flipped, is_rotated) VALUES ";
		
		// Second part of the sql: browse all classes for card and find the material, that are:
		// - Classes which are instanciable (final keyword and COUNT constant indicating the number of copies)
		// - Classes which are present in the current set of expansions (use of MODULE and REMOVE_IN_MODULE constants)
		// Create one row per card in an array
		$values = [];
		$i = -1;
		
		// Browse the set of cards to be created
		foreach($instanciable_classes_with_count as $class => $count) {
			// We have to make potentially the specified number of copies for that class
			for ($_=0; $_<$count; $_++) {
				$i++;
				$position = $positions[$i];
				if ($position >= $played_card_count) {
					// This card is in the truncated part of the deck (option game length reduced)
					// Do not include it in the game
					continue;
				}
				// This card must effectively be created
				$values[] = "('$class', 0, 'deck', $position, 0, TRUE, FALSE)";
			}
		}
		// We have kept only cards with position between 0 and $played_card_count-1
		
		// Join the array using commas and complete the sql request
        $sql .= implode($values, ',');
		
		// Effectively create card in DB
        self::DbQuery($sql);
	}
	
	// Compute the number of cards that will be used on game
	function getModulesToBePlayedBasedOnChoice($choice_modules) {
		switch($choice_modules) {
		case CH_MODULES_BASE_GAME;
			return [BASE_GAME];
		}
	}
	
	function computeCardCountBasedOnChoice($full_deck_card_count, $choice_game_length) {
		switch($choice_game_length) {
		case CH_LENGTH_ALL:
			return $full_deck_card_count;
		case CH_LENGTH_QUARTER:
			$ratio = 1/4;
			break;
		case CH_LENGTH_THIRD:
			$ratio = 1/3;
			break;
		case CH_LENGTH_HALF:
			$ratio = 1/2;
			break;
		case CH_LENGTH_TWO_THIRDS:
			$ratio = 2/3;
			break;
		case CH_LENGTH_THREE_QUARTERS:
			$ratio = 3/4;
			break;
		}
		return (int)round($full_deck_card_count * $ratio);
	}
	
	// Create the cards in deck in database at the beginning of the game
	function createShuffleddeck($choice_game_length, $choice_modules) {
		// Determine the set informations to create
		$played_modules = self::getModulesToBePlayedBasedOnChoice($choice_modules);
		$set_to_create = self::getCardSetToCreate($played_modules);
		
		// Get the count of cards in the full deck and the number of cards to be kept for that game
		$full_deck_card_count = $set_to_create['total_card_count'];
		$played_card_count = self::computeCardCountBasedOnChoice($full_deck_card_count, $choice_game_length);
		
		// Create and shuffle the array of positions to be used (effectively making a shuffled deck afterwards)
		$incremental_positions = range(0, $full_deck_card_count-1); // Array [0, 1, 2, ..., $full_deck_card_count - 1]
		$random_positions = self::FisherYatesShuffle($incremental_positions); // Randomize positions
		
		// Create the deck
		self::createdeck($set_to_create['instanciable_classes_with_count'], $random_positions, $played_card_count);
		
		return $played_card_count;
	}
	
	/*
	    Functions used to manipulate the database
	*/
	function PHPBoolToSQLBool($bool) {
		return $bool ? 'TRUE' : 'FALSE';
	}
	
	function getCardOnTop($location) {
		$sql = "SELECT id, class, owner_id, location, position, discarder_id, is_flipped, is_rotated
		FROM card
		WHERE location = '$location' AND position = (SELECT MAX(position) FROM card WHERE location = '$location')";
		
		return self::getObjectFromDB($sql);
	}
	
	function moveCard($card_id, $location_to, $position_to, $new_owner_id = 0, $flip = false, $rotate = false) {
		$is_flipped = self::PHPBoolToSQLBool($flip);
		$is_rotated = self::PHPBoolToSQLBool($rotate);
		
		$sql = "UPDATE card
		SET location = '$location_to', position = $position_to, owner_id = $new_owner_id, is_flipped = $is_flipped, is_rotated = $is_rotated, discarder_id = 0
		WHERE id = $card_id";
		
		self::DbQuery($sql);
	}
	
	function getCardCountInLocation($location, $owner_id = 0) {
		$sql = "SELECT COUNT(*)
		FROM card
		WHERE location = '$location' AND owner_id = $owner_id";
		
		return self::getUniqueValueFromDb($sql);
	}
	
	function getCardsInLocation($location, $owner_id = 0) {
		$sql = "SELECT id, class, owner_id, location, position, discarder_id, is_flipped, is_rotated
		FROM card
		WHERE location = '$location' AND owner_id = $owner_id";
		
		return self::getObjectListFromDB($sql);
	}
	
	function drawCard($player_id) {
		$cards_in_hand_count = self::getCardCountInLocation('hand', $player_id);
		$card = self::getCardOnTop('deck');
		self::moveCard($card['id'], 'hand', $cards_in_hand_count, $player_id);
	}
	
	/*
		Function to manage relationship between row in Db and matching card Object
	*/
	function getCardAsObject($card_in_db) {
		return new $card_in_db['class']($card_in_db);
	}
	
	function getCardsAsObjects($cards_in_db) {
		$cards = [];
		foreach($cards_in_db as $card_in_db) {
			$cards[] = self::getCardAsObject($card_in_db);
		}
		return $cards;
	}
	
//////////////////////////////////////////////////////////////////////////////
//////////// Player actions
//////////// 

    /*
        Each time a player is doing some game action, one of the methods below is called.
        (note: each method below must match an input method in smilelife.action.php)
    */

    /*
    
    Example:

    function playCard($card_id) {
        // Check that this is the player's turn and that it is a "possible action" at this game state (see states.inc.php)
        self::checkAction( 'playCard' ); 
        
        $player_id = self::getActivePlayerId();
        
        // Add your game logic to play a card there 
        ...
        
        // Notify all players about the card played
        self::notifyAllPlayers("cardPlayed", clienttranslate( '${player_name} plays ${card_name}' ), array(
            'player_id' => $player_id,
            'player_name' => self::getActivePlayerName(),
            'card_name' => $card_name,
            'card_id' => $card_id
        ));
    }
    
    */

    
//////////////////////////////////////////////////////////////////////////////
//////////// Game state arguments
////////////

    /*
        Here, you can create methods defined as "game state arguments" (see "args" property in states.inc.php).
        These methods function is to return some additional information that is specific to the current
        game state.
    */

    /*
    
    Example for game state "MyGameState":
    
    function argMyGameState() {
        // Get some values from the current game situation in database...
    
        // return values:
        return array(
            'variable1' => $value1,
            'variable2' => $value2,
            ...
        );
    }    
    */

//////////////////////////////////////////////////////////////////////////////
//////////// Game state actions
////////////

    /*
        Here, you can create methods defined as "game state actions" (see "action" property in states.inc.php).
        The action method of state X is called everytime the current game state is set to X.
    */
    
    /*
    
    Example for game state "MyGameState":

    function stMyGameState() {
        // Do some stuff ...
        
        // (very often) go to another gamestate
        $this->gamestate->nextState('some_gamestate_transition');
    }    
    */

//////////////////////////////////////////////////////////////////////////////
//////////// Zombie
////////////

    /*
        zombieTurn:
        
        This method is called each time it is the turn of a player who has quit the game (= "zombie" player).
        You can do whatever you want in order to make sure the turn of this player ends appropriately
        (ex: pass).
        
        Important: your zombie code will be called when the player leaves the game. This action is triggered
        from the main site and propagated to the gameserver from a server, not from a browser.
        As a consequence, there is no current player associated to this action. In your zombieTurn function,
        you must _never_ use getCurrentPlayerId() or getCurrentPlayerName(), otherwise it will fail with a "Not logged" error message. 
    */

    function zombieTurn($state, $active_player) {
    	$statename = $state['name'];
    	
        if ($state['type'] === "activeplayer") {
            switch ($statename) {
                default:
                    $this->gamestate->nextState( "zombiePass");
                	break;
            }
            return;
        }

        if ($state['type'] === "multipleactiveplayer") {
            // Make sure player is in a non blocking status for role turn
            $this->gamestate->setPlayerNonMultiactive($active_player, '');
            return;
        }

        throw new feException("Zombie mode not supported at this game state: ".$statename);
    }
    
///////////////////////////////////////////////////////////////////////////////////:
////////// DB upgrade
//////////

    /*
        upgradeTableDb:
        
        You don't have to care about this until your game has been published on BGA.
        Once your game is on BGA, this method is called everytime the system detects a game running with your old
        Database scheme.
        In this case, if you change your Database scheme, you just have to apply the needed changes in order to
        update the game database and allow the game to continue to run with your new version.
    
    */
    
    function upgradeTableDb($from_version) {
        // $from_version is the current version of this game database, in numerical form.
        // For example, if the game was running with a release of your game named "140430-1345",
        // $from_version is equal to 1404301345
        
        // Example:
//        if ($from_version <= 1404301345) {
//            // ! important ! Use DBPREFIX_<table_name> for all tables
//
//            $sql = "ALTER TABLE DBPREFIX_xxxxxxx ....";
//            self::applyDbUpgradeToAllDB( $sql );
//        }
//        if ($from_version <= 1405061421) {
//            // ! important ! Use DBPREFIX_<table_name> for all tables
//
//            $sql = "CREATE TABLE DBPREFIX_xxxxxxx ....";
//            self::applyDbUpgradeToAllDB( $sql );
//        }
//        // Please add your future database scheme changes here
//
//


    }    
}