<?php

namespace SmileLife\Game\Deck;

use ReflectionClass;
use SmileLife\Game\Card\Core\CardLoader;
use SmileLife\Game\Card\Module\BaseGame;
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
    }

}
