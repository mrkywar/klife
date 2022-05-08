
-- ------
-- BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
-- Smile Life implementation : © Jean Portemer <jportemer@mailz.org>
-- 
-- This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
-- See http://en.boardgamearena.com/#!doc/Studio for more information.
-- -----

-- dbmodel.sql

-- This is the file where you are describing the database schema of your game
-- Basically, you just have to export from PhpMyAdmin your table structure and copy/paste
-- this export here.
-- Note that the database itself and the standard tables ("global", "stats", "gamelog" and "player") are
-- already created and must not be created here

-- Note: The database schema is created from this file when the game starts. If you modify this file,
--       you have to restart a game to see your changes in database.

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(32) NOT NULL COMMENT 'Type of the card (matches the class name the card need to be instanciated with)',
  `owner_id` int(11) NOT NULL COMMENT 'The id of the owner it it means something. 0 otherwise',
  `location` varchar(16) NOT NULL COMMENT 'deck, hand, discard, removed, or a specific location on board',
  `position` int(11) NOT NULL COMMENT 'Position in the given location (+ owner if there is one). Bottom is 0, top is max.',
  `discarder_id` int(11) NOT NULL COMMENT 'The id of the player who discarded the card, only if the card is in discard location. That player cannot take this card back. 0 otherwise',
  `is_flipped` BOOLEAN NOT NULL COMMENT 'FALSE if the card is face up, TRUE if the card is flipped (ie. in deck or protected in player location)',
  `is_rotated` BOOLEAN NOT NULL COMMENT 'FALSE if the card is vertical, TRUE if the card is rotated 90 degrees (used for flirts enabling children, when that card was used to have a child)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


-- Example 2: add a custom field to the standard "player" table
-- ALTER TABLE `player` ADD `player_my_custom_field` INT UNSIGNED NOT NULL DEFAULT '0';

