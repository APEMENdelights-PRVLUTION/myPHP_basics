<?php

namespace Person;

class Person {

    // properties
    public $name;
    public $eyeColor;
    public $age;

    // creating a static (static will be declared as same as variables using $
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Methods
    public function getPerson(){
        $person = $this->name . " is " . $this->age . " years old!";
        return $person;
        // TODO: Implement __destruct() method.
    }
}
