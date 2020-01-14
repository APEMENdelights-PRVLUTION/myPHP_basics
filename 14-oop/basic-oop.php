<?php
class Baum {
    protected $gesundheit = 100; // bei 0 ist unser Baum ein Tisch
    protected $hoehe; // die Höhe des Baumes
    public function sage_mir_dein_wohlbefinden() {
        if ( $this->gesundheit > 80 ) return 'Mir geht es super.';
        if ( $this->gesundheit > 40 ) return 'Ich hatte schon bessere Tage.';
        if ( $this->gesundheit > 0 ) return 'Mir geht es echt mies.';
        return 'Ich bin ein Tisch.'; /* tritt nur ein wenn $this->gesundheit
* kleiner oder gleich 0 ist. */
    }
    public function wie_hoch_bist_du() {
        return 'Ich bin ' . $this->getHoehe() . ' Meter hoch.';
    }
    public function wachse($summand) {
        $this->setHoehe($this->getHoehe() + $summand); /* eigentlich müsste man überprüfen, ob
* $summand es überhaupt wert ist, addiert
* zu werden, also ob er ein Zahlwert ist,
* oder nicht. Für den Moment soll uns aber
* dieser kurze Code genügen.*/
    }
    public function setGesundheit($neueGesundheit) {
        $this->gesundheit = $neueGesundheit;
    }
    public function getHoehe() {
        return $this->hoehe;
    }
    protected function setHoehe($neueHoehe) {
        $this->hoehe = $neueHoehe;
    }
} // Ende von Klasse Baum
$Bar = new Baum(); // Neues Objekt der Klasse Baum erzeugen
$Bar->setGesundheit(75);
$Bar->wachse(5);
echo $Bar->wie_hoch_bist_du() . ' ';
$Bar->wachse(10);
echo $Bar->sage_mir_dein_wohlbefinden() . ' ' . $Bar->wie_hoch_bist_du();
?>