<?php

final class Studies2 extends Studies {
	
	const MODULE = BASE_GAME;
	const COUNT = 3;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 2;
		$this->level = 2;
	}
}