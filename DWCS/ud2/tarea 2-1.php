<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factorial od a number </title>
</head>
<body>
    <h1>Factorial of a number</h1>
    <?php
        $resultado = 1 ;
        for($i=5;$i>0;$i--){
        $resultado = $resultado * $i;
        
     
    }
       echo "El resultado del factorial de 5 es: " . $resultado;
    ?>
</body>
</html>
