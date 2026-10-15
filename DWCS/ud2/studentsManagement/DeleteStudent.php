<?php
require_once("Operations.php");
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

    <form action="" method="post">
        <button id="yes" name="confirm_delete">Yes</button>
        <br>
        <a href="mainPage.php"><button id="no">No</button></a>
        <br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
        $id = $_GET["id"];
        $oper = new Operations();
        $oper->deleteStudent($id);
    }
    ?>

    <a href="mainPage.php">Volver a la pagina Principal</a>
</body>

</html>