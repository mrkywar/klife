<?php

namespace SmileLife\Game\Card\Category\Special;

use SmileLife\Game\Card\Effect\Effect;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of SpecialJobBoost
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class SpecialJobBoost extends Special implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getEffect(): Effect {
        throw new CardException("C-SpecialJobBoost-01 : Not implemented yet");
    }

    public function getType(): int {
        return 98;
    }

    public function getTitle(): string {
        return clienttranslate('Job boost');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Special
     * ---------------------------------------------------------------------- */
}
