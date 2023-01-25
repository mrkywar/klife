<?php

namespace SmileLife\Game\Card\Category\Love\Flirt;

use SmileLife\Game\Card\Module\BaseGame;

/**
 * Description of CinemaFlirt
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class CinemaFlirt extends Flirt implements BaseGame {
    /* -------------------------------------------------------------------------
     *                  BEGIN - Abstract
     * ---------------------------------------------------------------------- */

    public function canGenerateChild(): bool {
        return false;
    }

    public function getClass(): string {
        return self::class;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Implement BaseGame
     * ---------------------------------------------------------------------- */

    public function getBaseCardCount(): int {
        return 2;
    }
}