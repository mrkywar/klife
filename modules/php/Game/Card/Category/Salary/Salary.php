<?php

namespace SmileLife\Game\Card\Category\Salary;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\CardException;

/**
 * Description of Salary
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Salary extends Card {

    private const SMILE_POINTS = 1;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Salary-01 : check if the required job are fulfilled");
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }

}
