<?php

namespace SmileLife\Game\Card\Category\Salary;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\CardException;

/**
 * Description of Salary
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Salary extends Card {
    
    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
         throw new CardException("CS01 TODO: check if the required job are fulfilled");
    }

    public function getClass(): string {
        return self::class;
    }

}
