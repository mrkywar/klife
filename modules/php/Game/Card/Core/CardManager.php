<?php

namespace SmileLife\Game\Card\Core;

use Core\Managers\Core\SuperManager;
use Core\Serializers\Serializer;
use Klife;
use SmileLife\Game\Card\Category\Job;

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
        $this->setIsDebug(true);
        $job = new Job();

        $job->setLocation("job");

        $this->create($job);

        $players = Klife::getInstance()->getPlayerManager()->findBy();
        $cards = $this->findBy();
        echo "<pre>";
        var_dump($cards, $players);
        die;
    }

}
