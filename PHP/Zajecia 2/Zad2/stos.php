<?php
class Stack {
    private $stackArray;

    public function __construct() {
        $this->stackArray = array();
    }

    public function push($item) {
        $this->stackArray[] = $item;
    }

    public function pop() {
        if ($this->isEmpty()) {
            return "empty";
        }
        $lastIndex = count($this->stackArray) - 1;
        $item = $this->stackArray[$lastIndex];
        unset($this->stackArray[$lastIndex]);
        return $item;
    }

    private function isEmpty() {
        return empty($this->stackArray);
    }

    public function __toString() {
        return implode(', ', $this->stackArray);
    }
}

$s = new Stack();

$a1 = "obiekt A";
$a2 = "obiekt A";
$a3 = "obiekt A";

$s->push($a1);
$s->push($a2);
$s->push($a3);

for ($i = 0; $i < 7; $i++) {
    echo $s->pop() . "\n";
}

echo ($s);

