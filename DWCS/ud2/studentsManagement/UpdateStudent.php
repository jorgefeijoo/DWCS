<?php
require_once("Operations.php");
$id = $dni = $name = $surname = $age = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addStudent</title>
</head>

<body>
    <h2>Student</h2>

    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $dni = $_GET["dni"];
        $name = $_GET["fname"];
        $surname = $_GET["lname"];
        $age = $_GET["age"];
    }
    ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fname">ID:</label><br>
        <input type="text" id="id" name="id" value="<?php echo $id ?>"><br>
        <label for="fname">Name:</label><br>
        <input type="text" id="fname" name="fname" value="<?php echo $name ?>"><br>
        <label for="lname">Surname:</label><br>
        <input type="text" id="lname" name="lname" value="<?php echo $surname ?>"><br>
        <label for="dni">Dni:</label><br>
        <input type="text" id="dni" name="dni" value="<?php echo $dni ?>"><br>
        <label for="age">Age:</label><br>
        <input type="text" id="age" name="age" value="<?php echo $age ?>"><br>
        <input type="submit" value="Submit">
        <br>
        <a href="mainPage.php">Volver a la pagina principal</a>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_post = $_POST["id"];
        $name_post = $_POST["fname"];
        $surname_post = $_POST["lname"];
        $dni_post = $_POST["dni"];
        $age_post = $_POST["age"];

        if (
            !empty($id_post) &&
            !empty($name_post) &&
            !empty($surname_post) &&
            !empty($dni_post) &&
            !empty($age_post)
        ) {
            $oper = new Operations();
            $student1 = new Student();

            $student1->setId($id_post);
            $student1->setName($name_post);
            $student1->setSurname($surname_post);
            $student1->setDni($dni_post);
            $student1->setAge($age_post);

            $numberOfRows = $oper->updateStudent($student1);
        }
    }
    ?>
</body>

</html>