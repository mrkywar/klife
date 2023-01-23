<?php

namespace SmileLife\Game\Card\Category\Acquisition;

/**
 * Description of Pet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Pet extends Acquisition {

    private const PET_PRICE = 0;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getPrice(): int {
        return self::PET_PRICE;
    }

}
