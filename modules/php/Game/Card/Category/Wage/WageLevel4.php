<?php

namespace SmileLife\Game\Card\Category\Wage;

use SmileLife\Game\Card\Core\CardType;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of WageLevel4
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class WageLevel4 extends Wage implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getAmount(): int {
        return 4;
    }

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return CardType::WAGE_LEVEL_4;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 10;
    }

}
