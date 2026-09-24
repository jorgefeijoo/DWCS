<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>Pagina de bebidas</h1>
    <p>bebidas disponibles:</p>

   <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <select name="opcion1">
        <option value="cocacola">Coca Cola (2.1 €)</option>
        <option value="pepsicola">Pepsi Cola (2 €)</option>
        <option value="fantanaranja">Fanta Naranja (2.5 €)</option>
        <option value="trinamanzana">Trina Manzana (2.3 €)</option>
      </select>
      <br /><br />
      <label for="units">Unidades: </label>
      <input type="text" id="units" name="vunits" />
      <br />
      <br />
      <button type="submit" name="enviar" value="send data">submit</button>
    </form>


    <?php 
  $datos=[
    "cocacola" => array("text" => "Coca cola" , "precio" =>2.1),
    "pepsicola" =>array("text"=>"Pepsi Cola", "precio" =>2),
    "fantaNaranja"=>array("text" =>"Fanta Naranja","precio"=>2.5),
    "trinaManzana"=>array("text"=>"Trina Manzana","precio"=>2.3)
  ];
  $opcion1 = $_GET["opcion1"];
  $nomeBebida = $datos[$opcion1]["text"];
  $precioBebida = $datos[$opcion1]["precio"];
  $unidades= $_GET["vunits"];
  echo "You have asked for ".$unidades." units of ".$nomeBebida. "and the price is: ". $precioBebida*$unidades;


  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  </body>
</html>
