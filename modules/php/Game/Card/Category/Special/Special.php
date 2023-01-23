<?php

namespace SmileLife\Game\Card\Category\Special;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Effect\CardEffectInterface;

/**
 * Description of Special
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Special extends Card implements CardEffectInterface{

    

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return false;
    }

    public function canBePlayed(): bool {
        return true;
    }

    public function getSmilePoints(): int {
        return 0;
    }

}