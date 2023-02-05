<?php

namespace SmileLife\Game\Card\Category\Job\Job;

use SmileLife\Game\Card\Category\Job\Job;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of AirlinePilot
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class AirlinePilot extends Job implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getMaxSalary(): int {
        return 4;
    }

    public function getRequiredStudies(): int {
        return 5;
    }

    public function getType(): int {
        return 15;
    }

    public function getTitle(): string {
        return clienttranslate('Airline Pilot');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}
