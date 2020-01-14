<?php

class Person {

    // properties
    public $name;
    public $eyeColor;
    public $age;

    // Methods
    public function setName($name) {
        // do not write the $ because we already declared the variable
        $this->name = $name;
    }
}
