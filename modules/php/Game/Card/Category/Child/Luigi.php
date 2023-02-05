<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of LuigiChild
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Luigi extends Child implements BaseGame {

    public function getType(): int {
        return 60;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Child 
     * ---------------------------------------------------------------------- */
}