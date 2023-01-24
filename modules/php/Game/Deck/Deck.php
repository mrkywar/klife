<?php

namespace SmileLife\Game\Deck;

use ReflectionClass;
use SmileLife\Game\Card\Core\CardLoader;
use SmileLife\Game\Card\Module\BaseGame;
use const BASE_GAME;

/**
 * Description of Deck
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Deck {

    private $cards;

    private const AVIABLE_MODULE = [BASE_GAME];

    public function __construct() {
        CardLoader::load();
    }

    public function generateDeck(array $activatedModules) {
        echo "<pre>";
//        var_dump(get_declared_classes());

        $aviableClasses = get_declared_classes();
        $this->getBaseGameCards($aviableClasses);
//        $aviableModule = array_merge(self::AVIABLE_MODULE, $activatedModules);
//        //$wedd = new Wedding();
//        echo "<pre>";
//        $dir = dirname(__FILE__);
//        $dir = substr($dir, 0, strripos($dir, "/"));
//        var_dump(get_declared_classes(), $this->smk_get_classes_from_project($dir), $dir);
//        die;
    }

    private function getBaseGameCards(array $classes) {
        $baseInterface = BaseGame::class;

        foreach ($classes as $class) {
            $reflexion = new ReflectionClass($class);
            if ($reflexion->implementsInterface($baseInterface)) {
                echo " # " . $class . " OK<br/>";
            } else {
                echo " - " . $class . " <br/>";
            }
        }
    }

}
