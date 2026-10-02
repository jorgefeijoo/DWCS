<?php 
  $datos=[
    "Java" => array("text" => "Java Programming" , "value" =>0),
    "WebDesing" =>array("text"=>"Web Desing", "value" =>1),
    "Dockers"=>array("text" =>"Docker administration","value"=>2),
    "Django"=>array("text" =>"Django frameworks","value"=>3),
    "Mongo"=>array("text" =>"Mongo database","value"=>4),
  ];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
    .error {color: #FF0000;}
  </style>
  </head>
  <body>
    <h1>First practice using forms.</h1>
  
   <form method="post" action="manage2.php">
     <label for="name">Names and surnames: </label>
      <input type="text" id="name" name="vname" />
      <br />
      <br>
        <p>lenguajes disponibles:</p>
      <select name="opcion1">
        <option value="Java">Java Programming</option>
        <option value="WebDesing">Web Desing</option>
        <option value="Dockers">Docker administration</option>
        <option value="Django">Django frameworks</option>
        <option value="Mongo">Mongo Database</option>
      </select>
      <br /><br />
      <br>
      <br>
      <button type="submit" name="enviar" value="send data">submit</button>
    </form>


    
  </body>
</html>
