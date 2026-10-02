<?php
$name="";
    $opcion1="";
    $typeClass="";
    $errUnits="";
    $errClass="";

$datos=[
    "Java" => array("text" => "Java Programming" , "value" =>0),
    "WebDesing" =>array("text"=>"Web Desing", "value" =>1),
    "Dockers"=>array("text" =>"Docker administration","value"=>2),
    "Django"=>array("text" =>"Django frameworks","value"=>3),
    "Mongo"=>array("text" =>"Mongo database","value"=>4),
  ];

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion1 = $_POST["opcion1"];
    $nomePrograma = $datos[$opcion1]["text"];
    if (empty($_POST["vname"])) {
    $errUnits = "name is required";
    } else {
        $name = test_input($_POST["vname"]);
    }
    if (isset($_POST["typeClass"])) {
        $typeClass = test_input($_POST["typeClass"]);
    }
  }




setcookie("vname", $name, time() + (86400 * 30), "/");
setcookie("opcion1", $opcion1, time() + (86400 * 30), "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>
<body>
      <h1>El resultado del formulario es: </h1>

<?php

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion1 = $_POST["opcion1"];
    $nomePrograma = $datos[$opcion1]["text"];
    if (empty($_POST["vname"])) {
    $errUnits = "name is required";
    } else {
        $name = test_input($_POST["vname"]);
    }
    if ($errUnits == "" ){
    echo $name." wants to enrol in the following subject:  ". $nomePrograma."<br>";
    }
    if (isset($_POST["typeClass"])) {
        $typeClass = test_input($_POST["typeClass"]);
       echo $typeClass. " is the selected option";
    }
  }
?>

<br>
<br>
<a href="manage3.php">pagina3</a>
    
</body>
</html>



