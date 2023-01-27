<?php

namespace SmileLife\Game\Card\Category\Attack;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of GradeRepetition
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class GradeRepetition extends Attack implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 5;
    }
}
