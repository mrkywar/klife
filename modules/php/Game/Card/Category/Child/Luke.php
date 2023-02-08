<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Core\CardType;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of LukeChild
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Luke extends Child implements BaseGame {

    public function getType(): int {
        return CardType::CHILD_LUKE;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Child 
     * ---------------------------------------------------------------------- */
}
