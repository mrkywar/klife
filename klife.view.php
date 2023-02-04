<?php

use Core\Managers\PlayerManager;
use Core\Models\Player;

/**
 * ------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * klife implementation : © <Your name here> <Your email address here>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * klife.view.php
 *
 * This is your "view" file.
 *
 * The method "build_page" below is called each time the game interface is displayed to a player, ie:
 * _ when the game starts
 * _ when a player refreshes the game page (F5)
 *
 * "build_page" method allows you to dynamically modify the HTML generated for the game interface. In
 * particular, you can set here the values of variables elements defined in klife_klife.tpl (elements
 * like {MY_VARIABLE_ELEMENT}), and insert HTML block elements (also defined in your HTML template file)
 *
 * Note: if the HTML of your game interface is always the same, you don't have to place anything here.
 *
 */
require_once( APP_BASE_PATH . "view/common/game.view.php" );

class view_klife_klife extends game_view {

    protected function getGameName() {
        // Used for translations and stuff. Please do not modify.
        return "klife";
    }

    function build_page($viewArgs) {
        global $g_user;
        $this->page->begin_block("klife_klife", "player");
        $this->page->begin_block("klife_klife", "myhand");
        /**
         * @var PlayerManager
         */
        $playerManager = $this->game->getPlayerManager();
        $cardManager = $this->game->getCardManager();
        
        $this->page->insert_block("myhand",[
            "MY_HAND" => clienttranslate('MY_HAND')
        ]);

        $players = $playerManager->findBy();
        $connectedPlayer = $playerManager->findBy([
            "id" => $g_user->get_id()
        ]);

//        var_dump($connectedPlayer);

        foreach ($players as $player) {
            $this->buildPlayer($player);
        }

    }

    private function buildPlayer(Player $player) {
        return $this->page->insert_block("player", [
                    'playerId' => $player->getId(),
                    'color' => $player->getColor(),
                    'name' => $player->getName(),
        ]);
    }

}
