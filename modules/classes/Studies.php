<?php

abstract class Studies extends ProStatus {
	
	public int $level;
	
	function __construct(...$_) {
		parent::__construct(...$_);
		
		$this->smile_points = 1;
		$this->texts[] = [
			'str' => clienttranslate("Graduate Studies"),
			'text-transform' => 'uppercase',
			
			'font-family' => FF_0,
			'font-weight' => 'normal',
			'font-style' => 'normal',
			'font-size' => 10,
			'color' => 'white',
			
			'boxes' => [['left' => 20, 'top' => 15, 'width' => 60, 'height' => 5], ['left' => 20, 'top' => 75, 'width' => 60, 'height' => 5]],
		];
		$this->help[] = clienttranslate("This is a study card, playing it can help you to get better jobs.");
	}
}