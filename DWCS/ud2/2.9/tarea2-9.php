
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = "";
$emailErr = "";
$roleErr = "";
$websiteErr = "";
$singOnErr="";
$name = "";
$email = "";
$role = "";
$city = "";
$singOn="";
$opcion1="";
$webServer=[
    "apache"=>array("Apache"),
    "ngnix"=>array("Ngnix")
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }  
  if (empty($_POST["city"])) {
    $city = "";
  } else {
    $city = test_input($_POST["city"]);
  }

  if (empty($_POST["role"])) {
    $roleErr = "role is required";
  } else {
    $role = test_input($_POST["role"]);
  }
   if (empty($_POST["singOn"])) {
    $singOnErr = "signOn is required";
  } else {
    $singOn = test_input($_POST["singOn"]);
  }
    if (empty($_POST["opcion1"])) {
    $opcion1= "No has escogido ninguna opcion";
  } else {
    $opcion1= test_input($_POST["opcion1"]);
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  City of employment <input type="text" name="city" value="<?php echo $city;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Web Page :
  <select name="opcion1">
        <option value="apache">Apache</option>
        <option value="ngnix">Ngnix</option>
      </select>

  <br><br>
  Role:
  <br>
  <input type="radio" name="role" <?php if (isset($role) && $role=="admin") echo "checked";?> value="admin">Admin
  <input type="radio" name="role" <?php if (isset($role) && $role=="engineer") echo "checked";?> value="engineer">Engineer
  <input type="radio" name="role" <?php if (isset($role) && $role=="manager") echo "checked";?> value="manager">Manager  
  <input type="radio" name="role" <?php if (isset($role) && $role=="guest") echo "checked";?> value="guest">Guest 
  <span class="error">* <?php echo $roleErr;?></span>
  <br>
  <br>
  Single Sing-on to the following;
  <br>
  <input type="checkbox" name="singOn" <?php if (isset($singOn) && $singOn=="mail") echo "checked";?> value="mail">Mail
  <input type="checkbox" name="singOn" <?php if (isset($singOn) && $singOn=="payroll") echo "checked";?> value="payroll">Payroll
  <input type="checkbox" name="singOn" <?php if (isset($singOn) && $singOn=="selfService") echo "checked";?> value="selfService">Self-service
  <span class="error">* <?php echo $singOnErr;?></span><br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $city;
echo "<br>";
echo $opcion1;
echo "<br>";
echo $role;
echo "<br>";
echo $singOn;


?>

</body>
</html>