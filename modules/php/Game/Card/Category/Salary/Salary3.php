<?php

namespace SmileLife\Game\Card\Category\Salary;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Salary1
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Salary3 extends Salary implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getAmount(): int {
        return 3;
    }

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return 35;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 10;
    }

}
