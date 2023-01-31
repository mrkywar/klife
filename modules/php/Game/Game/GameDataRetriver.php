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
        $playerManager = $this->game->getPlayerManager();
        $cardManager = $this->game->getCardManager();

        $currentPlayer = $playerManager->findBy([
            "id" => $playerId
        ]); // !! We must only return informations visible by this player !!

        $result = [
            "myhand" => $cardManager->getPlayerCards($currentPlayer),
            "deck" => count($cardManager->getAllCardsInDeck())
        ];

        foreach ($playerManager->findBy() as $player) {
            $result['player'][$player->getId()] = count($cardManager->getPlayerCards($player));
        }

        return $result;
    }

}
