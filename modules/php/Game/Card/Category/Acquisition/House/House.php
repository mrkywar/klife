<?php

namespace SmileLife\Game\Card\Category\Acquisition\House;

use SmileLife\Game\Card\Category\Acquisition\Acquisition;

/**
 * Description of House
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class House extends Acquisition {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame (1 card in each type)
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 1;
    }

}
