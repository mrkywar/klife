<?php

abstract class Salary extends Pro {
	
	const LOCATION_SIGNIFICANT = true;
	
	public int $level;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->smile_points = 1;
		$this->help[] = clienttranslate("This is a wage card, you can play it if you have a job that enables you to get paid the specified amount.");
	}
	
}