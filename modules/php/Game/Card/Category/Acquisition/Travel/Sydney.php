<?php

namespace SmileLife\Game\Card\Category\Acquisition\Travel;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of SydneyTravel
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Sydney extends Travel implements BaseGame {

    public function getType(): int {
        return 74;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Travel 
     * ---------------------------------------------------------------------- */
}
