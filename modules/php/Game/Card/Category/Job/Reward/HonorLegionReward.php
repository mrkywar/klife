<?php

namespace SmileLife\Game\Card\Category\Job\Reward;

use SmileLife\Game\Card\Category\Job\Job;
use SmileLife\Game\Card\Core\CardType;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of HonorLegionReward
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class HonorLegionReward extends Reward implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return false;
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return 3;
    }

    /**
     * Get Compatible Classes (null = no restriction)
     * @return array|null
     */
    public function getCompatibleJobClasses(): ?array {
        return null;
    }

    /**
     * Get UnCompatible Classes (null = no restriction)
     * @return array|null
     */
    public function getUncompatibleJobClasses(): ?array {
        return [
            Job\Bandit::class
        ];
    }

    public function getType(): int {
        return CardType::REWARD_HONOR_LEGION;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 1;
    }

}
