<?php

namespace SmileLife\Game\Card\Category\Studies;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\Exception\CardException;


/**
 * Description of Studies
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Studies extends Card {

    private const SMILE_POINT = 1;

    /* -------------------------------------------------------------------------
     *                  BEGIN - new Abstract
     * ---------------------------------------------------------------------- */

    abstract public function getLevel(): int;
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Studies-01 : check if the max studies are not reached");
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINT;
    }
    
    public function getRefClass(): string {
        return self::class;
    }

}
