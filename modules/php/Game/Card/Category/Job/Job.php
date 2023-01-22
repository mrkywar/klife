<?php

namespace SmileLife\Game\Card\Category\Job;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\CardException;

/**
 * Description of Job
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
/* abstract */ class Job extends Card {

    protected int $requiredStudies;
    protected int $maxSalary;

    public function __construct() {
        parent::__construct();

        $this->setClass(self::class);

        $this->setSmilePoints(2)
                ->addHelp(clienttranslate("This is a job card, you can play it to earn money. The max wage is indicated on the card."));
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBePlayed(): bool {
        throw new CardException("CJ01 TODO: check if the required studies are fulfilled");
        //return true;
    }

    public function canBeAttacked(): bool {
        return true;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Getters & Setters 
     * ---------------------------------------------------------------------- */

    public function getRequiredStudies(): int {
        return $this->requiredStudies;
    }

    public function getMaxSalary(): int {
        return $this->maxSalary;
    }

    public function setRequiredStudies(int $requiredStudies) {
        $this->requiredStudies = $requiredStudies;
        return $this;
    }

    public function setMaxSalary(int $maxSalary) {
        $this->maxSalary = $maxSalary;
        return $this;
    }

    public function getClass(): string {
        return self::class;
    }

}
