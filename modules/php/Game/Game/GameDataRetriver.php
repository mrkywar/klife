<?php

namespace SmileLife\Game\Game;

use SmileLife;

/**
 * Description of GameDataRetriver
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class GameDataRetriver {

    /**
     * 
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
     * @var CardSerializer
     */
    private $cardSerializer;

    public function __construct(SmileLife $game) {
//        $this->game = $game;
        $this->playerManager = $game->getPlayerManager();
        $this->cardManager = $game->getCardManager();
        $this->cardSerializer = $this->cardManager->getSerializer();
    }

    public function retrive(int $playerId) {
        $currentPlayer = $this->playerManager->findBy([
            "id" => $playerId
        ]); // !! We must only return informations visible by this player !!

        $result = [
            "myhand" => $this->cardManager->getPlayerCards($currentPlayer),
            "deck" => count($this->cardManager->getAllCardsInDeck())
        ];

        foreach ($this->playerManager->findBy() as $player) {
            $result['player'][$player->getId()] = count($this->cardManager->getPlayerCards($player));
        }
        echo "<pre>";
        var_dump($result);
        die;

        return $result;
    }

}
