<?php

/**
 * Description of Deck
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Deck {

    private $cards;

    private const AVIABLE_MODULE = [BASE_GAME];

    public function generateDeck(array $activatedModules) {
        $aviableModule = array_merge(self::AVIABLE_MODULE, $activatedModules);
        
        
        foreach ($activatedModules as $module){
            
        }
    }

}
