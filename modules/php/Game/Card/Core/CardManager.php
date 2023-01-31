<?php

namespace SmileLife\Game\Card\Core;

use Core\DB\Fields\DBFieldsRetriver;
use Core\DB\QueryString;
use Core\Managers\Core\SuperManager;
use Core\Models\Player;
use Core\Serializers\Serializer;
use Klife;
use SmileLife\Game\Card\Core\Exception\CardException;
use SmileLife\Game\Card\Module\BaseGameCardRetriver;
use const CHOICE_LENGTH_ALL;
use const CHOICE_LENGTH_HALF;
use const CHOICE_LENGTH_QUARTER;
use const CHOICE_LENGTH_THIRD;
use const CHOICE_LENGTH_THREE_QUARTERS;
use const CHOICE_LENGTH_TWO_THIRDS;
use const OPTION_LENGTH;

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

    /* -------------------------------------------------------------------------
     *                  BEGIN - Game Initialization 
     * ---------------------------------------------------------------------- */

    public function initNewGame(array $options) {
        $cards = BaseGameCardRetriver::retrive();
        $maxCards = $this->getCardToKeepCount($cards, $options);

        $aviablePositions = range(1, $maxCards);
        shuffle($aviablePositions);

        $gameManager = Klife::getInstance()->getGameManager();
        $game = $gameManager->findBy();
        $game->setAviableCards($maxCards);
        $gameManager->update($game);

        foreach ($cards as &$card) {
            if (!empty($aviablePositions)) {
                $card->setLocationArg(array_shift($aviablePositions));
            } else {
                $card->setLocation(CardPosition::TRASH); //card isn't playable
            }
        }

        $this->create($cards);
        $this->distributeInitialsCards();
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

    private function distributeInitialsCards() {
        $cardManager = Klife::getInstance()->getCardManager();
        $players = Klife::getInstance()->getPlayerManager()->findBy();

        foreach ($players as $player) {
            $rawcards = Klife::getInstance()->getCardManager()->drawCard(5);
            $cards = $cardManager->getSerializer()->unserialize($rawcards);

            $cardsIds = [];
            foreach ($cards as $card) {
                $cardsIds[] = $card->getId();
            }

            $qb = $this->prepareUpdate($cards)
                    ->addSetter(DBFieldsRetriver::retriveFieldByPropertyName("location", Card::class), CardPosition::PLAYER_HAND)
                    ->addSetter(DBFieldsRetriver::retriveFieldByPropertyName("locationArg", Card::class), $player->getId())
                    ->addClause(DBFieldsRetriver::retriveFieldByPropertyName("id", Card::class), $cardsIds)
            ;

            $this->execute($qb);
        }
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Classic calls
     * ---------------------------------------------------------------------- */

    public function getAllCardsInDeck() {
        return $this->getAllCardsInLocation(CardPosition::DECK);
    }

    public function drawCard($numberCards = 1) {
        $cards = $this->getAllCardsInLocation(CardPosition::DECK, null, $numberCards);
        if (sizeof($cards) < $numberCards) {
            throw new CardException("Not enouth cards aviable");
        }
        return $cards;
    }

    public function getPlayerCards(Player $player) {
        return $this->getAllCardsInLocation(CardPosition::PLAYER_HAND, $player->getId());
    }

    private function getAllCardsInLocation(string $location, int $locationArg = null, $limit = null) {
        $qb = $this->prepareFindBy()
                ->addClause(DBFieldsRetriver::retriveFieldByPropertyName("location", Card::class), $location)
                ->addOrderBy(DBFieldsRetriver::retriveFieldByPropertyName("locationArg", Card::class), QueryString::ORDER_DESC);

        if (null !== $locationArg) {
            $qb->addClause(DBFieldsRetriver::retriveFieldByPropertyName("locationArg", Card::class), $locationArg);
        }
        if (null !== $limit) {
            $qb->setLimit($limit);
        }

        return $this->execute($qb);
//        return $this->prepareFindBy()
//                ->add
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    protected function initSerializer(): Serializer {
        return new CardSerializer(Card::class);
    }

}
