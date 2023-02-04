<?php

namespace SmileLife\Game\Card\Category\Acquisition\Travel;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of RioDeJaneiroTravel
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class RioDeJaneiro extends Travel implements BaseGame {

    public function getType(): int {
        return 73;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Travel 
     * ---------------------------------------------------------------------- */
}
