<?php

class PetPerson{
    public $firstname = 'Daniel';
    public $lastname = 'Kowalski';
    public $age = "50";

    public function owner(){
        $a = $this->firstname;
        return $a;
    }
}

class Pet{
    public function owner(){
        $a = "This is pet owner";
        return $a;
    }
}