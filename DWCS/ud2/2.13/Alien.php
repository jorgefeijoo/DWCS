<?php
class Alien {
    private $name;
    static private $numberOfAliens =0;

     function __construct($name) {
        $this->name = $name;
        self::$numberOfAliens ++;
    }

    

 public static function ___getNumberOfAliens(){
        return self::$numberOfAliens;
    }


   
    public function getName()
    {
        return $this->name;
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
    <h1>Numero de aliens</h1>
    <?php
    $alien1 = new Alien("gosendo");
   

    echo "nombre de alien: ".$alien1-> getName();
    echo"<br>";

    echo "numero de aliens ". Alien::___getNumberOfAliens();
    echo"<br>";


     $alien2 = new Alien("liñariño");
    echo "nombre de alien: ".$alien2-> getName();

    echo"<br>";

    echo "numero de aliens ". Alien::___getNumberOfAliens();



    ?>
</body>
</html>