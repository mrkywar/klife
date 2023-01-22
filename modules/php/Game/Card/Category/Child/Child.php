<?php

namespace SmileLife\Game\Card\Category\Child;

use SmileLife\Game\Card\Core\Card;
use SmileLife\Game\Card\Core\CardException;

/**
 * Description of Child
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Child extends Card {

    public function __construct() {
        parent::__construct();

        $this->setSmilePoints(2);
    }

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("C-Child-01 : check if the required job are fulfilled");
    }

    public function getClass(): string {
        return self::class;
    }

}
