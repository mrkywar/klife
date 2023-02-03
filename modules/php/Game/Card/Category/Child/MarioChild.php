<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of MarioChild
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class MarioChild extends Child implements BaseGame {
    
    public function getType(): int {
        return 62;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Child 
     * ---------------------------------------------------------------------- */
}
