
-- ------
-- BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
-- klife implementation : © <Your name here> <Your email address here>
-- 
-- This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
-- See http://en.boardgamearena.com/#!doc/Studio for more information.
-- -----

-- dbmodel.sql

CREATE TABLE IF NOT EXISTS `log` (
    `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `log_date` varchar(50) NOT NULL,
    `log_category` varchar(50) NOT NULL,
    `log_content` text NOT NULL,
    PRIMARY KEY(`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `game` (
    `game_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `game_option` text NULL,
    `game_aviable_cards` int(5) NULL,
    PRIMARY KEY(`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `player_attributes`(
    `attributes_player_id` int(10) UNSIGNED NOT NULL,
    `attributes_max_cards` int(1) UNSIGNED NOT NULL,
    PRIMARY KEY(`attributes_player_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `card` (
  `card_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_class` varchar(255) NOT NULL COMMENT 'Type of the card (matches the class name the card need to be instanciated with)',
  `card_owner_id` int(10) NULL COMMENT 'The id of the owner it it means something. 0 otherwise',
  `card_location` varchar(50) NULL COMMENT 'deck, hand, discard, removed, or a specific location on board',
  `card_location_arg` int(10) NULL COMMENT 'Position in the given location (+ owner if there is one). Bottom is 0, top is max.',
  `card_discarder_id` int(10) NULL COMMENT 'The id of the player who discarded the card, only if the card is in discard location. That player cannot take this card back. 0 otherwise',
  `card_is_flipped` BOOLEAN NOT NULL COMMENT 'FALSE if the card is face up, TRUE if the card is flipped (ie. in deck or protected in player location)',
  `card_is_rotated` BOOLEAN NOT NULL COMMENT 'FALSE if the card is vertical, TRUE if the card is rotated 90 degrees (used for flirts enabling children, when that card was used to have a child)',
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;