<?php

final class Salary1 extends Salary {
	
	const MODULE = BASE_GAME;
	const COUNT = 10;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 33;
		$this->level = 1;
		// $this->description = sprintf(clienttranslate("Level %s"), $this->amount);
	}
}