<?php
    include 'Person.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Person</title>
<body>
    <?php

    $person1 = new Person;
    $person1->setName('Daniel');
    echo $person1->name;
    echo "<br>";

    $person2 = new Person;
    $person2->setName('Nick');
    echo $person2->name;

    ?>
</body>
</head>
</html>