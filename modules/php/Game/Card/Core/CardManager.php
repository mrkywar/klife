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

        $aviablePositions = range(1, $this->getCardToKeepCount($cards, $options));
        shuffle($aviablePositions);

        foreach ($cards as &$card) {
            if (!empty($aviablePositions)) {
                $card->setLocationArg(array_shift($aviablePositions));
            } else {
                $card->setLocation(CardPosition::TRASH); //card isn't playable
            }
        }

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
            case CHOICE_LENGTH_TWO_THIRDS:
                return round($count * 2 / 3);
            case CHOICE_LENGTH_QUARTER:
                return round($count / 4);
            case CHOICE_LENGTH_THIRD:
                return round($count / 3);
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
