<?php

namespace SmileLife\Game\Card\Category\Job;

/**
 * Description of Offical
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class Offical extends Job {

    public function __construct() {
        parent::__construct();

        $this->addText(clienttranslate("An official cannot be fired (but can still quit)."));
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Override
     * ---------------------------------------------------------------------- */

    final public function canBeAttacked(): bool {
        return false;
    }

}
