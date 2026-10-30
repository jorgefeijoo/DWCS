<?php
$products = array(
    0 => array("description" => "potatoes", "price" => 2, "picture" => "potatoe.jpg"),

    1 => array("description" => "tomatoes", "price" => 2.5, "picture" => "tomatatoe.jpg"),

    2 => array("description" => "onions", "price" => 1.3, "picture" => "onion.jpg"),

);


function generateSelect($array)
{
    foreach ($array as $key => $value) {
        echo "<option value =\"$key\">" . $value['description'] . "</option>";
    }
}

generateSelect($products);
