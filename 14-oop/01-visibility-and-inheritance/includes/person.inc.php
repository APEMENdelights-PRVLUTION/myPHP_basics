<?php

class Person {
    protected $first = "Daniel";
    private $last = "Nielsen";
    private $age = "28";

  // // method is public accessable
  // public function owner() {
  //     // access variabke from this class
  //     $a = $this->first;
  //     return $a;
  // }
}

// access the class Person by extending Person
class Pet extends Person{
    public function owner(){
        $a = $this->first;
        return $a;
    }
}