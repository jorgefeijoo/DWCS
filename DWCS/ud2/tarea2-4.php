<?php declare (strict_types=1);
function names(?string $name, int $age, string $surname="Apellido") {

echo "El nombre es ". $name." el apellido es: ".$surname." y la edad es: ". $age;

}


?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <b>
   <?php 
    names("gosendo",19,"liñares");
    ?>
    </b>
</body>
</html>


