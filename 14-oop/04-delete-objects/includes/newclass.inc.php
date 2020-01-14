<?php

class NewClass {

    //Properties and Methods goes here
    public $data = "This is the property ";

    public function __construct() {
        echo "This class has been instantiated ";
    }

    public function setNewProperty($newdata){
        $this->data - $newdata;
    }

    public function getProperty() {
        return $this->data;
    }

    public function __destruct() {
        echo "<br> This is the end of the class";
    }
}
// instance the class
$object = new NewClass;
var_dump($object);