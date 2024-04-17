<?php
include "class.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Calculator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
    $object = new Calculator;
    $object->Addition(3,4);
    $object->Subtraction(4,1);
    $object->Multiplication(3,4);
    $object->Division(4,2);
    echo "Addition: ";
    echo $object->GetResult1();
    echo "<br>"."Subtraction: ";
    echo $object->GetResult2();
    echo "<br>"."Multiplication: ";
    echo $object->GetResult3();
    echo "<br>"."Division: ";
    echo $object->GetResult4();
    ?>
    </body>
</html>