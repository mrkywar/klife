<?php

namespace SmileLife\Game\Card\Category\Attack;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Accident
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Dismissal extends Attack implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return 87;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 5;
    }

}
