<?php
/************************************************************************
 * Battle script                                                        *
 * version 2.0   beta                                                   *
 *                                                                      *
 * This program is free software: you can redistribute it and/or modify *
 * it under the terms of the GNU General Public License as published by *
 * the Free Software Foundation, either version 3 of the License, or    *
 * (at your option) any later version.                                  *
 *                                                                      *
 * This program is distributed in the hope that it will be useful,      *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of       *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        *
 * GNU General Public License for more details.                         *
 *                                                                      *
 * You should have received a copy of the GNU General Public License    *
 * along with this program.  If not, see <http://www.gnu.org/licenses/> *
 *                                                                      *
 * Copyright <makesite.de> 2011                                         *
 ************************************************************************/

class Battle {

    /*
     * @class Battle
     *
     * @function   __construct
     * @function   attack
     * @function   defence
     * @function   add_group
     * @function   add_warrior
     * @function   start
     * @function   duel
     * @function   deathmatch
     * @function   team_deathmatch
     * @function   debug
     */

    const duel              = 0x0000;                                                                           // fight types
    const deathmatch        = 0x0001;
    const team_deathmatch   = 0x0002;

    const warrior_name      = 0x0100;                                                                           // warrior datas
    const warrior_hp        = 0x0200;
    const warrior_off       = 0x0300;
    const warrior_off_m     = 0x0500;
    const warrior_def       = 0x0600;
    const warrior_def_m     = 0x0800;
    const warrior_group     = 0x0900;

    const red               = "#FF0000";                                                                        // colors for teams
    const blue              = "#0000FF";
    const green             = "#00FF00";
    const yellow            = "#FFFF00";

    private $warrior_set    = array();                                                                          // warrior set
    private $warrior_num    = 0;                                        // warrior count

    private $warrior_main   = array(                                        // warrior default set
        self::warrior_name         => "Warrior",
        self::warrior_hp        => 100,
        self::warrior_off        => 10,
        self::warrior_off_m        => 1,
        self::warrior_def        => 10,
        self::warrior_def_m        => 1,
        self::warrior_group         => null
    );

    private $group_current  = null;
    private $group_set      = array();
    private $group_num      = 0;

    private $save_log       = array();                                                                          // saved log

    private $type           = self::duel;                                                                       // type set
    private $random_skills  = true;

    /*
     * @function    __construct
     * @var        $type
     * @var        $random_skills
     *
     * Initialisierung des gesamten Kampfes und Festlegung des Kampftypes. Als option kann festgelegt werden,
     * ob die Angriffs- und Verteidungswerte konstant oder mit einem kleinen Zufallseinluss genereriert werden
     * sollen.
     */

    function __construct($type=self::duel, $random_skills=true) {

        $this->type=$type;                                                                                      // set type of battle
        $this->random_skills=$random_skills;                                                                    // set random manupilation

    }

    /*
     * @function    attack
     * @var        $stack
     *
     * Diese Funktion berechnet den endgültigen Angriffswert des Angreifers. Alle Waffen, Fähigkeiten
     * sowie Rüstungen werden zusammengerechnet und als Zahl zurückgegeben.
     */

    function attack(array $stack) {

        if($this->random_skills)                                                                                // check if attack is random
            $attack = ($stack[self::warrior_off] * $stack[self::warrior_off_m]) * (rand(1,5)/10);
        else
            $attack = $stack[self::warrior_off] * $stack[self::warrior_off_m];

        return round($attack);

    }

    /*
     * @function    defence
     * @var        $stack
     *
     * Diese Funktion berechnet den endgültigen Verteidigungswert des Verteidigers. Alle Waffen, Fähigkeiten
     * sowie Rüstungen werden zusammengerechnet und als Zahl zurückgegeben.
     */

    function defence(array $stack) {

        if($this->random_skills)                                                                                // check if defence is random
            $attack = ($stack[self::warrior_def] * $stack[self::warrior_def_m]) * (rand(1,5)/10);
        else
            $attack = $stack[self::warrior_def] * $stack[self::warrior_def_m];

        return round($attack);

    }

    /*
     * @function    add_group
     * @var        $name
     * @var        $color
     *
     * Gruppe wird hinzugefügt und es werden nur Krieger nur zu dieser Gruppe zugeordnet, bis eine neue
     * erstellt wird.
     */

    function add_group($name,$color) {

        $this->group_current = count($this->group_set);                                                         // set current group
        $this->group_num++;
        array_push($this->group_set, array("name"=>$name,"color"=>$color,"warriors"=>array()));                 // add group

    }

