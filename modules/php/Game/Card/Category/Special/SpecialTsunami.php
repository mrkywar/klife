<?php

namespace SmileLife\Game\Card\Category\Special;

use SmileLife\Game\Card\Effect\Effect;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of SpecialTsunami
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class SpecialTsunami extends Special implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getEffect(): Effect {
        throw new CardException("C-SpecialTsunami-01 : Not implemented yet");
    }

    public function getType(): int {
        return 100;
    }

    public function getTitle(): string {
        return clienttranslate('Tsunami');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Special
     * ---------------------------------------------------------------------- */
}
