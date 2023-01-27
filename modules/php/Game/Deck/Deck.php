<?php

namespace SmileLife\Game\Deck;

use SmileLife\Game\Card\Category\Acquisition\Acquisition;
use SmileLife\Game\Card\Category\Attack\Attack;
use SmileLife\Game\Card\Core\CardLoader;
use SmileLife\Game\Card\Module\BaseGameCardRetriver;
use const BASE_GAME;

/**
 * Description of Deck
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Deck {

    private $cards;
    private $baseGameCardRetriver;

    private const AVIABLE_MODULE = [BASE_GAME];

    public function __construct() {
        CardLoader::load();
    }

    public function generateDeck(array $activatedModules) {
        $cards = BaseGameCardRetriver::retrive();
        $test = $this->testCategories($cards);
        var_dump( $cards);
        die("DECK");
    }

    private function testCategories($cards) {
        $reachedCategories = [
            
            Acquisition::class,
            
        ];
        $result = [];

        foreach ($cards as $card) {
//            echo $card->getClass() . " is_a Studie : " . (int) is_a($card, Studies::class) . "<br/>";
            foreach ($reachedCategories as $category) {
                $result[$category] = ((!isset($result[$category])) ? 0 : $result[$category]) + (int) is_a($card, $category);
            }
        }
        return $result;
        //var_dump($result);
    }

}