    /*
     * @function    add_warrior
     * @var    stack
     *
     * Krieger wird hinzugefügt. Standardwerte und aktualisierte Werte werden zusammengefügt und
     * übermittelt.
     */

    function add_warrior(array $stack) {

        $name        = $this -> warrior_main[self::warrior_name];                        // set defaults
        $hp        = $this -> warrior_main[self::warrior_hp];
        $off        = $this -> warrior_main[self::warrior_off];
        $off_m        = $this -> warrior_main[self::warrior_off_m];
        $def        = $this -> warrior_main[self::warrior_def];
        $def_m        = $this -> warrior_main[self::warrior_def_m];
        $group        = $this -> warrior_main[self::warrior_group];

        if(array_key_exists(self::warrior_name, $stack))                            // manual sets
            $name        = $stack[self::warrior_name];

        if(array_key_exists(self::warrior_hp, $stack))
            $hp        = $stack[self::warrior_hp];

        if(array_key_exists(self::warrior_off, $stack))
            $off        = $stack[self::warrior_off];

        if(array_key_exists(self::warrior_off_m, $stack))
            $off_m        = $stack[self::warrior_off_m];

        if(array_key_exists(self::warrior_def, $stack))
            $def        = $stack[self::warrior_def];

        if(array_key_exists(self::warrior_def_m, $stack))
            $def_m        = $stack[self::warrior_def_m];

        if(array_key_exists(self::warrior_def_m, $stack))
            $group        = $stack[self::warrior_group];

        $r_stack    = array(                                        // result stack
            self::warrior_name         => $name,
            self::warrior_hp        => $hp,
            self::warrior_off        => $off,
            self::warrior_off_m        => $off_m,
            self::warrior_def        => $def,
            self::warrior_def_m        => $def_m
        );

        $this -> warrior_num ++;                                        // count warrior
        $this -> warrior_set[count($this->warrior_set)] = $r_stack;                        // save warrior

        if($this->type==self::team_deathmatch) {                                                                // sort in a group if team deathmatch

            array_push($this->group_set[$this->group_current]['warriors'], count($this->warrior_set)-1);

        }

    }

    /*
     * @function    start
     * @var        $random
     * @var        $random_offender
     * @var        $max_alive
     *
     * Kampf wird gestartet. $random bietet entweder abwechselnde Angreifer oder zufällige Angreifer.
     * Mit $random_offender wird festgelegt ob der erste Krieger oder ein zufälliger Krieger als Erster
     * angreift.
     */

    function start($random=false, $random_offender=false, $max_alive=1) {

        $this->save_log['type']     = $this->type;                                                          // save type of match
        $this->save_log['group']    = $this->group_set;                                                     // save set of groups
        $this->save_log['warriors'] = $this->warrior_set;                                                   // save set of groups

        switch($this->type) {                                        // check which type

            case self::duel:                                        // duel
                if($this->warrior_num == 2)
                    $this->duel($random, $random_offender);
                break;

            case self::deathmatch:                                        // deathmatch
                $this->deathmatch($random,$random_offender,$max_alive);
                break;

            case self::team_deathmatch:                                    // team_deathmatch
                $this->team_deathmatch($random, $random_offender, $max_alive);
                break;

        }

    }

    /*
     * @function    duel
     * @var        $random
     * @var        $random_offender
     *
     * Kampftyp Duel
     */

    function duel($random, $random_offender) {

        $turn     = (!$random_offender)?0:rand(0,1);                                                              // commit offender
        $log    = array();                                                                              // initializing log
        $round    = 0;                                                // round

        while($this->warrior_num == 2) {                                    // fight starts

            $round++;                                                // count next round

            $offender    = $this->warrior_set[$turn];                                // load offender datas
            $defender    = ($turn==1)?$this->warrior_set[0]:$this->warrior_set[1];                // load defender datas

            $attack    = $this->attack($offender);                                // generate attack and defence
            $defence    = $this->defence($defender);

            $damage    = (($attack-$defence)<=0)?0:$attack-$defence;                        // damage product

            $this->warrior_set[($turn==1)?0:1][self::warrior_hp] = $defender[self::warrior_hp]-$damage;        // update hp

            //////////////////////////////////////////////////////////////////////////////////////////////////////
            // SAVE LOG OF FIGHT                                        // save log
            //////////////////////////////////////////////////////////////////////////////////////////////////////

            $log_count                = count($log);

            $log[$log_count]['round']        = $round;                            // round
            $log[$log_count]['offender']        = $offender;                            // offender
            $log[$log_count]['defender']        = $defender;                            // defender
            $log[$log_count]['attack']        = $attack;                            // attack
            $log[$log_count]['defence']        = $defence;                            // defence
            $log[$log_count]['damage']        = $damage;                            // damage
            $log[$log_count]['def_hp']        = $this->warrior_set[($turn==1)?0:1][self::warrior_hp];        // defender hp

            if($this->warrior_set[($turn==1)?0:1][self::warrior_hp]<=0)                        // check whether the defender is dead
            {
                $this->warrior_num     = 1;                                    // warrior count to 1
                $this->save_log['log']     =&$log;                                // save log
                $this->save_log['winner']=$offender[self::warrior_name];
            }

            if($random)                                                // generate next offender
                $turn = rand(0,1);
            else
                $turn = ($turn==0)?1:0;

        }

    }

