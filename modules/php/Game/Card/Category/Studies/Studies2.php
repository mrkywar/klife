<?php

namespace SmileLife\Game\Card\Category\Studies;

use SmileLife\Game\Card\Core\CardType;
use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of Studies1
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Studies2 extends Studies implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function getLevel(): int {
        return 2;
    }
    
    public function getClass(): string {
        return self::class;
    }
    
    public function getType(): int {
        return CardType::STUDY_DOUBLE;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 3;
    }

}
