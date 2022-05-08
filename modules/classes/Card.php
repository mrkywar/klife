<?php

abstract class Card {
	
	public static SmileLife $game;
	public static int $ref_width = REF_CARD_WIDTH; // Reference dimensions for a card. The positionning of text are given relatively to that reference
	public static int $ref_height = REF_CARD_HEIGHT; //
	
	public int $id;
	public int $owner_id;
	public string $location;
	public int $position;
	public int $discarder_id;
	public bool $is_flipped;
	public bool $is_rotated;
	
	public int $index;
	public int $smile_points;
	public array $texts;
	public array $help;
	
	function __construct($card) {
		$this->id = $card['id'];
		$this->owner_id = $card['owner_id'];
		$this->location = $card['location'];
		$this->position = $card['position'];
		$this->discarder_id = $card['discarder_id'];
		$this->is_flipped = $card['is_flipped'];
		$this->is_rotated = $card['is_rotated'];
		$this->texts = [];
		$this->help = [];
	}
	
	function __toString() {
		$str = get_class($this);
		$str .= '<br />';
		$str .= $this->smile_points . ($this->smile_points <= 1 ? ' smile' : ' smiles'); 
		if (count($this->texts) > 0) {
			$str .= '<br /><br />';
			foreach ($texts as $text) {
				$str .= $text['str'] . '<br />';
			}
		}
		if (count($this->help) > 0) {
			$str .= '<br /><br />';
			$str .= implode('<br />', $this->help);
		}
		return $str;
	}
	/*
	 * Get the location name the card should be among if played.
	 * This information is contained by its ancestor class which contains the LOCATION_SIGNIFICANT flag.
	 */
	function getDedicatedLocation() {
		$class = get_class($this);
		
		// Search until the LOCATION_SIGNIFICANT flag is not defined anymore
		do {
			$parent_class = get_parent_class($class);
			if (!defined($parent_class . '::LOCATION_SIGNIFICANT')) {
				// The parent class does not contain the flag
				// Hence, the current class represents the dedicated location
				return $class;
			}
			$class = $parent_class;
		} while ($class != 'Card');
		
		throw new BgaVisibleSystemException('Dedicated location not found.');
	}
	
	function canBePlayed() {
		return true; // By default, any card can be played except specified otherwise
	}
	
	function play() {
		// TODO
	}
	
	function discard() {
		// TODO
	}
}