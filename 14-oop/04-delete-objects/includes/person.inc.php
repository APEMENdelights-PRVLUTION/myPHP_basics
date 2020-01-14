<?php

class Person {

    // properties
    private $name;
    private $eyeColor;
    private $age;

    public function __construct($name, $eyeColor, $age) {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->age = $age;
    }

    // Methods
    public function setName($name) {
        // do not write the $ because we already declared the variable
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
        // TODO: Implement __destruct() method.
    }
}
