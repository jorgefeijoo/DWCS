<?php
require_once("Operations.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addStudent</title>
</head>

<style>
    form {
        margin: 20px auto;
        width: 100%;
        max-width: 60%;
        display: flex;
        flex-direction: column;
        align-items: stretch;
        padding: 20px;
        box-sizing: border-box;
    }

    h2 {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #boton {
        margin-top: 20px;
        padding: 10px;
        background-color: green;
        border: none;
        border-radius: 3px;
    }

    form a {
        margin-top: 30px;
        text-decoration: none;
    }
</style>

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

    $id = $dni = $name = $surname = $age = "";
    $mensaje = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = test_input($_GET["id"]);
        $dni = test_input($_GET["dni"]);
        $name = test_input($_GET["fname"]);
        $surname = test_input($_GET["lname"]);
        $age = test_input($_GET["age"]);
    }
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = (test_input($_POST["id"]));
        $name = (test_input($_POST["fname"]));
        $surname = (test_input($_POST["lname"]));
        $dni = (test_input($_POST["dni"]));
        $age = (test_input($_POST["age"]));

        if (
            !empty($id) &&
            !empty($name) &&
            !empty($surname) &&
            !empty($dni) &&
            !empty($age)
        ) {
            $oper = new Operations();
            $student1 = new Student();

            $student1->setId($id);
            $student1->setName($name);
            $student1->setSurname($surname);
            $student1->setDni($dni);
            $student1->setAge($age);

            $numberOfRows = $oper->updateStudent($student1);

            $mensaje = "Student updated correctly";
        } else {
            $id = test_input($_POST["id"]);
            $name = test_input($_POST["fname"]);
            $surname = test_input($_POST["lname"]);
            $dni = test_input($_POST["dni"]);
            $age = test_input($_POST["age"]);

            $mensaje = "All the fields has been completed";
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input hidden type="text" id="id" name="id" value="<?php echo $id ?>"><br>
        <label for="fname">Name:</label><br>
        <input type="text" id="fname" name="fname" value="<?php echo $name ?>"><br>
        <label for="lname">Surname:</label><br>
        <input type="text" id="lname" name="lname" value="<?php echo $surname ?>"><br>
        <label for="dni">Dni:</label><br>
        <input type="text" id="dni" name="dni" value="<?php echo $dni ?>"><br>
        <label for="age">Age:</label><br>
        <input type="text" id="age" name="age" value="<?php echo $age ?>"><br>
        <input type="submit" value="Submit" id="boton">
        <br>
        <a href="mainPage.php">Volver a la pagina principal</a>

        <?php
        echo "<p>$mensaje</p>";
        ?>
    </form>


</body>

</html>