<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of LuigiChild
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class LuigiChild extends Child implements BaseGame {
    
    public function getType(): int {
        return 60;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Child 
     * ---------------------------------------------------------------------- */
}