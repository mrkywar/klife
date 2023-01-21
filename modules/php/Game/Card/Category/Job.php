<?php
namespace SmileLife\Game\Card\Category;

use SmileLife\Game\Card\Core\Card;

/**
 * Description of Job
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
/*abstract*/ class Job extends Card {

    protected int $requiredStudies;
    protected int $maxSalary;

    public function __construct() {
        parent::__construct();
        
        $this->setClass(self::class);

        $this->smilePoints = 2;
        $this->help[] = clienttranslate("This is a job card, you can play it to earn money. The max wage is indicated on the card.");
    }

    function canBePlayed() {
        // TODO: check if the required studies are fulfilled
        return true;
    }

}
