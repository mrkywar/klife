<?php

namespace SmileLife\Game\Card\Category\Special;

use SmileLife\Game\Card\Effect\Effect;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of SpecialLuck
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class SpecialLuck extends Special implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getEffect(): Effect {
        throw new CardException("C-SpecialLuck-01 : Not implemented yet");
    }

    public function getType(): int {
        return 94;
    }

    public function getTitle(): string {
        return clienttranslate('Luck');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Special
     * ---------------------------------------------------------------------- */
}
