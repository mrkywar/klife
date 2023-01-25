<?php

namespace SmileLife\Game\Card\Category\Acquisition\Home;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Home1
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Home1 extends Home implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getPrice(): int {
        return 6;
    }

    public function getSmilePoints(): int {
        return 1;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 2;
    }

}