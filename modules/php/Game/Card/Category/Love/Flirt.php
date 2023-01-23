<?php

namespace SmileLife\Game\Card\Category\Love;

use SmileLife\Game\Card\Core\CardException;

/**
 * Description of Flirt
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Flirt extends Love {

    private const SMILE_POINTS = 1;

    protected bool $canGenerateChild;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return false;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Firt01 : Check that the player is not married or has not already asked a flirt in the same place or reached the maximum flirt");
    }

    public function canGenerateChild(): bool {
        return $this->getCanGenerateChild();
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Getters & Setters 
     * ---------------------------------------------------------------------- */

    public function getCanGenerateChild(): bool {
        return $this->canGenerateChild;
    }

    public function setCanGenerateChild(bool $canGenerateChild) {
        $this->canGenerateChild = $canGenerateChild;
        return $this;
    }

}
