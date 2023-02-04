<?php

namespace SmileLife\Game\Card\Category\Love;

use SmileLife\Game\Card\Core\Exception\CardException;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Adultery
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Adultery extends Love implements BaseGame {

    private const SMILE_POINTS = 1;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return false;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Adultery01 : Check that the player is already married");
    }

    public function canGenerateChild(): bool {
        return false;
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }

    public function getType(): int {
        return 54;
    }

    public function getRefClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 3;
    }

}
