<?php

namespace SmileLife\Game\Card\Core;

use Core\Managers\Core\SuperManager;
use Core\Serializers\Serializer;

/**
 * Description of CardManager
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class CardManager extends SuperManager{
    protected function initSerializer(): Serializer {
        return new Serializer(Card::class);
    }
    
    
    public function tryCard() {
        $this->setIsDebug(true);
        $card = new Card();
        $card->setClass(Card::class);
        
        $this->create($card);
                
        
    }

}
