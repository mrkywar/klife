<?php

namespace SmileLife\Game\Card\Category\Love\Flirt;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of WebFlirt
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class WebFlirt extends Flirt implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canGenerateChild(): bool {
        return false;
    }

    public function getClass(): string {
        return self::class;
    }

    public function getType(): int {
        return 41;
    }
    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 2;
    }
}
