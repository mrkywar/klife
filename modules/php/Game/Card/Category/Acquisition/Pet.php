<?php

namespace SmileLife\Game\Card\Category\Acquisition;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Pet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Pet extends Acquisition implements BaseGame {
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
        return 1;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 4;
    }

}
