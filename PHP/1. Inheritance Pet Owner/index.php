<!DOCTYPE>
<html>
<head>
    <title>PetOwner CarOwner</title>
<body>
    <?php

    require_once 'Classes.php';
    require_once 'Inheritance.php';

    //Classes.php   
    $petperson1 = new PetPerson;
    
    echo $petperson1->firstname;
    echo "<br>";
    echo $petperson1->owner();

    $pet1 = new Pet;
    echo "<br>";
    echo $pet1->owner();
    echo "<br>";

    //Inheritance.php   
    $carperson1 = new CarPerson;

    echo "<br>";
    $car1 = new Car;
    echo $car1->owner();

    ?>
</body>
</head>
</html>
