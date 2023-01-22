<?php

namespace SmileLife\Game\Card\Core;

use Core\Managers\Core\SuperManager;
use Core\Serializers\Serializer;
use Klife;

/**
 * Description of CardManager
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class CardManager extends SuperManager {

    protected function initSerializer(): Serializer {
        return new CardSerializer(Card::class);
    }

    public function tryCard() {
//        echo get_parent_class(Job::class);
////        $class = new ReflectionClass(Job::class);
//        echo"<pre>";
////        var_dump($class, $class->getExtension());
////        foreach (get_declared_classes() as $class) {
////            if (is_subclass_of($class, Card::class)) {
////                 echo $class.' == is a child class of Card<br>';
////            }else{
////                echo $class."<br/>";
////            }
////        }
//        die;
        $players = Klife::getInstance()->getPlayerManager()->findBy();
        $cards = $this->findBy();
        echo "<pre>";
        var_dump($cards, $players);
        die;

//        $this->setIsDebug(true);
//        $job = new Job();
//
//        $job->setLocation("job");
//
//        $this->create($job);
////        $this->setIsDebug(true);
//        $card = new Card();
//        $card->setClass(Card::class);
//        
//        $this->create($card);
    }

}
