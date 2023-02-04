<?php

namespace SmileLife\Game\Card\Category\Love\Wedding;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of BougMadameWedding
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class BougMadameWedding extends Wedding implements BaseGame {

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return 48;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Wedding 
     * ---------------------------------------------------------------------- */
}
