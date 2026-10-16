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

    $name = "";
    $lname = "";
    $dni = "";
    $age = 0;
    $typeClass = "";
    $errUnits = "";
    $errClass = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $errUnits = "name is required";
        } else {
            $name = test_input($_POST["fname"]);
        }
        if (empty($_POST["lname"])) {
            $errUnits = "lname is required";
        } else {
            $lname = test_input($_POST["lname"]);
        }
        if (empty($_POST["dni"])) {
            $errUnits = "dni is required";
        } else {
            $dni = test_input($_POST["dni"]);
        }
        if (empty($_POST["age"])) {
            $errUnits = "age is required";
        } else {
            $age = test_input($_POST["age"]);
        }
    }
    if (
        !empty($name) &&
        !empty($lname) &&
        !empty($dni) &&
        !empty($age)
    ) {
        $oper = new Operations();
        $student1 = new Student();

        $student1->setName($name);
        $student1->setSurname($lname);
        $student1->setDni($dni);
        $student1->setAge($age);

        $numberOfRows = $oper->addStudent($student1);
    }
    ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fname">Name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Surname:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="dni">Dni:</label><br>
        <input type="text" id="dni" name="dni"><br>
        <label for="age">Age:</label><br>
        <input type="text" id="age" name="age"><br>
        <p>Create new student</p>
        <input type="submit" value="Submit" id="boton">
        <br>
        <a href="mainPage.php">Volver a la pagina principal</a>
    </form>

    <?php
    echo "<p>Student added successfully</p>";
    ?>
</body>

</html>