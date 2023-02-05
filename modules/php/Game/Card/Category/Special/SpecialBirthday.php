<?php

namespace SmileLife\Game\Card\Category\Special;

use SmileLife\Game\Card\Effect\Effect;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of SpecialBirthday
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class SpecialBirthday extends Special implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getEffect(): Effect {
        throw new CardException("C-SpecialBirthday-01 : Not implemented yet");
    }

    public function getType(): int {
        return 91;
    }

    public function getTitle(): string {
        return clienttranslate('Birthday');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Special
     * ---------------------------------------------------------------------- */
}
