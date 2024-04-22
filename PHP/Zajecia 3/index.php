<?php
include 'kosz_.php';

session_start();

class get extends abstractGet {
    function getAdd(): ?string {
        return $_GET['add'] ?? null;
    }
    function getDelete(): ?string {
        return $_GET['delete'] ?? null;
    }
}

class koszyk extends session implements iBasket {
    protected itemList $itemList; 

    function __construct() {
        parent::__construct();
        $this->itemList = new itemList(); 
    }

    function basketAdd(string $k): void {
        $this->kosz[$k] ??= 0;
        $this->kosz[$k]++;
    }

    function basketDelete(string $k): void {
        if (isset($this->kosz[$k])) {
            if ($this->kosz[$k] > 1) {
                $this->kosz[$k]--;
            } else {
                unset($this->kosz[$k]);
            }
        }
    }

    function showBasket(): string {
        $html = '<table id="tabela" border="1" cellpadding="10">';
        if (!empty($this->kosz)) { 
            foreach ($this->kosz as $item => $quantity) {
                $html .= "<tr><td>$item</td><td>$quantity</td><td><a href='?delete=$item'>basketDelete</a></td></tr>";
            }
        }
        $html = '</table>';
        return $html;
    }

    function emptyBasket(): bool {
        return empty($this->kosz);
    }

    function basketTotal(): float {
        $total = 0;
        if (!empty($this->kosz)) { 
            foreach ($this->kosz as $item => $quantity) {
                $total += $quantity * $this->itemList->items[$item];
            }
        }
        return $total;
    }

    function showItems(): string {
        $html = '<table id="tabela" border="1" cellpadding="10">';
        foreach ($this->itemList->items as $name => $price) {
            $html .= "<tr><td>$name</td><td>$price</td><td><a href='?add=$name'>basketAdd</a></td></tr>";
        }
        $html .= '</table>';
        return $html;
    }
}

$get = new get();
$koszyk = new koszyk();

echo '<h2>dodaj do koszyka:</h2>';
echo $koszyk->showItems();

if ($get->getAdd()) {
    $koszyk->basketAdd($get->getAdd());
}

if ($get->getDelete()) {
    $koszyk->basketDelete($get->getDelete());
}

echo '<h2>koszyk:</h2>';
echo $koszyk->showBasket();
echo '<p>wartość koszyka: ' . $koszyk->basketTotal() . '</p>';
?>