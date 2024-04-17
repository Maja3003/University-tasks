<?php

class Person{
    public $name;
    public $eyecolor;
    public $age;

    public function __construct($NewName, $NewEyecolor, $NewAge){
        $this->name = $NewName;
        $this->eyecolor = $NewEyecolor;
        $this->age = $NewAge;
    }

    public function SetName($NewName){
        $this->name = $NewName;
    }

    public function __destruct(){
        
    }
}