<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of LeiaChild
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Leia extends Child implements BaseGame {

    public function getType(): int {
        return 59;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Child 
     * ---------------------------------------------------------------------- */
}
