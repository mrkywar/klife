<?php

namespace SmileLife\Game\Card\Category\Acquisition\Pet;

use SmileLife\Game\Card\Core\CardType;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of CatPet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Cat extends Pet implements BaseGame {

    public function getType(): int {
        return CardType::PET_CAT;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Pet 
     * ---------------------------------------------------------------------- */
}
