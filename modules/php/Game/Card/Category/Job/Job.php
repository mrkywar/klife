<?php

namespace SmileLife\Game\Card\Category\Job;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\Exception\CardException;

/**
 * Description of Job
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Job extends Card{

    private int $requiredStudies;
    private int $maxSalary;

    private const SMILE_POINTS = 1;

    public function __construct() {
        parent::__construct();

        $this->addHelp(clienttranslate("This is a job card, you can play it to earn money. The max wage is indicated on the card."));
    }

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

}
