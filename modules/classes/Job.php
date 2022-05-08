<?php

abstract class Job extends ProStatus {
	
	public int $required_studies;
	public int $max_salary;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->smile_points = 2;
		$this->help[] = clienttranslate("This is a job card, you can play it to earn money. The max wage is indicated on the card.");
	}
	
	function canBePlayed() {
		// TODO: check if the required studies are fulfilled
		return true;
	}
}