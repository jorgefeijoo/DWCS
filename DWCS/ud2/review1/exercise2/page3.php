<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>show your name from page 1</h1>
    <?php
    $name = $_GET['fname'];
    echo "<p>" . "Your name is: " . $name . " </p>"
    ?>
</body>

</html>