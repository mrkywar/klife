<?php

namespace SmileLife\Game\Card\Category\Attack;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Accident
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Accident extends Attack implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return 84;
    }

    public function getRefClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 5;
    }

}
