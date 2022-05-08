<?php

final class MathTeacher extends Teacher {
	
	const MODULE = BASE_GAME;
	const COUNT = 1;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->index = 7;
		$this->required_studies = 2;
		$this->max_salary = 2;
	}
	
}