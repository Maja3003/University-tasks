<?php

class Calculator{   
    private $result1;
    private $result2;
    private $result3;
    private $result4;

    public function Addition($number1, $number2){
        $this->result1 = $number1 + $number2;
    }
    public function Subtraction($number1, $number2){
        $this->result2 = $number1 - $number2;
    }
    public function Multiplication($number1, $number2){
        $this->result3 = $number1 * $number2;
    }
    public function Division($number1, $number2){
        $this->result4 = $number1 / $number2;
    }
    public function GetResult1(){
        return $this->result1;
    }
    public function GetResult2(){
        return $this->result2;
    }
    public function GetResult3(){
        return $this->result3;
    }
    public function GetResult4(){
        return $this->result4;
    }
}