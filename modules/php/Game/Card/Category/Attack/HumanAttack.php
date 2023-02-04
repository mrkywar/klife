<?php

namespace SmileLife\Game\Card\Category\Attack;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of HumanAttack
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class HumanAttack extends Attack implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return 82;
    }

    public function getRefClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 1;
    }

}
