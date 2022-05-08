<?php

final class GreatTeacher extends Teacher {
	
	const MODULE = BASE_GAME;
	const COUNT = 1;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 8;
		$this->required_studies = 0;
		$this->max_salary = 2;
	}
	
	function canBePlayed() {
		// TODO: check if the player is a teacher already
		return true;
	}
}