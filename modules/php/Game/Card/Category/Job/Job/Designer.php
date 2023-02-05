<?php

namespace SmileLife\Game\Card\Category\Job\Job;

use Klife;
use SmileLife\Game\Card\Category\Job\Job;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Designer
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Designer extends Job implements BaseGame {
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
        return 4;
    }

    public function getType(): int {
        return 18;
    }
    
    public function getTitle(): string {
        return Klife::getInstance()->i18n('Designer');
    }
    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}
