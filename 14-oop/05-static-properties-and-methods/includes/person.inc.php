<?php

class Person {

    // properties
    private $name;
    private $eyeColor;
    private $age;

    // creating a static (static will be declared as same as variables using $
    public static $drinkingAge = 21;

    // Methods
    public function setName($name) {
        // do not write the $ because we already declared the variable
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
        // TODO: Implement __destruct() method.
    }

    public function getDA() {
        return self::$drinkingAge;
    }

    public static function setDrinkingAge($newDA) {
        self::$drinkingAge = $newDA;
    }
}
