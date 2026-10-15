<?php
require("ExPropia.php");

class ExPropiaClass{
    static function testNumber($number){
        if ($number==0) {
            throw new ExPropia("El numero no puede ser 0");
        }
    }
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
    <h1>Prueba de excepcion</h1>

    <?php 
    try {
        ExPropiaClass::testNumber(0);
    } catch (ExPropia $e) {
        echo "Excepcion capturada: ". $e->getMessage();
    }
    ?>
</body>
</html>