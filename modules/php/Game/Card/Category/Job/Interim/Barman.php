<?php

namespace SmileLife\Game\Card\Category\Job\Interim;

use Klife;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Barman
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Barman extends Interim implements BaseGame {
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
        return 10;
    }
    
    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}
