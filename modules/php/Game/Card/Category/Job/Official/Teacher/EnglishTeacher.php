<?php

namespace SmileLife\Game\Card\Category\Job\Official\Teacher;

use Klife;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of EnglishTeacher
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class EnglishTeacher extends Teacher implements BaseGame {
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

    public function getType(): int {
        return 3;
    }
    
    public function getTitle(): string {
        return Klife::getInstance()->i18n('English teacher');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Job
     * ---------------------------------------------------------------------- */
}
