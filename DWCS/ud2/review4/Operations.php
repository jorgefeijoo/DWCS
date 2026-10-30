<?php
require_once("Post.php");
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
        $db = 'app';        // Database name
        $user = 'app';        // MySQL username
        $pass = 'app_password';    // MySQL password
        $charset = 'utf8mb4';

        // DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        // PDO options for better error handling and performance
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch results as associative arrays
            PDO::ATTR_EMULATE_PREPARES => false,                  // Use real prepared statements
        ];

        // Create a PDO instance (connect to the database)
        $this->conn = new PDO($dsn, $user, $pass, $options);
    }
    public function closeConnection()
    {
        $this->conn = null;
    }

    function getAllPost()
    {
        $sqlString = "select id ,title,contents from post ";
        $query = $this->conn->prepare($sqlString);
        $query->execute();
        $postList = array();
        while ($myPost = $query->fetch()) {
            $obx = new Post();
            $obx->setId($myPost["id"]);
            $obx->setTitle($myPost["title"]);
            $obx->setContents($myPost["contents"]);
            $postList[] = $obx;
        }
        return $postList;
    }

    function getPost($id)
    {
        $sqlString = "select id , title contents from post  where id = ?";
        $query = $this->conn->prepare($sqlString);
        $query->execute(["$id"]);
        $myPost = $query->fetch();
        $obx = new Post();
        $obx->setId($myPost(["id"]));
        $obx->setTitle($myPost(["title"]));
        $obx->setContents($myPost(["contents"]));
        return $obx;
    }

    function addPost(Post $post)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "insert into post (id,title,contents) values (?,?,?)";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$post->getId(), $post->getTitle(), $post->getContents()]);
            if ($query->rowCount() > 0) {
                $this->conn->commit(); //Commit the transaction if everything went well
                return true;
            } else return false;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }
}
