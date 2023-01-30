<?php

namespace SmileLife\Game\Card\Core;

use Core\Models\Core\AbstractModelInterface;
use Core\Models\Core\Model;
use Core\Models\Player;
use Klife;

/**
 * Description of Card
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 * @ORM\Table{"name":"card"}
 */
abstract class Card extends Model {

    /**
     * 
     * @var int|null
     * @ORM\Column{"type":"integer", "name":"card_id" ,"exclude":["insert"]}
     * @ORM\Id
     */
    private $id;

    /**
     * 
     * @var string
     * @ORM\Column{"type":"string", "name":"card_class"}
     */
    private $class;

    /**
     * 
     * @var int|null
     * @ORM\Column{"type":"integer", "name":"card_owner_id"}
     */
    private $ownerId;

    /**
     * 
     * @var string|null
     * @ORM\Column{"type":"string", "name":"card_location", "default":"deck"}
     */
    private $location;

    /**
     * 
     * @var int|null
     * @ORM\Column{"type":"integer", "name":"card_location_arg"}
     */
    private $locationArg = 0;

    /**
     * 
     * @var int|null
     * @ORM\Column{"type":"integer", "name":"card_discarder_id"}
     */
    private $discarderId;

    /**
     * 
     * @var bool
     * @ORM\Column{"type":"bool", "name":"card_is_flipped", "default":"false"}
     */
    private $isFlipped;

    /**
     * 
     * @var bool
     * @ORM\Column{"type":"bool", "name":"card_is_rotated", "default":"false"}
     */
    private $isRotated;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Unpersisted property
     * ---------------------------------------------------------------------- */

    /**
     * 
     * @var array
     */
    private $texts;

    /**
     * 
     * @var array
     */
    private $helps;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Constructor & Display
     * ---------------------------------------------------------------------- */

    public function __construct() {
        $this->setLocation(CardPosition::DECK)
                ->setIsFlipped(false)
                ->setIsRotated(false);

        $this->texts = [];
        $this->helps = [];
    }

    function __toString() {
        $str = get_class($this);
        $str .= '<br />';
        $str .= $this->getSmilePoints() . ($this->getSmilePoints() <= 1 ? ' smile' : ' smiles');
        if (count($this->getTexts()) > 0) {
            $str .= '<br /><br />';
            foreach ($this->getTexts() as $text) {
                $str .= $text['str'] . '<br />';
            }
        }
        if (count($this->getHelps()) > 0) {
            $str .= '<br /><br />';
            $str .= implode('<br />', $this->getHelps());
        }
        return $str;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    abstract public function canBePlayed(): bool;

    abstract public function canBeAttacked(): bool;

    abstract public function getSmilePoints(): int;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Getters & Setters 
     * ---------------------------------------------------------------------- */

    public function getId(): ?int {
        return $this->id;
    }

    abstract public function getClass(): string;

    public function getOwnerId(): ?int {
        return $this->ownerId;
    }

    public function getLocation(): ?string {
        return $this->location;
    }

    public function getLocationArg(): ?int {
        return $this->locationArg;
    }

    public function getDiscarderId(): ?int {
        return $this->discarderId;
    }

    public function getIsFlipped(): bool {
        return $this->isFlipped;
    }

    public function getIsRotated(): bool {
        return $this->isRotated;
    }

    public function setId(?int $id) {
        $this->id = $id;
        return $this;
    }

    public function setClass(string $class) {
        $this->class = $class;
        return $this;
    }

    public function setOwnerId(?int $ownerId) {
        $this->ownerId = $ownerId;
        return $this;
    }

    public function setLocation(string $location) {
        $this->location = $location;
        return $this;
    }

    public function setLocationArg(?int $locationArg) {
        $this->locationArg = $locationArg;
        return $this;
    }

    public function setDiscarderId(?int $discarderId) {
        $this->discarderId = $discarderId;
        return $this;
    }

    public function setIsFlipped(bool $isFlipped) {
        $this->isFlipped = $isFlipped;
        return $this;
    }

    public function setIsRotated(bool $isRotated) {
        $this->isRotated = $isRotated;
        return $this;
    }

    public function getTexts(): array {
        return $this->texts;
    }

    public function getHelps(): array {
        return $this->helps;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Array Add Item
     * ---------------------------------------------------------------------- */

    public function addText(string $text) {
        $this->texts[] = $text;
        return $this;
    }

    public function addHelp(string $help) {
        $this->helps[] = $help;
        return $this;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Shortcut
     * ---------------------------------------------------------------------- */

    public function getPlayerOwner(): ?Player {
        if (null !== $this->getOwnerId()) {
            return Klife::getInstance()
                            ->getPlayerManager()
                            ->findBy(["id" => $this->getOwnerId()]);
        }
        return null;
    }

    public function setPlayerOwner(Player $player) {
        return $this->setOwnerId($player->getId());
    }

    public function getPlayerDiscarder(): ?Player {
        if (null !== $this->getDiscarderId()) {
            return Klife::getInstance()
                            ->getPlayerManager()
                            ->findBy(["id" => $this->getDiscarderId()]);
        }
        return null;
    }

    public function setPlayerDiscarder(Player $player) {
        return $this->setDiscarderId($player->getId());
    }

}
