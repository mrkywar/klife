<?php

abstract class Official extends Job {

	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->precisions[] = clienttranslate("Official");
		$this->help[] = clienttranslate("An official cannot be fired (but can still quit).");
		
	}
	
}