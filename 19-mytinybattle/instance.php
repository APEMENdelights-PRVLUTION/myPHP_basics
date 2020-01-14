<?php
include "class.battle.php";

/*Deutung:
Der Kampftyp ist Team Deathmatch und die Angriffs und Verteidigungswerte sind nicht konstant,
also mit einem kleinen Zufallseinfluss versehen.

[quote]TIPP:
Empfehlenswert ist es den Zufallseinfluss zu aktivieren, andernfalls könnte ein Kampf sich zu
einer endlosschleife bilden, wenn die Gegner gleichstarke Fähigkeiten haben.[/quote]
 *
 *
 */

$battle = new Battle(Battle::team_deathmatch, true);
$warrior1 = array(
    Battle::warrior_name => "Mensch",
    Battle::warrior_group => "Team A",
    Battle::warrior_hp => 50,
    Battle::warrior_off => 10,
    Battle::warrior_off_m => 2,
    Battle::warrior_def => 5,
    Battle::warrior_def_m => 5
);
$warrior2 = array(
    Battle::warrior_name => "Kobold",
    Battle::warrior_group => "Team A",
    Battle::warrior_hp => 40,
    Battle::warrior_off => 12,
    Battle::warrior_off_m => 2,
    Battle::warrior_def => 6,
    Battle::warrior_def_m => 3
);
$warrior3 = array(
    Battle::warrior_name => "Elf",
    Battle::warrior_group => "Team B",
    Battle::warrior_hp => 100,
    Battle::warrior_off => 5,
    Battle::warrior_off_m => 4,
    Battle::warrior_def => 10,
    Battle::warrior_def_m => 3
);
$warrior4 = array(
    Battle::warrior_name => "Zwerg",
    Battle::warrior_group => "Team B",
    Battle::warrior_hp => 30,
    Battle::warrior_off => 30,
    Battle::warrior_off_m => 3,
    Battle::warrior_def => 7,
    Battle::warrior_def_m => 2
);
$warrior5 = array(
    Battle::warrior_name => "Vampir",
    Battle::warrior_group => "Team C",
    Battle::warrior_hp => 50,
    Battle::warrior_off => 15,
    Battle::warrior_off_m => 5,
    Battle::warrior_def => 3,
    Battle::warrior_def_m => 1
);
$warrior6 = array(
    Battle::warrior_name => "Drache",
    Battle::warrior_group => "Team C",
    Battle::warrior_hp => 140,
    Battle::warrior_off => 10,
    Battle::warrior_off_m => 2,
    Battle::warrior_def => 5,
    Battle::warrior_def_m => 3
);

$battle -> add_group("Team A", Battle::blue);
$battle -> add_warrior($warrior1);
$battle -> add_warrior($warrior2);

$battle -> add_group("Team B", Battle::red);
$battle -> add_warrior($warrior3);
$battle -> add_warrior($warrior4);

$battle -> add_group("Team C", Battle::green);
$battle -> add_warrior($warrior5);
$battle -> add_warrior($warrior6);

$battle -> start(false, false, 1);
$battle -> debug($battle -> getLog());