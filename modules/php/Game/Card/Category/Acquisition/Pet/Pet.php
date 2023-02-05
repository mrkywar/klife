<?php

namespace SmileLife\Game\Card\Category\Acquisition\Pet;

use SmileLife\Game\Card\Category\Acquisition\Acquisition;

/**
 * Description of Pet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Pet extends Acquisition {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getPrice(): int {
        return 0;
    }

    public function getSmilePoints(): int {
        return 1;
    }

    public function getTitle(): string {
        return clienttranslate('Pet');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame (1 card in each type)
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 1;
    }

}
