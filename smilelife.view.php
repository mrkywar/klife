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
 * smilelife.view.php
 *
 * This is your "view" file.
 *
 * The method "build_page" below is called each time the game interface is displayed to a player, ie:
 * _ when the game starts
 * _ when a player refreshes the game page (F5)
 *
 * "build_page" method allows you to dynamically modify the HTML generated for the game interface. In
 * particular, you can set here the values of variables elements defined in smilelife_smilelife.tpl (elements
 * like {MY_VARIABLE_ELEMENT}), and insert HTML block elements (also defined in your HTML template file)
 *
 * Note: if the HTML of your game interface is always the same, you don't have to place anything here.
 *
 */
  
  require_once( APP_BASE_PATH."view/common/game.view.php" );
  
  class view_smilelife_smilelife extends game_view
  {
    function getGameName() {
        return "smilelife";
    }    
  	function build_page( $viewArgs )
  	{	
		// Id of the client
        global $g_user;
        $my_id = $g_user->get_id();
	
  	    // Get players
        $players = $this->game->loadPlayersBasicInfos();
        $players_nbr = count( $players );
		
		if (array_key_exists($my_id, $players)) { // That is if I'm not a spectator
			// We have to reorganize players array so that it reflects the real turn order beginning from me
			$players_with_order = array();
			foreach($players as $player_id => $player) {
				$player['player_id'] = $player_id;
				$players_with_order[] = $player;
			}
			
			while($players_with_order[0]['player_id'] != $my_id)
			{
				// Roll the array
				$player = array_shift($players_with_order);
				$players_with_order[] = $player;
			}
			
			$players = array();
			foreach($players_with_order as $player) {
				$players[$player['player_id']] = $player;
			}
		}

        /*********** Place your code below:  ************/
        

        $this->page->begin_block( "smilelife_smilelife", "player" );
        foreach($players as $player_id => $player) {
            $this->page->insert_block( "player", array( 
													  "PLAYER_ID" => $player_id,
                                                      "PLAYER_NAME" => $player['player_name'],
                                                      "PLAYER_COLOR" => $player['player_color'],
                                                     ));
        }

        /*********** Do not change anything below this line  ************/
  	}
  }
  

