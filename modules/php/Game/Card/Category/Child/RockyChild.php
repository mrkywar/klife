<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of ZeldaChild
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class ZeldaChild extends Child implements BaseGame {
    
    public function getType(): int {
        return 64;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Child 
     * ---------------------------------------------------------------------- */
}
