<?php

class Product{
    public $name;
    public $description;
    public $price;

    public function __construct($NewName, $NewDescription, $NewPrice){
        $this->name = $NewName;
        $this->description = $NewDescription;
        $this->price = $NewPrice;

    }

    public function SetName($NewName){
        $this->name = $NewName;
    }

    public function GetName($NewName){
        return $this->name;
    }
}