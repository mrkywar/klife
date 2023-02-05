<?php

namespace SmileLife\Game\Card\Category\Special;

use SmileLife\Game\Card\Effect\Effect;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of SpecialRainbow
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class SpecialRainbow extends Special implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getEffect(): Effect {
        throw new CardException("C-SpecialRainbow-01 : Not implemented yet");
    }

    public function getType(): int {
        return 95;
    }
    
    public function getTitle(): string {
        return clienttranslate('Rainbow');
    }


    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Special
     * ---------------------------------------------------------------------- */
}
