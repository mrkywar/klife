<?php

namespace SmileLife\Game\Card\Category\Job\Interim;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Plumber
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Gardener extends Interim implements BaseGame {
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
        return 1;
    }
    
    public function getType(): int {
        return 11;
    }
    
    public function getTitle(): string {
        return clienttranslate('Gardener');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */

}
