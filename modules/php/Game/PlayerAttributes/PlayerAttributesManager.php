<?php

namespace SmileLife\Game\PlayerAttributes;

use Core\Managers\Core\SuperManager;
use Core\Serializers\Serializer;
use SmileLife;

/**
 * Description of PlayerAttributesManager
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class PlayerAttributesManager extends SuperManager {

    public function initNewGame() {
        $players = SmileLife::getInstance()->getPlayerManager()->findBy();
        $playerAttrs = [];
        foreach ($players as $player) {
            $playerAttrs[] = PlayerAttributesFactory::create($player);
        }
        $this->create($playerAttrs);
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Define Abstracts Methods 
     * ---------------------------------------------------------------------- */

    protected function initSerializer(): Serializer {
        return new Serializer(PlayerAttributes::class);
    }

}
