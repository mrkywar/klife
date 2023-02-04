<?php

namespace SmileLife\Game\Card\Category\Love\Wedding;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of FourqueuxWedding
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Fourqueux extends Wedding implements BaseGame {

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return 50;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Wedding 
     * ---------------------------------------------------------------------- */
}