<?php

namespace SmileLife\Game\Card\Category\Acquisition\Home;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Home1
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Home3 extends Home implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getPrice(): int {
        return 10;
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
