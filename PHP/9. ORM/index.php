<?php
require_once 'Database.php';
require_once 'Product.php';

$dbConnection = new Database('localhost', 'root', '', 'baza24');
$db = $dbConnection->getConnection();
$productModel = new Product($db);

// Tworzenie nowego produktu i zapisanie go do bazy
$product = [
    'name' => 'Kasia',
    'price' => 30
];
$savedProduct = $productModel->save($product);

// Wyświetlenie wszystkich produktów
$products = Product::all($db);
foreach ($products as $product) {
    print_r($product);
}

// Znalezienie produktu o ID 1 i jego aktualizacja
$product = Product::find($db, 1);
if ($product) {
    $product['name'] = 'new name';
    $product['price'] = 50;
    $productModel->save($product);
}

// Usunięcie produktu o ID 1
$productModel->delete(1);
?>
