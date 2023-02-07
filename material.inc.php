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
     *                  BEGIN - JOB
     * ---------------------------------------------------------------------- */
    //-- Official
    CardType::JOB_FRENCH_TEACHER => [
        "title" => clienttranslate("French teacher"),
        "subtitle" => clienttranslate("Official"),
        "text" => clienttranslate("Cervantes is your idol"),
        "text2" => clienttranslate(""),
    ],
    CardType::JOB_MATH_TEACHER => [
        "title" => clienttranslate("Math teacher"),
        "subtitle" => clienttranslate("Official"),
        "text" => clienttranslate("Pythagoras is your idol"),
        "text2" => clienttranslate(""),
    ],
    CardType::JOB_GRAND_PROF => [
        "title" => clienttranslate("Grand Professor"),
        "subtitle" => clienttranslate("Official"),
        "text" => clienttranslate("Career promotion exclusive to teachers"),
        "text2" => clienttranslate("P"),
    ],
    CardType::JOB_MILITARY => [
        "title" => clienttranslate("Soldier"),
        "subtitle" => clienttranslate("Official"),
        "text" => clienttranslate("Never victim to terrorist attacks"),
        "text2" => "",
    ],
    CardType::JOB_POLICEMEN => [
        "title" => clienttranslate("Policemen"),
        "subtitle" => clienttranslate("Official"),
        "text" => clienttranslate("No gurus or bandits in your presence"),
        "text2" => "",
    ],
    //-- Interim
    CardType::JOB_BARMAN => [
        "title" => clienttranslate("Barman"),
        "subtitle" => clienttranslate("Temporary employee"),
        "text" => clienttranslate("Unlimited flirts before marriage"),
        "text2" => "",
    ],
    CardType::JOB_GARDENER => [
        "title" => clienttranslate("Gardener"),
        "subtitle" => clienttranslate("Temporary employee"),
        "text" => clienttranslate("You’re an ecologist"),
        "text2" => "",
    ],
    CardType::JOB_PLUMBER => [
        "title" => clienttranslate("Plumber"),
        "subtitle" => clienttranslate("Temporary employee"),
        "text" => clienttranslate("You’re good with your hands"),
        "text2" => "",
    ],
    CardType::JOB_STRIPTEASER => [
        "title" => clienttranslate("Stripper"),
        "subtitle" => clienttranslate("Temporary employee"),
        "text" => clienttranslate("You’re hot"),
        "text2" => "",
    ],
    CardType::JOB_WAITER => [
        "title" => clienttranslate("Waiter"),
        "subtitle" => clienttranslate("Temporary employee"),
        "text" => clienttranslate("You’re very obliging"),
        "text2" => "",
    ],
    //-- Normal
    CardType::JOB_AIRLINE_PILOT => [
        "title" => clienttranslate("Airline pilot"),
        "subtitle" => "",
        "text" => clienttranslate("You travel for free"),
        "text2" => "",
    ],
    CardType::JOB_ARCHTECT => [
        "title" => clienttranslate("Architect"),
        "subtitle" => "",
        "text" => clienttranslate("A free house when you put it down"),
        "text2" => "",
    ],
    CardType::JOB_ASTRONAUT => [
        "title" => clienttranslate("Astronaut"),
        "subtitle" => "",
        "text" => clienttranslate("Choose a card in the discard pile"),
        "text2" => "",
    ],
    CardType::JOB_DESIGNER => [
        "title" => clienttranslate("Designer"),
        "subtitle" => "",
        "text" => clienttranslate("You’re hip"),
        "text2" => "",
    ],
    CardType::JOB_DOCTOR => [
        "title" => clienttranslate("Doctor"),
        "subtitle" => "",
        "text" => clienttranslate("Never sick and continuous studies"),
        "text2" => "",
    ],
    CardType::JOB_BANDIT => [
        "title" => clienttranslate("Bandit"),
        "subtitle" => "",
        "text" => clienttranslate("Bandit: Pays no taxes, is never laid off."),
        "text2" => clienttranslate("Jail is possible"),
    ],
    CardType::JOB_GURU => [
        "title" => clienttranslate("Guru"),
        "subtitle" => "",
        "text" => clienttranslate("You’re a visionary"),
        "text2" => "",
    ],
    CardType::JOB_JOURNALIST => [
        "title" => clienttranslate("Journalist"),
        "subtitle" => "",
        "text" => clienttranslate("Entitled to see the other players hands"),
        "text2" => "",
    ],
    CardType::JOB_LAWYER => [
        "title" => clienttranslate("Lawyer"),
        "subtitle" => "",
        "text" => clienttranslate("No-one can divorce you"),
        "text2" => "",
    ],
    CardType::JOB_HEAD_OF_PURCHASING => [
        "title" => clienttranslate("Head of purchasing"),
        "subtitle" => "",
        "text" => clienttranslate("Swap while protecting a card"),
        "text2" => "",
    ],
    CardType::JOB_HEAD_OF_SALES => [
        "title" => clienttranslate("Head of sales"),
        "subtitle" => "",
        "text" => clienttranslate("Swap while protecting a card"),
        "text2" => "",
    ],
    CardType::JOB_MECHANIC => [
        "title" => clienttranslate("Mechanic"),
        "subtitle" => "",
        "text" => clienttranslate("You never have accidents"),
        "text2" => "",
    ],
    CardType::JOB_PHARMACIST => [
        "title" => clienttranslate("Pharmacist"),
        "subtitle" => "",
        "text" => clienttranslate("Never sick"),
        "text2" => "",
    ],
    CardType::JOB_PIZZA_MAKER => [
        "title" => clienttranslate("Pizza maker"),
        "subtitle" => "",
        "text" => clienttranslate("You have fine taste"),
        "text2" => "",
    ],
    CardType::JOB_MEDIUM => [
        "title" => clienttranslate("Medium"),
        "subtitle" => "",
        "text" => clienttranslate("You may read the 13 coming cards"),
        "text2" => "",
    ],
    CardType::JOB_RESEARCHER => [
        "title" => clienttranslate("Researcher"),
        "subtitle" => "",
        "text" => clienttranslate("Try a 6-card hand"),
        "text2" => "",
    ],
    CardType::JOB_SURGEON => [
        "title" => clienttranslate("Surgeon"),
        "subtitle" => "",
        "text" => clienttranslate("Never sick and continuous studies"),
        "text2" => "",
    ],
    CardType::JOB_WRITER => [
        "title" => clienttranslate("Writer"),
        "subtitle" => "",
        "text" => clienttranslate("You’re a romantic"),
        "text2" => "",
    ],
    /* -------------------------------------------------------------------------
     *                  BEGIN - ATTACK
     * ---------------------------------------------------------------------- */
    CardType::ATTACK_ACCIDENT => [
        "title" => clienttranslate("Accident"),
        "subtitle" => "",
        "text" => clienttranslate("Skip your turn"),
        "text2" => "",
    ],
    CardType::ATTACK_BURN_OUT => [
        "title" => clienttranslate("Burn out"),
        "subtitle" => "",
        "text" => clienttranslate("Take a turn if you’re working"),
        "text2" => "",
    ],
    CardType::ATTACK_DISMISSAL => [
        "title" => clienttranslate("Dismissal"),
        "subtitle" => "",
        "text" => clienttranslate("You’re fired. Discard your actual job card"),
        "text2" => "",
    ],
    CardType::ATTACK_DIVORCE => [
        "title" => clienttranslate("Divorce"),
        "subtitle" => "",
        "text" => clienttranslate("You lose your marriage"),
        "text2" => "",
    ],
    CardType::ATTACK_GRADE_REPETITION => [
        "title" => clienttranslate("Grade repetition"),
        "subtitle" => "",
        "text" => clienttranslate("If you’re a student, discard your last"
                . " education card"),
        "text2" => "",
    ],
    CardType::ATTACK_HUMAN_ATTACK => [
        "title" => clienttranslate("Terrorist attack"),
        "subtitle" => "",
        "text" => clienttranslate("Discard all child cards including your own"),
        "text2" => "",
    ],
    CardType::ATTACK_SICKNESS => [
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
        "text2" => clienttranslate("Half price if you’re married"),
    ],
    CardType::HOUSE_SMALL_2 => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you’re married"),
    ],
    CardType::HOUSE_MEDIUM_1 => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you’re married"),
    ],
    CardType::HOUSE_MEDIUM_2 => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you’re married"),
    ],
    CardType::HOUSE_BIG => [
        "title" => clienttranslate("House"),
        "subtitle" => "",
        "text" => clienttranslate("Minimum Deposit"),
        "text2" => clienttranslate("Half price if you’re married"),
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
        "text2" => "",
    ],
    CardType::CHILD_HARRY => [
        "title" => clienttranslate("Harry"),
        "subtitle" => "",
        "text" => clienttranslate("Diana"),
        "text2" => "",
    ],
    CardType::CHILD_HERMIONE => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Hermione"),
        "text2" => "",
    ],
    CardType::CHILD_LARA => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Lara"),
        "text2" => "",
    ],
    CardType::CHILD_LEIA => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Leia"),
        "text2" => "",
    ],
    CardType::CHILD_LUIGI => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Luigi"),
        "text2" => "",
    ],
    CardType::CHILD_LUKE => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Luke"),
        "text2" => "",
    ],
    CardType::CHILD_MARIO => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Mario"),
        "text2" => "",
    ],
    CardType::CHILD_ROCKY => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Rocky"),
        "text2" => "",
    ],
    CardType::CHILD_ZELDA => [
        "title" => clienttranslate("Child"),
        "subtitle" => "",
        "text" => clienttranslate("Zelda"),
        "text2" => "",
    ],
);

