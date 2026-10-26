<?php

$name = "";
$errName = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $errName = "Name is required";
    } else {
        $name = test_input($_POST["fname"]);
        setcookie("fname", $name, time() + (86400 * 30), "/");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>

<body>
    <h1>Show the form</h1>

    <?php
    if (!empty($errName)) {
        echo "<p>" . $errName . "</p>";
    } else {
        echo "<p>Your name is: " . $name . "</p>";
    }
    ?>

    <br><br>
    <a href="page3.php">Ve a la pagina 3</a>
</body>

</html>