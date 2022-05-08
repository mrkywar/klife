<?php

final class FrenchTeacher extends Teacher {
	
	const MODULE = BASE_GAME;
	const COUNT = 1;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 4;
		$this->required_studies = 2;
		$this->max_salary = 2;
	}
	
}