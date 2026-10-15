<?php
require_once("Operations.php");
$id = $_GET["id"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>You are about to delete this profile</p>

    <p>Are you Sure?</p>


    <button id="yes">Yes</button>
    <br>
    <button id="no">No</button>
    <br>

    <?php
    $oper = new Operations();
    $oper->deleteStudent($id);
    ?>

    <a href="mainPage.php">Volver a la pagina Principal</a>
</body>

</html>