<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$name=$_GET["vname"];
$opcion1=$_GET["opcion1"]
?>
   <h1>Third page</h1>
  
   <form method="post" action="manage2.php">
     <label for="name">Names and surnames: </label>
      <input type="text" id="name" name="vname" value=<?php echo $name?>>
      <br />
      <br>
        <p>lenguajes disponibles:</p>
      <select name="opcion1">
        <option value="Java"<?php if($opcion1=="Java") ?>>Java Programming</option>
        <option value="WebDesing" <?php if($opcion1=="WebDesing") ?>>Web Desing</option>
        <option value="Dockers" <?php if($opcion1=="Docker") ?>>Docker administration</option>
        <option value="Django" <?php if($opcion1=="Django") ?>>Django frameworks</option>
        <option value="Mongo" <?php if($opcion1=="Mongo") ?>>Mongo Database</option>
      </select>
      <br>
      <p>type of classes:</p>
      
      <input type="radio" id="person" name="typeClass" value="In-person clases">
      <label for="personClases">In-person classes</label><br>
      <input type="radio" id="disance" name="typeClass" value="distance clases">
      <label for="distanceClases">Distance classes</label><br>
      <br>
      <button type="submit" name="enviar" value="send data">submit</button>
    </form>

</body>
</html>