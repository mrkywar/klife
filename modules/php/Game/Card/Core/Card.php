<?php

namespace SmileLife\Game\Card\Core;

use Core\Models\Core\Model;
use Core\Models\Player;
use Klife;

/**
 * Description of Card
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 * @ORM\Table{"name":"card"}
 */
/* abstract */ class Card extends Model {

    /**
     * 
     * @var int|null
     * @ORM\Column{"type":"integer", "name":"card_id" ,"exclude":["insert"]}
     * @ORM\Id
     */
    protected $id;

    /**
     * 
     * @var string
     * @ORM\Column{"type":"string", "name":"card_class"}
     */
    protected $class;

    /**
     * 
     * @var int|null
     * @ORM\Column{"type":"integer", "name":"card_owner_id"}
     */
    protected $ownerId;

    /**
     * 
     * @var string|null
     * @ORM\Column{"type":"string", "name":"card_location", "default":"deck"}
     */
    protected $location;

    /**
     * 
     * @var int|null
     * @ORM\Column{"type":"integer", "name":"card_location_arg"}
     */
    protected $locationArg = 0;

    /**
     * 
     * @var int|null
     * @ORM\Column{"type":"integer", "name":"card_discarder_id"}
     */
    protected $discarderId;

    /**
     * 
     * @var bool
     * @ORM\Column{"type":"bool", "name":"card_is_flipped", "default":"false"}
     */
    protected $isFlipped;

    /**
     * 
     * @var bool
     * @ORM\Column{"type":"bool", "name":"card_is_rotated", "default":"false"}
     */
    protected $isRotated;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Unpersisted property
     * ---------------------------------------------------------------------- */

    /**
     * 
     * @var int
     */
    protected $smilePoints;

    /**
     * 
     * @var array
     */
    protected $texts;

    /**
     * 
     * @var array
     */
    protected $help;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Constructor & Display
     * ---------------------------------------------------------------------- */

    public function __construct() {
        $this->setLocation("deck")
                ->setIsFlipped(false)
                ->setIsRotated(false);

        $this->texts = [];
        $this->help = [];
    }

    function __toString() {
        $str = get_class($this);
        $str .= '<br />';
        $str .= $this->smilePoints . ($this->smilePoints <= 1 ? ' smile' : ' smiles');
        if (count($this->texts) > 0) {
            $str .= '<br /><br />';
            foreach ($this->texts as $text) {
                $str .= $text['str'] . '<br />';
            }
        }
        if (count($this->help) > 0) {
            $str .= '<br /><br />';
            $str .= implode('<br />', $this->help);
        }
        return $str;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    //abstract public function getCategory();

    /* -------------------------------------------------------------------------
     *                  BEGIN - Getters & Setters 
     * ---------------------------------------------------------------------- */

    public function getId(): ?int {
        return $this->id;
    }

    public function getClass(): string {
        return $this->class;
    }

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
