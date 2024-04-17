<?php

class CarPerson{
    protected $firstname = 'Maciek';
    private $lastname = 'Nielsen';
    private $age = "45";
}

class Car extends CarPerson{
    public function owner(){
        $a = $this->firstname;
        return $a;
    }
}