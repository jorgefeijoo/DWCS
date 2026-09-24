<?php
$array1=array(1, 1, 2, 2, 1);
$array2=array(1, 1, 2, 1, 2, 3);
$array3=array(1, 1, 1, 2, 2, 2, 1);

function tripleCheck(array $numeros):bool{

$contador=0;
$resultado =$numeros[0];

for ($i=0; $i <count($numeros) -1; $i++) { 
   if ($resultado==$numeros[$i]) {
    $contador =$contador + 1;
   }else{
    $resultado = $numeros[$i];
    $contador = 0;
   }
    $resultado = $numeros[$i]; 
    if ($contador == 3) {
    return true;
    break;
}
}
return false;
}

$ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;

function paises(array $ceu){
foreach ($ceu as $key => $value) {
    echo "The capital of ". $key. " is ". $value;
    echo"<br>";
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirar tiple check</title>
    <?php

echo"<h3>First part of the exercice</h3>";



echo "<p>Es triple el array 1? </p>";
if (tripleCheck($array1)) {
    echo "Si";
}else{
    echo "No";
}
echo "<p>Es triple el array 2? </p>";
if (tripleCheck($array2)) {
    echo "Si";
}else{
    echo "No";
}
echo "<br>";
echo "<p>Es triple el array 3? </p>";
if (tripleCheck($array3)) {
    echo "Si";
}else{
    echo "No";
}
echo "<br>";
echo "<br>";

echo"<h3>Second part of the exercice</h3>";

paises($ceu);


    ?>
</head>
<body>
    
</body>
</html>




