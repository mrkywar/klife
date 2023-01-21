<?php

namespace Game\Card\Core;

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
     * @ORM\Column{"type":"integer", "name":"card_id"}
     * @ORM\Id
     */
    protected $id;

    /**
     * 
     * @var string
     * @ORM\Column{"type":"varchar", "name":"card_class"}
     */
    protected $class;

    /**
     * 
     * @var int
     * @ORM\Column{"type":"integer", "name":"card_owner_id", "default":"0"}
     */
    protected $ownerId;

    /**
     * 
     * @var string
     * @ORM\Column{"type":"varchar", "name":"card_location", "default":"deck"}
     */
    protected $location;

    /**
     * 
     * @var int
     * @ORM\Column{"type":"integer", "name":"card_location_arg, "default":"0"}
     */
    protected $locationArg;

    /**
     * 
     * @var int
     * @ORM\Column{"type":"integer", "name":"card_discarder_id, "default":"0"}
     */
    protected $discarderId;

    /**
     * 
     * @var boolean
     * @ORM\Column{"type":"bool", "name":"card_is_flipped, "default":"0"}
     */
    protected $isFlipped;

    /**
     * 
     * @var boolean
     * @ORM\Column{"type":"bool", "name":"card_is_rotated, "default":"0"}
     */
    protected $isRotated;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    abstract public function getCategory();

    /* -------------------------------------------------------------------------
     *                  BEGIN - Getters & Setters 
     * ---------------------------------------------------------------------- */

    public function getId(): ?int {
        return $this->id;
    }

    public function getClass(): string {
        return $this->class;
    }

    public function getOwnerId(): int {
        return $this->ownerId;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function getLocationArg(): int {
        return $this->locationArg;
    }

    public function getDiscarderId(): int {
        return $this->discarderId;
    }

    public function getIsFlipped(): boolean {
        return $this->isFlipped;
    }

    public function getIsRotated(): boolean {
        return $this->isRotated;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setClass(string $class): void {
        $this->class = $class;
    }

    public function setOwnerId(int $ownerId): void {
        $this->ownerId = $ownerId;
    }

    public function setLocation(string $location): void {
        $this->location = $location;
    }

    public function setLocationArg(int $locationArg): void {
        $this->locationArg = $locationArg;
    }

    public function setDiscarderId(int $discarderId): void {
        $this->discarderId = $discarderId;
    }

    public function setIsFlipped(boolean $isFlipped): void {
        $this->isFlipped = $isFlipped;
    }

    public function setIsRotated(boolean $isRotated): void {
        $this->isRotated = $isRotated;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Shortcut
     * ---------------------------------------------------------------------- */

    public function getPlayerOwner(): ?Player {
        if (0 !== $this->getOwnerId()) {
            return Klife::getInstance()
                            ->getPlayerManager()
                            ->findBy(["id" => $this->getOwnerId()]);
        }
        return;
    }

    public function setPlayerOwner(Player $player) {
        return $this->setOwnerId($player->getId());
    }

    public function getPlayerDiscarder(): ?Player {
        if (0 !== $this->getDiscarderId()) {
            return Klife::getInstance()
                            ->getPlayerManager()
                            ->findBy(["id" => $this->getDiscarderId()]);
        }
        return;
    }

    public function setPlayerDiscarder(Player $player) {
        return $this->setDiscarderId($player->getId());
    }

}
