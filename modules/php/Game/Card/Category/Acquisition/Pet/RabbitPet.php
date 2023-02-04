<?php

namespace SmileLife\Game\Card\Category\Acquisition\Pet;

use SmileLife\Game\Card\Category\Acquisition\Pet\Pet;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of DogPet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class DogPet extends Pet implements BaseGame {

    public function getType(): int {
        return 67;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Pet 
     * ---------------------------------------------------------------------- */
}