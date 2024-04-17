<?php
    include 'product.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
<body>
    <?php

    $product1 = new Product('iPhone 12', 'This is a great iPhone', 799.99);
    echo $product1->name;
    echo "<br>";
    echo $product1->description;
    echo "<br>";
    echo $product1->price . " zł";
    echo "<br>";

    $product2 = new Product('iPhone 12 Pro', 'This is a better iPhone', 1060);
    echo "<br>";
    echo $product2->name;
    echo "<br>";
    echo $product2->description;
    echo "<br>";
    echo $product2->price . " zł";

    ?>
</body>
</head>
</html>