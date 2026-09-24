<?php declare (strict_types=1);
function potencias(int $base, int $exponente) {
	
  $resultado = 1;
  if ($exponente<0) {
   throw new Exception("Only positive exponent are possible");
  }
  for($i = 0 ; $i<$exponente; $i++){
  	$resultado = $resultado * $base;
  }
    return $resultado;
}

echo "El resultado de la potencia es ".potencias(2,3);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  define("BASE",4);
  define("EXP",3);
  try {
    $res= potencias(BASE,EXP);
    echo "<p> the result is: ".$res."</p>";

  } catch (Exception $e) {
   echo "<p>ERRO : ".$e->getMessage()."</p>";
  }
  ?>
  
</body>
</html>