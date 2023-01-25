<?php

namespace SmileLife\Game\Card\Category\Job;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\Exception\CardException;

/**
 * Description of Job
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Job extends Card {

    private const SMILE_POINTS = 1;

    public function __construct() {
        parent::__construct();

        $this->addHelp(clienttranslate("This is a job card, you can play it to earn money. The max wage is indicated on the card."));
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - new Abstract
     * ---------------------------------------------------------------------- */

    abstract public function getRequiredStudies(): int;

    abstract public function getMaxSalary(): int;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Override
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBePlayed(): bool {
        throw new CardException("C-Job-01 : check if the required studies are fulfilled");
        //return true;
    }

    public function canBeAttacked(): bool {
        return true;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }

}
