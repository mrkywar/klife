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

    public function initNewGame() {
//        $this->setIsDebug(true); 
        $cards = BaseGameCardRetriver::retrive();
        $this->create($cards);
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    protected function initSerializer(): Serializer {
        return new CardSerializer(Card::class);
    }

}
