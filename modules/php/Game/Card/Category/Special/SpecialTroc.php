<?php

namespace SmileLife\Game\Card\Category\Special;

use Klife;
use SmileLife\Game\Card\Core\Exception\CardException;
use SmileLife\Game\Card\Effect\Effect;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of SpecialTroc
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class SpecialTroc extends Special implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getEffect(): Effect {
        throw new CardException("C-SpecialTroc-01 : Not implemented yet");
    }

    public function getType(): int {
        return 99;
    }

    public function getTitle(): string {
        return Klife::getInstance()->i18n('Troc');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Special
     * ---------------------------------------------------------------------- */
}