    /*
     * @function    deathmatch
     * @var        $random
     * @var        $random_offender
     * @var        $max_alive
     *
     * Kampftyp deathmatch
     */

    function deathmatch($random, $random_offender, $max_alive) {

        $turn     = (!$random_offender)?0:rand(0,$this->warrior_num-1);                        // commit offender
        $log    = array();                                                                                      // initializing log
        $round    = 0;                                                // round

        while($this->warrior_num > $max_alive) {                                // fight starts

            $round++;                                                // count next round

            $offender    = $this->warrior_set[$turn];                                // load offender datas

            $rand_def    = rand(0,$this->warrior_num-1);                                                         // select defender

            if($rand_def==$turn) {

                if($rand_def==$this->warrior_num-1) {

                    $rand_def = $rand_def -1;
                    $defender = $this -> warrior_set[$rand_def];

                } else {

                    $rand_def = $rand_def +1;
                    $defender = $this -> warrior_set[$rand_def];

                }

            } else {

                $rand_def = $rand_def +0;
                $defender = $this -> warrior_set[$rand_def];

            }

            $attack        = $this->attack($offender);                            // generate attack and defence
            $defence            = $this->defence($defender);

            $damage        = (($attack-$defence)<=0)?0:$attack-$defence;                    // damage product

            $this->warrior_set[$rand_def][self::warrior_hp] = $defender[self::warrior_hp]-$damage;              // update hp

            //////////////////////////////////////////////////////////////////////////////////////////////////////
            // SAVE LOG OF FIGHT                                        // save log
            //////////////////////////////////////////////////////////////////////////////////////////////////////

            $log_count                = count($log);

            $log[$log_count]['round']        = $round;                            // round
            $log[$log_count]['offender']        = $offender;                                                    // offender
            $log[$log_count]['defender']        = $defender;                                                    // defender
            $log[$log_count]['attack']        = $attack;                            // attack
            $log[$log_count]['defence']        = $defence;                            // defence
            $log[$log_count]['damage']        = $damage;                            // damage
            $log[$log_count]['def_hp']        = $defender[self::warrior_hp]-$damage;                          // defender hp

            if($this->warrior_set[$rand_def][self::warrior_hp]<=0)                                              // check whether the defender is dead
            {

                $this->warrior_num--;                                        // warrior count to 1
                $this->save_log['log']        =&$log;                                // save log
                unset($this->warrior_set[$rand_def]);
                $this->warrior_set=array_merge($this->warrior_set);

            }

            if($random) {                                               // generate next offender

                $turn = rand(0,$this->warrior_num-1);

            } else {

                $turn++;
                $turn = ($turn>=count($this->warrior_set))?0:$turn;

            }

            if($this->warrior_num == $max_alive) {
                $this->save_log['winner']=$this->warrior_set;
            }

        }

    }

    /*
     * @function    team_deathmatch
     * @var        $random
     * @var        $random_offender
     * @var        $max_alive
     *
     * Kampftyp team deathmatch
     */

