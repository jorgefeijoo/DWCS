<?php
Class Calculator{
    private $num1;
    private $num2;

      function __construct($num1=0, $num2=0){
      $this->num1 = $num1;
      $this->num2 = $num2;
    }
    function __toString()
    {
      return "<br><br> Numero 1: $this->num1, numero 2: $this->num2";
    }
    public function setNum1($num1){
      $this->num1 = $num1;
    }
    public function setNum2($num2){
      $this->num2 = $num2;
    }
    public function getNum1(){
      return $this->num1;
    }
    public function getNum2(){
      return $this->num2;
    }

     function __multiply(){
        return $this->num1 * $this->num2;
    }

    function __add(){
        return $this->num1 + $this->num2;

    }
}
$firstCalculate = new Calculator();
$secondCalculate = new Calculator(5,6);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculator</h1>
    <?php 
    $firstCalculate -> setNum1(8);
    $firstCalculate -> setNum2(9);

    echo "<br>";
    echo  "First number value ".$firstCalculate->getNum1();
    echo "<br><br>";
    echo  "Second number value ".$firstCalculate->getNum2();

    echo $secondCalculate->__toString();
    echo "<br><br>";

    
    echo"Los numeros multiplicados son : ". $secondCalculate->__multiply();
    echo "<br><br>";

    echo"Los numeros sumados son : ". $secondCalculate->__add();
  



    ?>
</body>
</html>
