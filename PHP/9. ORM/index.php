<?php
require_once 'Database.php';
require_once 'Product.php';

$dbConnection = new Database('localhost', 'root', '', 'baza24');
$db = $dbConnection->getConnection();
$productModel = new Product($db);

// Tworzenie nowego produktu i zapisanie go do bazy
$product = [
    'name' => 'Marcela',
    'price' => 20
];
$savedProduct = $productModel->save($product);

// Znalezienie produktu o danym ID i jego aktualizacja
$product = Product::find($db, 1);
if ($product) {
    $product['name'] = 'Marcela';
    $product['price'] = 50;
    $productModel->save($product);
}

// Usunięcie produktu o danym ID
//$productModel->delete(4);

// Wyświetlenie wszystkich produktów
$products = Product::all($db);
foreach ($products as $product) {
    print_r($product);
}
?>
