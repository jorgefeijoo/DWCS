<?php
$products = array(
    "0" => array("description" => "potatoes", "price" => 2, "picture" => "potatoe.jpg"),

    "1" => array("description" => "tomatoes", "price" => 2.5, "picture" => "tomatatoe.jpg"),

    "2" => array("description" => "onions", "price" => 1.3, "picture" => "onion.jpg"),

);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = "";
$nameErr = "";
$option = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nameSurname"])) {
        $nameErr = "Name and surname is required";
    } else {
        $name = test_input($_POST["nameSurname"]);
        $option = test_input($_POST["option"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
}

function generateSelect($array, $opc)
{
    foreach ($array as $key => $value) {
        if ($opc == $key) {
            echo "<option value='$key' selected>" . $value['description'] . "</option>";
        } else {
            echo "<option value='$key'>" . $value['description'] . "</option>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>EXAM OF PHP</h1>
    <p><b>Please fill in the following form</b></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nameSurname">Name and Surname</label>
        <input type="text" name="nameSurname" id="nameSurname" value="<?php echo $name ?>">
        <br><br>
        <label for="option">Select a Product: </label>
        <select name="option" id="option">
            <?php
            generateSelect($products, $option);
            ?>
        </select>
        <br><br>
        <input type="submit" value="Send Data">

        <?php
        echo "<p>$nameErr</p>";
        ?>

    </form>
</body>

</html>