    function team_deathmatch($random, $random_offender, $max_alive) {

        $turn     = (!$random_offender)?0:rand(0,$this->group_num-1);                                             // commit offender
        $log    = array();                                                                                      // initializing log
        $round    = 0;                                                // round

        while($this->group_num > $max_alive) {                                                                  // fight starts

            $round++;                                                // count next round

            $offender    = array_rand($this->group_set[$turn]['warriors']);                    // load offender datas
            $offender   = $this -> warrior_set[$this->group_set[$turn]['warriors'][$offender]];

            $rand_def    = rand(0,$this->group_num-1);                                                           // select defender

            if($rand_def==$turn) {                                                                              // if defender is offender

                if($rand_def==$this->group_num-1) {

                    $rand_def   = $rand_def -1;
                    $rand_def2_group    = array_rand($this->group_set[$rand_def]['warriors']);
                    $rand_def2  = $this->group_set[$rand_def]['warriors'][$rand_def2_group];
                    $defender   = $this -> warrior_set[$rand_def2];

                } else {

                    $rand_def   = $rand_def +1;
                    $rand_def2_group    = array_rand($this->group_set[$rand_def]['warriors']);
                    $rand_def2  = $this->group_set[$rand_def]['warriors'][$rand_def2_group];                                // load offender datas
                    $defender   = $this -> warrior_set[$rand_def2];

                }

            } else {

                $rand_def = $rand_def +0;
                $rand_def2_group = array_rand($this->group_set[$rand_def]['warriors']);
                $rand_def2  = $this->group_set[$rand_def]['warriors'][$rand_def2_group];
                $defender = $this -> warrior_set[$rand_def2];

            }

            $attack        = $this->attack($offender);                            // generate attack and defence
            $defence            = $this->defence($defender);

            $damage        = (($attack-$defence)<=0)?0:$attack-$defence;                    // damage product

            $this->warrior_set[$rand_def2][self::warrior_hp] = $defender[self::warrior_hp]-$damage;              // update hp

            //////////////////////////////////////////////////////////////////////////////////////////////////////
            // SAVE LOG OF FIGHT                                        // save log
            //////////////////////////////////////////////////////////////////////////////////////////////////////

            $log_count                = count($log);

            $log[$log_count]['round']        = $round;                            // round
            $log[$log_count]['offender']        = $offender;                                                    // offender
            $log[$log_count]['offender_group']  = $turn;                                                        // offender group
            $log[$log_count]['defender']        = $defender;                                                    // defender
            $log[$log_count]['defender_group']  = $rand_def;                                                    // defender group
            $log[$log_count]['attack']        = $attack;                            // attack
            $log[$log_count]['defence']        = $defence;                            // defence
            $log[$log_count]['damage']        = $damage;                            // damage
            $log[$log_count]['def_hp']        = $defender[self::warrior_hp]-$damage;                          // defender hp

            if($this->warrior_set[$rand_def2][self::warrior_hp]<=0)                                             // check whether the defender is dead
            {

                $this->warrior_num--;                                        // warrior count to 1
                unset($this->group_set[$rand_def]['warriors'][$rand_def2_group]);
                $this->group_set[$rand_def]['warriors']=array_merge($this->group_set[$rand_def]['warriors']);

                if(count($this->group_set[$rand_def]['warriors'])==0) {

                    $this->group_num--;
                    unset($this->group_set[$rand_def]);
                    $this->group_set=array_merge($this->group_set);

                }

            }

            if($random) {                                               // generate next offender

                $turn = rand(0,$this->group_num-1);

            } else {

                $turn++;
                $turn = ($turn>=count($this->group_set))?0:$turn;

            }

            $this->save_log['log']        =&$log;                                // save log

            if($this->group_num <= $max_alive) {

                $this->save_log['winner']   = $this -> group_set;

            }

        }

    }

    /*
     * @function   debug
     * @var        $log
     *
     * Gibt den eingegangenen Log in Text aus.
     */

