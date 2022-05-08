<?php

final class Studies1 extends Studies {
	
	const MODULE = BASE_GAME;
	const COUNT = 22;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 1;
		$this->level = 1;
	}
}