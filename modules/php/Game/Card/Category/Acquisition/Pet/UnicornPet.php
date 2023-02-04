<?php

namespace SmileLife\Game\Card\Category\Acquisition\Pet;

use SmileLife\Game\Card\Category\Acquisition\Pet\Pet;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of UnicornPet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class UnicornPet extends Pet implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return 69;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Override
     * ---------------------------------------------------------------------- */

    public function getSmilePoints(): int {
        return 3;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Pet 
     * ---------------------------------------------------------------------- */
}