    function debug($log) {

        switch($log['type']) {                                                                                  // check which type of log

            case self::team_deathmatch:                                                                         // team deathmatch

                echo "<h1>Team Deathmatch</h1><br>";
                echo "<h2>Gewinner: ";

                for($i=0;$i<count($log['winner']);$i++) {                                                       // list all winners
                    $group = $log['winner'][$i];
                    $color = $group['color'];
                    $name  = $group['name'];
                    echo "<span style=\"color:$color\">$name</span> ";
                }

                echo "</h2><br>";

                echo "<table style=\"width:100%\" border=\"1\"><tr>";

                for($i=0;$i<count($log['group']);$i++) {                                                        // list teams



                    $group = $log['group'][$i];
                    $color = $group['color'];
                    echo "<td><span style=\"color:$color\">";
                    echo $group['name'];
                    echo "</span><hr>";

                    for($i2=0;$i2<count($group['warriors']);$i2++) {
                        echo $log['warriors'][$group['warriors'][$i2]][self::warrior_name]."<br>";
                    }

                    echo "</td>";

                }

                echo "</tr></table><br><br>";

                for($i=0;$i<count($log['log']);$i++) {                                                          // log output

                    $off_group = $log['log'][$i]['offender_group'];
                    $def_group = $log['log'][$i]['defender_group'];

                    echo "Runde: ";
                    echo $log['log'][$i]['round'];
                    echo "<br>";

                    echo "<span style=\"color:".$log['group'][$off_group]['color']."\">";
                    echo $log['log'][$i]['offender'][self::warrior_name];
                    echo "</span>";
                    echo " greift ";
                    echo "<span style=\"color:".$log['group'][$def_group]['color']."\">";
                    echo $log['log'][$i]['defender'][self::warrior_name];
                    echo "</span>";
                    echo " an und richtet ";
                    echo $log['log'][$i]['damage'];
                    echo " Schaden an. Lebenspunkte von ";
                    echo $log['log'][$i]['defender'][self::warrior_name];
                    echo ": ";
                    echo $log['log'][$i]['def_hp'];
                    echo "<br>";

                    if($log['log'][$i]['def_hp']<=0) {
                        echo "<br><b>".$log['log'][$i]['defender'][self::warrior_name];
                        echo " ist tot.</b><br>";
                    }

                    echo "<br>";

                }

                break;

            case self::deathmatch:                                                                              // deathmatch

                echo "<h1>Deathmatch</h1><br>";
                echo "<h2>Gewinner: ";

                for($i=0;$i<count($log['winner']);$i++) {                                                       // list of winners
                    $group = $log['winner'][$i];
                    $name  = $group[self::warrior_name];
                    if($i==count($log['winner'])-1)
                        echo "$name";
                    else
                        echo "$name, ";
                }

                echo "</h2><br>";

                for($i=0;$i<count($log['log']);$i++) {                                                          // log output

                    $off_group = $log['log'][$i]['offender_group'];
                    $def_group = $log['log'][$i]['defender_group'];

                    echo "Runde: ";
                    echo $log['log'][$i]['round'];
                    echo "<br>";

                    echo "<span style=\"color:".$log['group'][$off_group]['color']."\">";
                    echo $log['log'][$i]['offender'][self::warrior_name];
                    echo "</span>";
                    echo " greift ";
                    echo "<span style=\"color:".$log['group'][$def_group]['color']."\">";
                    echo $log['log'][$i]['defender'][self::warrior_name];
                    echo "</span>";
                    echo " an und richtet ";
                    echo $log['log'][$i]['damage'];
                    echo " Schaden an. Lebenspunkte von ";
                    echo $log['log'][$i]['defender'][self::warrior_name];
                    echo ": ";
                    echo $log['log'][$i]['def_hp'];
                    echo "<br>";

                    if($log['log'][$i]['def_hp']<=0) {
                        echo "<b>".$log['log'][$i]['defender'][self::warrior_name];
                        echo " ist tot.</b><br>";
                    }

                    echo "<br>";

                }

                break;

            case self::duel:                                                                                    // duel

                echo "<h1>Duel</h1>";
                echo "<h2>Gewinner: ".$log['winner'].'</h2><br>';                                               // winner

                for($i=0;$i<count($log['log']);$i++) {                                                          // log output

                    $off_group = $log['log'][$i]['offender_group'];
                    $def_group = $log['log'][$i]['defender_group'];

                    echo "Runde: ";
                    echo $log['log'][$i]['round'];
                    echo "<br>";

                    echo "<span style=\"color:".$log['group'][$off_group]['color']."\">";
                    echo $log['log'][$i]['offender'][self::warrior_name];
                    echo "</span>";
                    echo " greift ";
                    echo "<span style=\"color:".$log['group'][$def_group]['color']."\">";
                    echo $log['log'][$i]['defender'][self::warrior_name];
                    echo "</span>";
                    echo " an und richtet ";
                    echo $log['log'][$i]['damage'];
                    echo " Schaden an. Lebenspunkte von ";
                    echo $log['log'][$i]['defender'][self::warrior_name];
                    echo ": ";
                    echo $log['log'][$i]['def_hp'];
                    echo "<br>";

                    if($log['log'][$i]['def_hp']<=0) {
                        echo "<b>".$log['log'][$i]['defender'][self::warrior_name];
                        echo " ist tot.</b><br>";
                    }

                    echo "<br>";

                }

                break;

        }

    }

    /*
     * @function getLog
     *
     * Gibt den gespeicherten Log der geöffneten Instanz zurück.
     */

    function getLog() {

        return $this->save_log;

    }

}