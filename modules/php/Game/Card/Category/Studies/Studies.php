<?php

namespace SmileLife\Game\Card\Category\Studies;

use SmileLife\Game\Card\Core\Card;

/**
 * Description of Studies
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Studies extends Card {

    protected int $level;
    
    public function __construct() {
        parent::__construct();
        
        $this->setSmilePoints(1);
                
    }

    public function canBeAttacked(): bool {
        return true;
    }

    public function canBePlayed(): bool {
        throw new CardException("SC02 TODO: check if the max studies are not reached");
    }

    public function getClass(): string {
        return self::class;
    }

}
