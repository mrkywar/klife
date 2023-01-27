<?php

namespace SmileLife\Game\Card\Category\Special;

use SmileLife\Game\Card\Effect\Effect;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of SpecialFallingStar
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class SpecialFallingStar extends Special implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getEffect(): Effect {
        throw new CardException("C-SpecialFallingStar-01 : Not implemented yet");
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Special
     * ---------------------------------------------------------------------- */
}