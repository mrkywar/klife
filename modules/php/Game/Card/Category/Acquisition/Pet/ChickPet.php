<?php

namespace SmileLife\Game\Card\Category\Acquisition\Pet;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of ChickPet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class ChickPet extends Pet implements BaseGame {

    public function getType(): int {
        return 66;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Pet 
     * ---------------------------------------------------------------------- */
}
