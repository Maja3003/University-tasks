<?php
class Product {
    private $db;
    public $id;
    public $name;
    public $price;

    public function __construct($db) {
        $this->db = $db;
    }

    public function save($product) {
        $name = $this->db->real_escape_string($product['name']);  //służy do "ucieczki" specjalnych znaków w ciągu znaków, aby można go było bezpiecznie użyć w zapytaniu SQL.
        $price = $this->db->real_escape_string($product['price']);

        if (isset($product['id'])) {
            $id = $this->db->real_escape_string($product['id']);
            $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
            $this->db->query($sql);
        } else {
            $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
            $this->db->query($sql);
            $product['id'] = $this->db->insert_id;
        }

        return $product;
    }

    public static function find($db, $id) {
        $result = $db->query("SELECT * FROM products WHERE id=$id");
        return $result->fetch_assoc();  //pobieranie wyników zapytania SQL jako tabl asocj. Tablica asocjacyjna to tablica, której kluczami są nazwy kolumn w bazie danych, a wartościami są dane odpowiadające tym kolumnom (do result)
    }

    public static function all($db) {
        $result = $db->query("SELECT * FROM products");
        $products = [];

        while ($data = $result->fetch_assoc()) {
            $products[] = $data;
        }

        return $products;
    }

    public function delete($id) {
        $this->db->query("DELETE FROM products WHERE id=$id");
    }
}
?>
