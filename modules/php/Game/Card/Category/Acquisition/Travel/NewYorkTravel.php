<?php

namespace SmileLife\Game\Card\Category\Acquisition\Travel;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of NewYorkTravel
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class NewYorkTravel extends Travel implements BaseGame {

    public function getType(): int {
        return 72;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Travel 
     * ---------------------------------------------------------------------- */
}
