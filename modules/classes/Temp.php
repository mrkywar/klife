<?php

abstract class Temp extends Job {

	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->help[] = clienttranslate("A temp can quit their job and play normally in the same turn.");
	}
	
}