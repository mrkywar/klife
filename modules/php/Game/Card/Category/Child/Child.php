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
class Child extends Card implements BaseGame {

    private const SMILE_POINTS = 2;
    private const BG_CARDS_COUNT = 6;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Child-01 : check if the required job are fulfilled");
    }

    public function getClass(): string {
        return self::class;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int  {
        return self::BG_CARDS_COUNT;
    }

}
