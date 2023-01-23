<?php

namespace SmileLife\Game\Card\Category\Studies;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\CardException;

/**
 * Description of Studies
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Studies extends Card {

    private const SMILE_POINT = 1;

    protected int $level;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Studies-01 : check if the max studies are not reached");
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINT;
    }

}
