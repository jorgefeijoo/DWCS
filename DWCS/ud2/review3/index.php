<?php
require_once("Operations.php");

$oper = new Operations();
$brand = "";
$brandErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["brand"])) {
        $brandErr = "Brand is required";
    } else {
        $brand = test_input($_POST["brand"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $brand)) {
            $brandErr = "Only letters and white space allowed";
        } else {
            $vehicleList = $oper->searchVehicles($brand);
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
    <h1>Garage: search vehicles</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="brand">Brand:</label>
        <input type="text" name="brand">
        <input type="submit" value="Search">
    </form>

    <h2>Vehicles found</h2>


    <select name="" id="">
        <?php
        function generateSelect($vehicleList)
        {
            foreach ($vehicleList as  $value) {
                $id = $value->getId();
                $text = $value->getBrand() . " " . $value->getModel() . " (" . $value->getYear() . ")";
                echo "<option value= \"$id\"> $text</option>";
            }
        }

        $brand = test_input($_POST["brand"]);

        generateSelect($vehicleList)


        ?>
    </select>

    <br>
    <br>

    <a href="">Detail</a>
    <a href="">Update</a>
    <a href="">Delete</a>
    <a href="">Add</a>





    <?php
    if (!empty($brandErr)) {
        echo "<p> $brandErr</p>";
    }
    ?>


</body>




</html>