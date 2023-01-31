<?php

use Core\Managers\PlayerManager;
use SmileLife\Game\Card\Core\CardManager;
use SmileLife\Game\Game\GameManager;
use SmileLife\Game\PlayerAttributes\PlayerAttributesManager;

/**
 * ------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * klife implementation : © <Your name here> <Your email address here>
 * 
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 * 
 * klife.game.php
 *
 * This is the main file for your game logic.
 *
 * In this PHP file, you are going to defines the rules of the game.
 *
 */
$swdNamespaceAutoload = function ($class) {
    $classParts = explode('\\', $class);

    if ($classParts[0] == 'SmileLife') {
        array_shift($classParts);
        //var_dump(dirname(__FILE__) . '/modules/php/' . implode(DIRECTORY_SEPARATOR, $classParts) . '.php');die;
        $file = dirname(__FILE__) . '/modules/php/' . implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            var_dump("Impossible to load SmileLife class : $class");
        }
    } elseif ($classParts[0] == 'Core') {
        array_shift($classParts);

        //var_dump(dirname(__FILE__) . '/modules/php/Core/' . implode(DIRECTORY_SEPARATOR, $classParts) . '.php');die;
        $file = dirname(__FILE__) . '/modules/php/Core/' . implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            var_dump("Impossible to load Core class : $class");
        }
    }
};
spl_autoload_register($swdNamespaceAutoload, true, true);

require_once( APP_GAMEMODULE_PATH . 'module/table/table.game.php' );
require_once('modules/constants.inc.php');

class Klife extends Table {

    /**
     * 
     * @var Klife
     */
    private static $instance;

    /**
     * @var PlayerManager
     */
    private $playerManager;

    /**
     * 
     * @var CardManager
     */
    private $cardManager;

    /**
     * 
     * @var GameManager
     */
    private $gameManager;

    /**
     * 
     * @var PlayerAttributesManager
     */
    private $playerAttributesManager;

    function __construct() {
        parent::__construct();

        self::$instance = $this;

        $this->playerManager = new PlayerManager();
        $this->cardManager = new CardManager();
        $this->gameManager = new GameManager();
        $this->playerAttributesManager = new PlayerAttributesManager();

        self::initGameStateLabels(array(
                //    "my_first_global_variable" => 10,
                //    "my_second_global_variable" => 11,
                //      ...
                //    "my_first_game_variant" => 100,
                //    "my_second_game_variant" => 101,
                //      ...
        ));
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
        $this->playerManager->initNewGame($players, $options);
        $this->gameManager->initNewGame($options);
        $this->playerAttributesManager->initNewGame();
        $this->cardManager->initNewGame($options);

        //Logger::log("Message", "Test");

        $this->activeNextPlayer();

        /*         * ********** End of the game initialization **** */
    }

    /*
      getAllDatas:

      Gather all informations about current game situation (visible by the current player).

      The method is called each time the game interface is displayed to a player, ie:
      _ when the game starts
      _ when a player refreshes the game page (F5)
     */

    protected function getAllDatas() {

        $currentPlayer = $this->playerManager->findBy([
            "id" => self::getCurrentPlayerId()
        ]); // !! We must only return informations visible by this player !!


        $result["hand"] = $this->cardManager->getPlayerCards($currentPlayer);
        
//        echo "<pre>";
//        var_dump($result);die;

//        echo "<pre>";
//        var_dump($cardsInHand);
//        die;

//        $result = array();
//
//        // $this->cardManager->tryCard();
////        $deck = new Deck();
////        $deck->generateDeck(array());
//        //var_dump($deck);
////        die('OK');
////        echo '<pre>';
////        $this->getCardManager()->getAllCardsInDeck();
////        die('G');
//
//        $current_player_id = self::getCurrentPlayerId();    // !! We must only return informations visible by this player !!
//        // Get information about players
//        // Note: you can retrieve some extra field you added for "player" table in "dbmodel.sql" if you need it.
//        $sql = "SELECT player_id id, player_score score FROM player ";
//        $result['players'] = self::getCollectionFromDb($sql);
//
//        // TODO: Gather all information about current game situation (visible by player $current_player_id).

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
        $game = $this->getGameManager()->findBy();
        $remingingCards = count($this->getCardManager()->getAllCardsInDeck());

        $maxCards = $game->getAviableCards();

        return intval(100 * round(
                        ($maxCards - $remingingCards) / $maxCards
        ));
    }

//////////////////////////////////////////////////////////////////////////////
//////////// Utility functions
////////////    

    /*
      In this space, you can put any utility methods useful for your game logic
     */



//////////////////////////////////////////////////////////////////////////////
//////////// Player actions
//////////// 

    /*
      Each time a player is doing some game action, one of the methods below is called.
      (note: each method below must match an input method in klife.action.php)
     */

    /*

      Example:

      function playCard( $card_id )
      {
      // Check that this is the player's turn and that it is a "possible action" at this game state (see states.inc.php)
      self::checkAction( 'playCard' );

      $player_id = self::getActivePlayerId();

      // Add your game logic to play a card there
      ...

      // Notify all players about the card played
      self::notifyAllPlayers( "cardPlayed", clienttranslate( '${player_name} plays ${card_name}' ), array(
      'player_id' => $player_id,
      'player_name' => self::getActivePlayerName(),
      'card_name' => $card_name,
      'card_id' => $card_id
      ) );

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

      function argMyGameState()
      {
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

      function stMyGameState()
      {
      // Do some stuff ...

      // (very often) go to another gamestate
      $this->gamestate->nextState( 'some_gamestate_transition' );
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
                    $this->gamestate->nextState("zombiePass");
                    break;
            }

            return;
        }

        if ($state['type'] === "multipleactiveplayer") {
            // Make sure player is in a non blocking status for role turn
            $this->gamestate->setPlayerNonMultiactive($active_player, '');

            return;
        }

        throw new feException("Zombie mode not supported at this game state: " . $statename);
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
//        if( $from_version <= 1404301345 )
//        {
//            // ! important ! Use DBPREFIX_<table_name> for all tables
//
//            $sql = "ALTER TABLE DBPREFIX_xxxxxxx ....";
//            self::applyDbUpgradeToAllDB( $sql );
//        }
//        if( $from_version <= 1405061421 )
//        {
//            // ! important ! Use DBPREFIX_<table_name> for all tables
//
//            $sql = "CREATE TABLE DBPREFIX_xxxxxxx ....";
//            self::applyDbUpgradeToAllDB( $sql );
//        }
//        // Please add your future database scheme changes here
//
//
    }

    public static function getInstance(): Klife {
        return self::$instance;
    }

    public function getPlayerManager(): PlayerManager {
        return $this->playerManager;
    }

    public function getGameManager(): GameManager {
        return $this->gameManager;
    }

    public function getCardManager(): CardManager {
        return $this->cardManager;
    }

    public function getPlayerAttributesManager(): PlayerAttributesManager {
        return $this->playerAttributesManager;
    }

}
