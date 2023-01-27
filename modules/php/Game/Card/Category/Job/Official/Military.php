<?php

namespace SmileLife\Game\Card\Category\Job\Official;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Military
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Military extends Official implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getMaxSalary(): int {
        return 1;
    }

    public function getRequiredStudies(): int {
        return 0;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}
