<?php

namespace SmileLife\Game\Card\Category\Acquisition\Pet;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of RabbitPet
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Rabbit extends Pet implements BaseGame {

    public function getType(): int {
        return 68;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame is in Pet 
     * ---------------------------------------------------------------------- */
}
