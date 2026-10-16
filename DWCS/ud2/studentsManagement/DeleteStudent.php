<?php
require_once("Operations.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Profile</title>
    <style>
        h2 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 15px;

        }

        #yes {
            width: 40%;
            padding: 10px;
            background-color: green;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        #no {
            width: 40%;
            padding: 10px;
            background-color: red;
            color: black;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            text-align: center;
            box-sizing: border-box;
            font-size: 16px;
        }

        #enlace {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>
    <h2>You are about to delete this profile</h2>
    <h2>Are you Sure?</h2>

    <form action="" method="post">
        <button id="yes" name="confirm_delete" type="submit">Yes</button>
        <a href="mainPage.php" id="no">No</a>
        <a href="mainPage.php" id="enlace">Volver a la página Principal</a>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $oper = new Operations();
            $oper->deleteStudent($id);
            echo "<p style='text-align:center;'>Student deleted correctly</p>";
        }
    }
    ?>
</body>

</html>