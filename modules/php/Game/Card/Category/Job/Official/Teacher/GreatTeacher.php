<?php

namespace SmileLife\Game\Card\Category\Job\Official\Teacher;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of MathTeacher
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class GreatTeacher extends Teacher implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Override
     * ---------------------------------------------------------------------- */

    public function canBePlayed(): bool {
        throw new CardException("C-GreatTeacher-01 : check the rules !");
    }

    public function getType(): int {
        return 7;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getMaxSalary(): int {
        return 2;
    }

    public function getRequiredStudies(): int {
        return 2;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}
