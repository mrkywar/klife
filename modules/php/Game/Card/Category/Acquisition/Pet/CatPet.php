<?php

namespace SmileLife\Game\Card\Category\Acquisition\Pet;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of CatPet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class CatPet extends Pet implements BaseGame {

    public function getType(): int {
        return 65;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Pet 
     * ---------------------------------------------------------------------- */
}
