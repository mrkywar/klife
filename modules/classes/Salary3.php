<?php

final class Salary3 extends Salary {
	
	const MODULE = BASE_GAME;
	const COUNT = 10;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 35;
		$this->level = 3;
		// $this->description = sprintf(clienttranslate("Level %s"), $this->amount);
	}
}