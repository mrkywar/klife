<?php

namespace SmileLife\Game\Card\Category\Love\Wedding;

use Klife;
use SmileLife\Game\Card\Category\Love\Love;
use SmileLife\Game\Card\Core\Exception\CardException;

/**
 * Description of Wedded
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class Wedding extends Love {

    private const SMILE_POINTS = 3;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Wedding01 : Check that the player is not married and has already at least a flirt");
    }

    public function canGenerateChild(): bool {
        return true;
    }

    public function getSmilePoints(): int {
        return self::SMILE_POINTS;
    }
    
    public function getTitle(): string {
        return Klife::getInstance()->i18n('Wedding');
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame (1 card in each type)
     * ---------------------------------------------------------------------- */
    
    public function getBaseCardCount(): int {
        return 1;
    }

}
