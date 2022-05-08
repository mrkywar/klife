<?php

abstract class Pro extends Card {

	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->help[] = clienttranslate("This is a card related to your professional life.");
	}
}