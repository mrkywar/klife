<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of HermioneChild
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class HermioneChild extends Child implements BaseGame {

    public function getType(): int {
        return 57;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Child 
     * ---------------------------------------------------------------------- */
}
