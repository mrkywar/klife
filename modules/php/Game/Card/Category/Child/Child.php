<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\Exception\CardException;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Child
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Child extends Card{
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Child-01 : check if the required job are fulfilled");
    }

    public function getSmilePoints(): int {
        return 2;
    }
    
    public function getRefClass(): string {
        return $this->getClass();
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame (1 card in each type)
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 1;
    }

}
