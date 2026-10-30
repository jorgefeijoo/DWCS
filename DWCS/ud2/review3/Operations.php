<?php
require_once("Vehicle.php");
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
        $db   = 'app';            // Database name
        $user = 'app';            // MySQL username
        $pass = 'app_password';   // MySQL password
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
    } //openConnection
    public function closeConnection()
    {
        $this->conn = null;
    }

    public function searchVehicles($brand)
    {
        $sqlString = " select id,plate,brand,model,year from vehicle where brand like ? order by brand,model ";

        $query = $this->conn->prepare($sqlString);
        $query->execute(["%" . $brand . "%"]);
        $myVehiclesList = array();
        while ($rowMyVehicles = $query->fetch()) {
            $obx = new Vehicle();
            $obx->setId($rowMyVehicles["id"]);
            $obx->setPlate($rowMyVehicles["plate"]);
            $obx->setBrand($rowMyVehicles["brand"]);
            $obx->setModel($rowMyVehicles["model"]);
            $obx->setYear($rowMyVehicles["year"]);
            $myVehiclesList[] = $obx;
        }
        return $myVehiclesList;
    }

    public function getVehicles($id)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "select id,plate,brand,model,year from vehicle where id = ? ";

            $query = $this->conn->prepare($sqlString);
            $query->execute([$id]);
            $rowVehicle = $query->fetch();

            $obx = new Vehicle();
            $obx->setId($rowVehicle["id"]);
            $obx->setPlate($rowVehicle["plate"]);
            $obx->setBrand($rowVehicle["brand"]);
            $obx->setModel($rowVehicle["model"]);
            $obx->setYear($rowVehicle["year"]);


            if ($query->rowCount() > 0) {
                $this->conn->commit();
                return $obx;
            } else return null;
        } catch (PDOException $erro) {

            $this->conn->rollback();
            throw $erro;
        }
    }

    public function addVehicle(Vehicle $vehicle)
    {
        try {
            $this->conn->beginTransaction();

            $sqlString = "insert into vehicle( id,plate,brand,model,year) values (?,?,?,?,?)";

            $query = $this->conn->prepare($sqlString);
            $query->execute([$vehicle->getId(), $vehicle->getPlate(), $vehicle->getBrand(), $vehicle->getModel(), $vehicle->getYear()]);

            if ($query->rowCount() > 0) {
                $this->conn->commit(); //Commit the transaction if everything went well
                return $query->rowCount();
            } else return false;
        } catch (PDOException $erro) {
            // Roll back the transaction if somthing failed
            $this->conn->rollback();
            throw $erro;
        }
    }

    public function deleteVehicle($id)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "delete from vehicle where id= ?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$id]);
            $this->conn->commit();
            return $query->rowCount();
        } catch (PDOException $erro) {
            // Roll back the transaction if somthing failed
            $this->conn->rollback();
            throw $erro;
        }
    }

    public function modifyVehicle(vehicle $vehicle)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "update plate= ? , brand = ?, model = ? , year = ? where id = ?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$vehicle->getPlate(), $vehicle->getBrand(), $vehicle->getModel(), $vehicle->getYear(), $vehicle->getId()]);
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
}
