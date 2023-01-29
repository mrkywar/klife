<?php

namespace SmileLife\Game\Game;

use Core\Models\Core\Model;

/**
 * Description of Game
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */

/**
 * Description of Player
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 * @ORM\Table{"name":"game"}
 */
class Game extends Model {

    /**
     * 
     * @var int
     * @ORM\Column{"type":"integer", "name":"game_id"}
     * @ORM\Id
     */
    private $id;

    /**
     * 
     * @var array
     * @ORM\Column{"type":"json", "name":"game_option"}
     * @ORM\Id
     */
    private $options;

    /* -------------------------------------------------------------------------
     *                  BEGIN - Getters & Setters 
     * ---------------------------------------------------------------------- */

    public function getId(): int {
        return $this->id;
    }

    public function getOptions(): array {
        return $this->options;
    }

    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    public function setOptions(array $options) {
        $this->options = $options;
        return $this;
    }

}