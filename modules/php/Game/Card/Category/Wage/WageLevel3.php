<?php

namespace SmileLife\Game\Card\Category\Wage;

use SmileLife\Game\Card\Category\Wage\Wage;
use SmileLife\Game\Card\Core\CardType;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of WageLevel3
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class WageLevel3 extends Wage implements BaseGame {

    public function __construct() {
        parent::__construct();

        $this->setText1(clienttranslate('Level ${level}', ['level' => 3]));
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getAmount(): int {
        return 3;
    }

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return CardType::WAGE_LEVEL_3;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 10;
    }

}
