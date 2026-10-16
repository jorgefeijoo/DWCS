<?php
require_once("Operations.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: left;
      padding: 8px;
    }

    #botonAñadir {
      padding: 10px;
      background-color: green;
      width: 40%;
      border-radius: 3px;
      border: none;
    }

    #enlaceBoton {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      text-decoration: none;
    }

    #contenedorActions a {
      display: flex;
      flex-direction: row;
      gap: 20px;
      text-decoration: none;
    }

    * {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
  </style>
</head>

<body>
  <h1>Student Management</h1>

  <?php
  try {
    $oper = new Operations();

    /*
    echo "<h2>Update a Student:</h2>";
    $student2 = new Student();
    $student2->setid("1");
    $student2->setDni("22222222A");
    $student2->setName("Lisa");
    $student2->setSurname("Mouro");
    $student2->setAge(19);
    $numberOfRows = $oper->updateStudent($student2);
    if ($numberOfRows == 1) echo "<p>Student updated in the database.</p>";
    else echo "<p>No student has been updated.</p>";
    */


    $myStudentList = $oper->getAllMyStudent();

  ?>

    <h2>List of Students</h2>
    <table style="width:100%">
      <tr>
        <th>ID</th>
        <th>DNI</th>
        <th>Name</th>
        <th>Surname</th>
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
          <td><?php echo $id; ?></td>
          <td><?php echo $dni; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $surname; ?></td>
          <td><?php echo $age; ?></td>
          <td>
            <div id="contenedorActions">
              <a id="lapiz" href="UpdateStudent.php?id=<?php echo $id; ?>&dni=<?php echo $dni ?>&fname=<?php echo $name ?>&lname=<?php echo $surname ?>&age=<?php echo $age ?>">✏️</a>
              <a id="papelera" href="DeleteStudent.php?id=<?php echo $id; ?>">🗑️</a>
            </div>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
    <br>

    <a href="AddStudent.php" id="enlaceBoton">
      <button id="botonAñadir" type="button">Add a new student</button>
    </a>

  <?php
  } catch (PDOException $e) {
    echo "<br><p style='color:red;'>DB Error: " . htmlspecialchars($e->getMessage()) . "</p><br>";
  } catch (Exception $e) {
    echo "<br><p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p><br>";
  } finally {
    if (isset($oper)) {
      $oper->closeConnection();
    }
  }
  ?>
</body>

</html>