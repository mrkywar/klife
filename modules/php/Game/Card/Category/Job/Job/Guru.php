<?php

namespace SmileLife\Game\Card\Category\Job\Job;

use SmileLife\Game\Card\Category\Job\Job;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Guru
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Guru extends Job implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getMaxSalary(): int {
        return 3;
    }

    public function getRequiredStudies(): int {
        return 0;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}