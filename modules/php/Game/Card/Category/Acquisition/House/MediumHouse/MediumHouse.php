<?php

namespace SmileLife\Game\Card\Category\Acquisition\House\MediumHouse;

use SmileLife\Game\Card\Category\Acquisition\House\House;

/**
 * Description of MediumHouse
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class MediumHouse extends House {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getPrice(): int {
        return 8;
    }

    public function getSmilePoints(): int {
        return 2;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

}
