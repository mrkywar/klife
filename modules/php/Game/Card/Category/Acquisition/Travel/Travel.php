<?php

namespace SmileLife\Game\Card\Category\Acquisition\Travel;

use Klife;
use SmileLife\Game\Card\Category\Acquisition\Acquisition;

/**
 * Description of Travel
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Travel extends Acquisition {

    private const TRAVEL_PRICE = 3;
    private const SMILE_POINTS = 1;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getPrice(): int {
        return self::TRAVEL_PRICE;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }
    
    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame (1 card in each type)
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 1;
    }

}
