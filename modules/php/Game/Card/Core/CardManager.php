<?php

namespace SmileLife\Game\Card\Core;

use Core\Managers\Core\SuperManager;
use Core\Serializers\Serializer;
use SmileLife\Game\Card\Module\BaseGameCardRetriver;

/**
 * Description of CardManager
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class CardManager extends SuperManager {

    private const AVIABLE_MODULE = [BASE_GAME];

    public function __construct() {
        //parent::__construct();

        $this->setUseSerializerClass(true);
        CardLoader::load();
    }

    public function initNewGame(array $options) {
//        $this->setIsDebug(true); 
        $cards = BaseGameCardRetriver::retrive();

        //** TODO To redo Cards To keep from options 


        $this->create($cards);
    }

    private function getCardToKeepCount(array $cards, array $options) {
        $count = sizeof($cards);
        if (!isset($options[OPTION_LENGTH])) {
            $options[OPTION_LENGTH] = CHOICE_LENGTH_ALL;
        }

        switch ($options[OPTION_LENGTH]) {
            case CHOICE_LENGTH_HALF:
                return round($count / 2);
            case CHOICE_LENGTH_THREE_QUARTERS:
                return round($count * 3 / 4);
            default :
                return $count;
        }
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    protected function initSerializer(): Serializer {
        return new CardSerializer(Card::class);
    }

}
