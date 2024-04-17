<?php
    include 'Person.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Person</title>
<body>
    <?php

    $person1 = New Person('Daniel', 'Blue', 28);
    echo $person1->name;
    echo $person1->eyecolor;
    echo $person1->age;
    $person1->SetName('John');
    echo $person1->name;

    ?>
</body>
</head>
</html>