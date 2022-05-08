<?php

final class Salary2 extends Salary {
	
	const MODULE = BASE_GAME;
	const COUNT = 10;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 34;
		$this->level = 2;
		// $this->description = sprintf(clienttranslate("Level %s"), $this->amount);
	}
}