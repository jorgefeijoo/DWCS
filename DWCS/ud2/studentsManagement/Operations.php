<?php
require_once("Student.php");
class Operations
{
    private $conn;
    public function __construct()
    {
        $this->openConnection();
    }
    public function openConnection()
    {
        // Database configuration (match your docker-compose.yml)
        $host = 'mysql';          // The service name in docker-compose (not 'localhost')
        $db   = 'app';        // Database name
        $user = 'app';        // MySQL username
        $pass = 'app_password';    // MySQL password
        $charset = 'utf8mb4';

        // DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        // PDO options for better error handling and performance
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch results as associative arrays
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Use real prepared statements
        ];

        // Create a PDO instance (connect to the database)
        $this->conn = new PDO($dsn, $user, $pass, $options);
    }
    public function closeConnection()
    {
        $this->conn = null;
    }
    public function getStudent($id)
    {
        $sqlString = "select id, dni, name, surname, age from student where id = ?;";
        $query = $this->conn->prepare($sqlString);
        $query->execute([$id]); // It executes the sql sentence
        $rowStudent = $query->fetch(); // It accesses the first row of data
        //Create an object of MyGuest with the contents of the table row
        $obx = new Student();
        $obx->setId($rowStudent["id"]);
        $obx->setDni($rowStudent["dni"]);
        $obx->setName($rowStudent["name"]);
        $obx->setSurname($rowStudent["surname"]);
        $obx->setAge($rowStudent["age"]);
        return $obx;
    }

    public function getAllMyStudent()
    {
        $sqlString = "select id, dni, name, surname, age from student;";
        $query = $this->conn->prepare($sqlString);
        $query->execute(); // It executes the sql sentence
        $myStudentList = array(); //Create an empty list
        while ($rowMyStudent = $query->fetch()) {
            //Create an object of MyGuest with the contents of the table row
            $obx = new Student();
            $obx->setId($rowMyStudent["id"]);
            $obx->setDni($rowMyStudent["dni"]);
            $obx->setName($rowMyStudent["name"]);
            $obx->setSurname($rowMyStudent["surname"]);
            $obx->setAge($rowMyStudent["age"]);
            $myStudentList[] = $obx;
        }
        return $myStudentList;
    }

    public function addStudent(Student $student)
    { //It receives an object of the class MyGuests
        try {
            $this->conn->beginTransaction();
            $sqlString = "insert into student( dni, name, surname,age) values ( ?, ?, ?,?);";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$student->getDni(), $student->getName(), $student->getSurname(), $student->getAge()]); // It executes the sql sentence
            if ($query->rowCount() > 0) {
                $this->conn->commit(); //Commit the transaction if everything went well
                return true;
            } else return false;
        } catch (PDOException $erro) {
            // Roll back the transaction if somthing failed
            $this->conn->rollback();
            throw $erro;
        }
    }
    public function updateStudent(Student $student)
    {
        try {
            $sqlString = "update student set dni=?, name=? ,surname=?,age=? where id=?";
            $this->conn->beginTransaction();
            $query = $this->conn->prepare($sqlString);
            $query->execute([$student->getDni(), $student->getName(), $student->getSurname(), $student->getAge(), $student->getId()]); // It executes the sql sentence
            if ($query->rowCount() > 0) {
                $this->conn->commit(); //Commit the transaction if everything went well
                return true;
            } else return false;
        } catch (PDOException $erro) {
            // Roll back the transaction if somthing failed
            $this->conn->rollback();
            throw $erro;
        }
    }
    public function deleteStudent($id)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "delete from student where id = ?;";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$id]); // It executes the sql sentence
            $this->conn->commit(); //Commit the transaction if everything went well
            return $query->rowCount();
        } catch (PDOException $erro) {
            // Roll back the transaction if somthing failed
            $this->conn->rollback();
            throw $erro;
        }
    }
} //class