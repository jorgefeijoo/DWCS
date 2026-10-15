<?php
require_once("Operations.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
</head>

<body>
  <h1>Student Management</h1>
  <?php
  try {
    // Open the database connection
    $oper = new Operations();

    // Get a row from MyGuest table
    $resultado = $oper->getStudent(1);
    echo $resultado;

    // Get all rows from MyGuest table
    echo "<h2>List of Student </h2>";
    $myStudentList = $oper->getAllMyStudent();
    foreach ($myStudentList as $student) {
      echo "<br>Student: $student";
    }

    //Add 
    // echo "<h2>Add a Student:</h2>";
    // $student1 = new Student();
    // $student1->setDni("11111111A");
    // $student1->setName("Gosendo");
    // $student1->setSurname("Liñares");
    // $student1->setAge(19);
    // $numberOfRows = $oper->addStudent($student1);
    // if ($numberOfRows == 1) echo "<br>New student added to the database";
    // else echo "<br>No student has been added";

    echo "<h2>Update a Student:</h2>";
    $student2 = new Student();
    $student2->setid("1");
    $student2->setDni("22222222A");
    $student2->setName("Lisa");
    $student2->setSurname("Mouro");
    $student2->setAge(19);
    $numberOfRows = $oper->updateStudent($student2);
    if ($numberOfRows == 1) echo "<br>New Student updated to the database";
    else echo "<br>No student has been updated";


    $filasBorradas = $oper->deleteStudent(4);
  } catch (PDOException $e) {
    echo "<br><p style='color:red;'>DB Error: " . $e->getMessage() . "</p><br>";
  } catch (Exception $e) {
    echo "<br><p style='color:red;'>Error: " . $e->getMessage() . "</p><br>";
  } finally {
    //Close connection
    $oper->closeConnection();
  }
  ?>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>studentMangement</title>
</head>

<body>
  <table style="width:100%">
    <tr>
      <th>Name</th>
      <th>Surname</th>
      <th>DNI</th>
      <th>Age</th>
      <th>Actions</th>
    </tr>

    <?php
    foreach ($myStudentList as $student) {
      $id = $student->getId();
      $dni = $student->getDni();
      $name = $student->getName();
      $surname = $student->getSurname();
      $age = $student->getAge();
    ?>
      <tr>
        <td> <?php echo $id; ?> </td>
        <td> <?php echo $dni; ?> </td>
        <td> <?php echo $name; ?> </td>
        <td><?php echo $surname; ?> </td>
        <td><?php echo $age; ?> </td>
        <a href="UpdateStudent.php?id=<?php echo $student->getId(); ?>">✏️</a>
        <a href="DeleteStudent.php?id=<?php echo $student->getId(); ?>" onclick="return confirm('¿Seguro que deseas eliminar este estudiante?');">🗑️</a>
      </tr>
    <?php
    }

    ?>
  </table>
  <button>
    <a href="AddStudent.php">Add a new student</a>
  </button>
</body>

</html>