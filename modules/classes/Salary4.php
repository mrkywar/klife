<?php

final class Salary4 extends Salary {
	
	const MODULE = BASE_GAME;
	const COUNT = 10;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 36;
		$this->level = 4;
		// $this->description = sprintf(clienttranslate("Level %s"), $this->amount);
	}
}