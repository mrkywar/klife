<?php

namespace Core\Managers;

use Core\DB\Fields\DBFieldsRetriver;
use Core\Managers\Core\SuperManager;
use Core\Models\Player;
use Core\Serializers\Serializer;
use Klife;

/**
 * Description of PlayerManager
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class PlayerManager extends SuperManager {

    public function initNewGame(array $rawPlayers, array $options = []) {
        $gameinfos = Klife::getInstance()->getGameinfos();

        $players = $this->getSerializer()->unserialize($rawPlayers);

        $defaultColors = $gameinfos['player_colors'];
        foreach ($players as &$player) {
            $color = array_shift($defaultColors);
            $player->setColor($color);
        }
//        $this->setIsDebug(true);
        $this->create($players);

        Klife::getInstance()->reattributeColorsBasedOnPreferences($rawPlayers, $gameinfos['player_colors']);
        Klife::getInstance()->reloadPlayersBasicInfos();
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Score Methods
     * ---------------------------------------------------------------------- */

    public function updateScore(Player $player) {
        $qb = $this->prepareUpdate($player);

        $fieldScore = DBFieldsRetriver::retriveFieldByPropertyName("score", $player);
        $qb->addSetter($fieldScore, $player->getScore());

        $this->execute($qb);
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Define Abstracts Methods 
     * ---------------------------------------------------------------------- */

    protected function initSerializer(): Serializer {
        return new Serializer(Player::class);
    }

}
