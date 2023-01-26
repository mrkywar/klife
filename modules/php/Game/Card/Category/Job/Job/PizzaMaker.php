<?php

namespace SmileLife\Game\Card\Category\Job\Job;

/**
 * Description of PizzaMaker
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class PizzaMaker extends Job implements BaseGame {
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
        return 0;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}
