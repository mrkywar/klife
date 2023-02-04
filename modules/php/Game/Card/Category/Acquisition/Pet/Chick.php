<?php

namespace SmileLife\Game\Card\Category\Acquisition\Pet;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of ChickPet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Chick extends Pet implements BaseGame {

    public function getType(): int {
        return 66;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Pet 
     * ---------------------------------------------------------------------- */
}
