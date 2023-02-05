<?php

namespace SmileLife\Game\Card\Category\Job\Official;

use Klife;
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

    public function getType(): int {
        return 8;
    }
    
    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}
