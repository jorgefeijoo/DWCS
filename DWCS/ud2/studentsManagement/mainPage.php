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
          <td><?php echo htmlspecialchars($id); ?></td>
          <td><?php echo htmlspecialchars($dni); ?></td>
          <td><?php echo htmlspecialchars($name); ?></td>
          <td><?php echo htmlspecialchars($surname); ?></td>
          <td><?php echo htmlspecialchars($age); ?></td>
          <td>
            <a href="UpdateStudent.php?id=<?php echo $id; ?>&dni=<?php echo $dni ?>&fname=<?php echo $name ?>&lname=<?php echo $surname ?>&age=<?php echo $age ?>">✏️</a>
            <a href="DeleteStudent.php?id=<?php echo $id; ?>">🗑️</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
    <br>

    <a href="AddStudent.php">
      <button type="button">Add a new student</button>
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