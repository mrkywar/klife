<?php

namespace SmileLife\Game\Card\Category\Love;

use SmileLife\Game\Card\Core\Exception\CardException;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Wedded
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Wedding extends Love implements BaseGame{

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

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */
    
    public function getBaseCardCount(): int {
        return 7;
    }

}
