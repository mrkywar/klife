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
require_once "modules/constants.inc.php";

$this->cardProperty = array(
    /* -------------------------------------------------------------------------
     *                  BEGIN - ATTACK
     * ---------------------------------------------------------------------- */
    CardType::ATTACK_ACCIDENT => [
        "title" => clienttranslate("Accident"),
        "subtitle" => "",
        "text" => clienttranslate("Skip your turn"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_BURN_OUT => [
        "title" => clienttranslate("Burn out"),
        "subtitle" => "",
        "text" => clienttranslate("Take a turn if you're working"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_DISMISSAL => [
        "title" => clienttranslate("Dismissal"),
        "subtitle" => "",
        "text" => clienttranslate("You're fired. Discard your actual job card"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_DIVORCE => [
        "title" => clienttranslate("Divorce"),
        "subtitle" => "",
        "text" => clienttranslate("You lose your marriage"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_GRADE_REPETITION => [
        "title" => clienttranslate("Grade repetition"),
        "subtitle" => "",
        "text" => clienttranslate("If you’re a student, discard your last"
                . " education card"),
        "text2" => clienttranslate(""),
    ],
    CardType::ATTACK_HUMAN_ATTACK => [
        "title" => clienttranslate("Terrorist attack"),
        "subtitle" => "",
        "text" => clienttranslate("Discard all child cards including your own"),
        "text2" => "",
    ],
    CardType::ATTACK_SICKNESS=> [
        "title" => clienttranslate("Illness"),
        "subtitle" => "",
        "text" => clienttranslate("Skip your turn"),
        "text2" => "",
    ],
    CardType::ATTACK_INCOME_TAX => [
        "title" => clienttranslate("Income tax"),
        "subtitle" => "",
        "text" => clienttranslate("Discard your last paycheck card if you have"
                . " a job"),
        "text2" => "",
    ],
    CardType::ATTACK_JAIL => [
        "title" => clienttranslate("Jail"),
        "subtitle" => "",
        "text" => clienttranslate("Skip 3 turns if you are a bandit then "
                . "discard both cards"),
        "text2" => "",
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - PET
     * ---------------------------------------------------------------------- */
    CardType::PET_CAT => [
        "title" => clienttranslate("Pet"),
        "subtitle" => "",
        "text" => clienttranslate("Meow ..."),
        "text2" => "",
    ],
    CardType::PET_DOG => [
        "title" => clienttranslate("Pet"),
        "subtitle" => "",
        "text" => clienttranslate("Woof woof !!"),
        "text2" => "",
    ],
    CardType::PET_CHICK => [
        "title" => clienttranslate("Pet"),
        "subtitle" => "",
        "text" => clienttranslate("Piou Piou !"),
        "text2" => "",
    ],
    CardType::PET_RABBIT => [
        "title" => clienttranslate("Pet"),
        "subtitle" => "",
        "text" => clienttranslate("Honk honk !"),
        "text2" => "",
    ],
    CardType::PET_UNICORN => [
        "title" => clienttranslate("Pet"),
        "subtitle" => "",
        "text" => clienttranslate("Worth twice its value if your put it down "
                . "with a rainbow or shooting star card!"),
        "text2" => "",
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - TRAVEL
     * ---------------------------------------------------------------------- */
    CardType::TRAVEL_CAIRO => [
        "title" => clienttranslate("Travel"),
        "subtitle" => clienttranslate("Cairo"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    CardType::TRAVEL_LONDON => [
        "title" => clienttranslate("Travel"),
        "subtitle" => clienttranslate("London"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    CardType::TRAVEL_NEW_YORK => [
        "title" => clienttranslate("Travel"),
        "subtitle" => clienttranslate("New York"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    CardType::TRAVEL_RIO => [
        "title" => clienttranslate("Travel"),
        "subtitle" => clienttranslate("Rio de Janeiro"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    CardType::TRAVEL_SYDNEY => [
        "title" => clienttranslate("Travel"),
        "subtitle" => clienttranslate("Sydney"),
        "text" => clienttranslate("Price"),
        "text2" => "",
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - HOUSE
     * ---------------------------------------------------------------------- */
    CardType::HOUSE_SMALL_1 => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you're married"),
    ],
    CardType::HOUSE_SMALL_2 => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you're married"),
    ],
    CardType::HOUSE_MEDIUM_1 => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you're married"),
    ],
    CardType::HOUSE_MEDIUM_2 => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you're married"),
    ],
    CardType::HOUSE_BIG => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you're married"),
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - REWARD
     * ---------------------------------------------------------------------- */
    CardType::REWARD_EXCELLENCE => [
        "title" => clienttranslate("Grand Prize of Excellence"),
        "subtitle" => "",
        "text" => clienttranslate("Can only be attributed to writers, "
                . "researchers and journalists"),
        "text2" => clienttranslate("You may pocket paychecks from 1 to 4 while "
                . "you work in the awarded job."),
    ],
    CardType::REWARD_HONOR_LEGION => [
        "title" => clienttranslate("Medal of Freedom"),
        "subtitle" => "",
        "text" => clienttranslate("You are awarded by the nation"
                . "(bandits excluded)"),
        "text2" => "",
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - CHILD
     * ---------------------------------------------------------------------- */
    CardType::CHILD_DIANA => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Diana"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_HARRY => [
        "title" => clienttranslate("Harry"),
        "subtitle" => "",
        "text" => clienttranslate("Diana"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_HERMIONE => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Hermione"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_LARA=> [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Lara"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_LEIA=> [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Leia"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_LUIGI=> [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Luigi"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_LUKE=> [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Luke"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_MARIO=> [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Mario"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_ROCKY=> [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Rocky"),
        "text2" => clienttranslate(""),
    ],
    CardType::CHILD_ZELDA=> [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Zelda"),
        "text2" => clienttranslate(""),
    ],
);

