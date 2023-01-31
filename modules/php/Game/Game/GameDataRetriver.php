<?php

namespace SmileLife\Game\Game;

use Klife;

/**
 * Description of GameDataRetriver
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class GameDataRetriver {

    /**
     * 
     * @var Klife
     */
    private $game;

    public function __construct(Klife $game) {
        $this->game = $game;
    }

    public function retrive(int $playerId) {
        $currentPlayer = $this->game->getPlayerManager()->findBy([
            "id" => $playerId
        ]); // !! We must only return informations visible by this player !!

        $cardManager = $this->game->getCardManager();

        return [
            "hand" => $cardManager->getPlayerCards($currentPlayer),
            "deck" => count($cardManager->getAllCardsInDeck())
        ];
    }

}
