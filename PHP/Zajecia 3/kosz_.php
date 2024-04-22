<?php
//stwórz mechanizm koszyka obsługiwany przez klasy korzystające z poniższych struktur
//struktury te nie mogą być modyfikowane, tylko dołączone na początku pliku z rozwiązaniem:
//include 'kosz_.php';
//a następnie wykorzystane w taki sposób:
//class get extends abstractGet
//class koszyk extends session implements iBasket
//class items extends itemList implements iItem

class session
{
    protected ?array $kosz;
    function __construct()
    {
        $this->kosz = &$_SESSION['kosz'];
    }
}
class itemList {
    public array $items = ['a' => 11, 'b' => 100, 'c' => 40];
}
interface iBasket {
    function basketAdd (string $k): void; //dodanie do koszyka towaru o nazwie $k
    function basketDelete (string $k): void;//usunięcie z koszyka towaru o nazwie $k
    function showBasket(): string; //zwraca ciąg znaków z tabelą html wyświetlającą zawartość koszyka
    function emptyBasket(): bool; //czy koszyk jest pusty
    function basketTotal(): float; //całkowita wartość towarów w koszyku
}
interface iItem {
    function getPrice(string $a): float; //cena towaru o nazwie $a
    function showItems():string; //zwraca ciąg znaków z tabelą html wyświetlającą listę towarów
}
abstract class abstractGet {
    protected ?string $add; //wartość zebrana z QueryString z kluczem 'add'
    protected ?string $delete; //wartość zebrana z QueryString z kluczem 'delete'
    abstract function getAdd(): ?string;
    abstract function getDelete(): ?string;

}