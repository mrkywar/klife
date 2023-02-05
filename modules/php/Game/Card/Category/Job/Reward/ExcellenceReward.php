<?php

namespace SmileLife\Game\Card\Category\Job\Reward;

use Klife;
use SmileLife\Game\Card\Category\Job\Job;
use SmileLife\Game\Card\Core\Exception\CardException;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of ExcellenceReward
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class ExcellenceReward extends Reward implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return false;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-ExcellenceReward-01 : check the rules !");
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return 4;
    }

    /**
     * Get Compatible Classes (null = no restriction)
     * @return array|null
     */
    public function getCompatibleJobClasses(): ?array {
        return [
            Job\Journalist::class,
            Job\Researcher::class,
            Job\Author::class
        ];
    }

    /**
     * Get UnCompatible Classes (null = no restriction)
     * @return array|null
     */
    public function getUncompatibleJobClasses(): ?array {
        return null;
    }

    public function getType(): int {
        return 80;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 2;
    }

}
