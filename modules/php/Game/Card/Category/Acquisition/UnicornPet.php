<?php

namespace SmileLife\Game\Card\Category\Acquisition;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of UnicornPet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class UnicornPet extends Acquisition implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getPrice(): int {
        return 0;
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return 3;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 1;
    }
}
