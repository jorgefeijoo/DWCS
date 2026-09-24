<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de bebidas</h1>
    <?php 
$bebidas=array(
    "cocacola" => array("text" => "Coca cola" , "precio" =>2.1),
    "pepsicola" =>array("text"=>"Pepsi Cola", "precio" =>2),
    "fantaNaranja"=>array("text" =>"Fanta Naranja","precio"=>2.5),
    "trinaManzana"=>array("text"=>"Trina Manzana","precio"=>2.3)
);
?>

<select name="" id="">
    <?php 
    foreach ($bebidas as $key => $value) {
        echo "<option>".$value["text"], " ( ".$value["precio"] ." ) " ."</option>";
    }
    ?>
</select>
</body>
</html>