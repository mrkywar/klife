<?php

namespace SmileLife\Game\Card\Category\Job;

use SmileLife\Game\Card\Core\Exception\CardException;

/**
 * Description of JobBonus
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class JobBonus extends Job {

    public function canBePlayed(): bool {
        throw new CardException("C-JobBonnus-01 : check if the required Job are played");
    }

}
