<?php

namespace SmileLife\Game\Card\Category\Wage;

use Klife;
use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\Exception\CardException;

/**
 * Description of Wage
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Wage extends Card {

    private const SMILE_POINTS = 1;

    /* -------------------------------------------------------------------------
     *                  BEGIN - new Abstract
     * ---------------------------------------------------------------------- */

    abstract public function getAmount(): int;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Salary-01 : check if the required job are fulfilled");
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }
}
