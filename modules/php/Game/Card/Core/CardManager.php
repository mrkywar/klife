<?php

namespace SmileLife\Game\Card\Core;

use Core\Managers\Core\SuperManager;
use Core\Serializers\Serializer;
use ReflectionClass;
use SmileLife\Game\Card\Category\Job;

/**
 * Description of CardManager
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class CardManager extends SuperManager {

    protected function initSerializer(): Serializer {
        return new Serializer(Card::class);
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
        
//        var_dump(clienttranslate("This is a job card, you can play it to earn money. The max wage is indicated on the card."));die;
        $this->setIsDebug(true);
        $job = new Job();

        $job->setLocation("job");

        $this->create($job);
//        $this->setIsDebug(true);
//        $card = new Card();
//        $card->setClass(Card::class);
//        
//        $this->create($card);
    }

}
