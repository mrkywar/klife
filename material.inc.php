<?php

use SmileLife\Game\Card\Core\CardType;

/**
 * ------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * klife implementation : © <Your name here> <Your email address here>
 * 
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * material.inc.php
 *
 * klife game material description
 *
 * Here, you can describe the material of your game with PHP variables.
 *   
 * This file is loaded in your game logic class constructor, ie these variables
 * are available everywhere in your game logic code.
 *
 */
require_once 'modules/constants.inc.php';

$this->cardProperty = array(
    /* -------------------------------------------------------------------------
     *                  BEGIN - ATTACK
     * ---------------------------------------------------------------------- */
    CardType::ATTACK_ACCIDENT => [
        "title" => clienttranslate('Accident'),
        "subtitle" => "",
        "text" => clienttranslate("Take a turn"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_BURN_OUT => [
        "title" => clienttranslate('Burn out'),
        "subtitle" => "",
        "text" => clienttranslate("Take a turn if you're working"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_DISMISSAL => [
        "title" => clienttranslate('Dismissal'),
        "subtitle" => "",
        "text" => clienttranslate("You lose your job"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_DIVORCE => [
        "title" => clienttranslate('Divorce'),
        "subtitle" => "",
        "text" => clienttranslate("You lose your marriage"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_GRADE_REPETITION => [
        "title" => clienttranslate('Grade repetition'),
        "subtitle" => "",
        "text" => clienttranslate("Discard last study card "
                . "(if you are a student)"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_HUMAN_ATTACK => [
        "title" => clienttranslate('Human Attack'),
        "subtitle" => "",
        "text" => clienttranslate("Discard all child cards including your own"),
        "text2" => "",
    ],
    CardType::ATTACK_ILLNESS => [
        "title" => clienttranslate('Illness'),
        "subtitle" => "",
        "text" => clienttranslate("Take a turn"),
        "text2" => "",
    ],
    CardType::ATTACK_INCOME_TAX => [
        "title" => clienttranslate('Income tax'),
        "subtitle" => "",
        "text" => clienttranslate("Discard your last salary card if you work"),
        "text2" => "",
    ],
    CardType::ATTACK_JAIL => [
        "title" => clienttranslate('Jail'),
        "subtitle" => "",
        "text" => clienttranslate("Skip 3 turns if you are a bandit then "
                . "discard both cards"),
        "text2" => "",
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - PET
     * ---------------------------------------------------------------------- */
    CardType::PET_CAT => [
        "title" => clienttranslate('Pet'),
        "subtitle" => "",
        "text" => clienttranslate("Meow ..."),
        "text2" => "",
    ],
    CardType::PET_DOG => [
        "title" => clienttranslate('Pet'),
        "subtitle" => "",
        "text" => clienttranslate("Woof woof !!"),
        "text2" => "",
    ],
    CardType::PET_CHICK => [
        "title" => clienttranslate('Pet'),
        "subtitle" => "",
        "text" => clienttranslate("Piou Piou !"),
        "text2" => "",
    ],
    CardType::PET_RABBIT => [
        "title" => clienttranslate('Pet'),
        "subtitle" => "",
        "text" => clienttranslate("Honk honk !"),
        "text2" => "",
    ],
    CardType::PET_UNICORN => [
        "title" => clienttranslate('Pet'),
        "subtitle" => "",
        "text" => clienttranslate("Worth double if you also play the rainbow &"
                . " shooting star cards!"),
        "text2" => "",
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - TRAVEL
     * ---------------------------------------------------------------------- */
    CardType::TRAVEL_CAIRO => [
        "title" => clienttranslate('Travel'),
        "subtitle" => clienttranslate("Cairo"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    CardType::TRAVEL_LONDON => [
        "title" => clienttranslate('Travel'),
        "subtitle" => clienttranslate("London"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    CardType::TRAVEL_NEW_YORK => [
        "title" => clienttranslate('Travel'),
        "subtitle" => clienttranslate("New York"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    CardType::TRAVEL_RIO => [
        "title" => clienttranslate('Travel'),
        "subtitle" => clienttranslate("Rio de Janeiro"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    CardType::TRAVEL_SYDNEY => [
        "title" => clienttranslate('Travel'),
        "subtitle" => clienttranslate("Sydney"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - HOUSE
     * ---------------------------------------------------------------------- */
    CardType::HOUSE_SMALL_1 => [
        "title" => clienttranslate('House'),
        "subtitle" => "",
        "text" => clienttranslate("Minimum intake"),
        "text2" => clienttranslate("Half price if you are married"),
    ],
    CardType::HOUSE_SMALL_2 => [
        "title" => clienttranslate('House'),
        "subtitle" => "",
        "text" => clienttranslate("Minimum intake"),
        "text2" => clienttranslate("Half price if you are married"),
    ],
    CardType::HOUSE_MEDIUM_1 => [
        "title" => clienttranslate('House'),
        "subtitle" => "",
        "text" => clienttranslate("Minimum intake"),
        "text2" => clienttranslate("Half price if you are married"),
    ],
    CardType::HOUSE_MEDIUM_2 => [
        "title" => clienttranslate('House'),
        "subtitle" => "",
        "text" => clienttranslate("Minimum intake"),
        "text2" => clienttranslate("Half price if you are married"),
    ],
    CardType::HOUSE_BIG => [
        "title" => clienttranslate('House'),
        "subtitle" => "",
        "text" => clienttranslate("Minimum intake"),
        "text2" => clienttranslate("Half price if you are married"),
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - REWARD
     * ---------------------------------------------------------------------- */
    CardType::REWARD_EXCELLENCE => [
        "title" => clienttranslate('Grand Prize of Excellence'),
        "subtitle" => "",
        "text" => clienttranslate("Attribution reserved for writers, "
                . "researchers, journalists"),
        "text2" => clienttranslate("You can play salaries from 1 to 4 as long "
                . "as you practice the rewarded profession"),
    ],
    CardType::REWARD_HONOR_LEGION => [
        "title" => clienttranslate('Honor Legion'),
        "subtitle" => "",
        "text" => clienttranslate("The nation decorates you (all except bandit)"),
        "text2" => "",
    ],
);

