<?php

namespace SmileLife\Game\Deck;

use SmileLife\Game\Card\Core\CardLoader;
use const BASE_GAME;

/**
 * Description of Deck
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Deck {

    private $cards;

    private const AVIABLE_MODULE = [BASE_GAME];

    public function generateDeck(array $activatedModules) {
        CardLoader::load();
//        $aviableModule = array_merge(self::AVIABLE_MODULE, $activatedModules);
//        //$wedd = new Wedding();
//        echo "<pre>";
//        $dir = dirname(__FILE__);
//        $dir = substr($dir, 0, strripos($dir, "/"));
//        var_dump(get_declared_classes(), $this->smk_get_classes_from_project($dir), $dir);
//        die;
    }

        

}
