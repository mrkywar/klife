<?php

namespace SmileLife\Game\Card\Category\Love;

use SmileLife\Game\Card\Core\CardException;

/**
 * Description of Wedded
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Wedding extends Love {

    private const SMILE_POINTS = 3;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Wedding01 : Check that the player is not married and has already at least a flirt");
    }

    public function canGenerateChild(): bool {
        return true;
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }

}
