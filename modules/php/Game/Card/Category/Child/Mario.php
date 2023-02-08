<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Core\CardType;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of MarioChild
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Mario extends Child implements BaseGame {

    public function getType(): int {
        return CardType::CHILD_MARIO;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Child 
     * ---------------------------------------------------------------------- */
}
