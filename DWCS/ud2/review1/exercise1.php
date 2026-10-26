<?php
$orderArray = array(
    "name" => "Carmen Agulla",
    "address" => " rúa Nova, 23, Santiago de Compostela",
    "pedido" => array(
        "order1" => array("description" => "keyboard", "price_of_unit" => 20, "number_Of_Units" => 2),

        "order2" => array("description" => "mouse", "price_of_unit" => 12, "number_Of_Units" => 4),

        "order3" => array("description" => "screen", "price_of_unit" => 130, "number_Of_Units" => 1)
    )
);


function showArray($array)
{
    echo "<h1> Information of the order </h1>";
    echo "<p>Cliente: " . $array['name'] . "</p>";
    echo "<p>Dirección: " . $array['address'] . "</p>";

    echo "<br>";

    $totalProduct = 0;
    $total = 0;

    echo "<ul>";
    foreach ($array['pedido'] as  $value) {
        echo "<li>" . "Description: " . $value['description'] . " " . " Price of units: " . $value["price_of_unit"] . " " . " Number of units: " . $value['number_Of_Units'], "</li>";

        $totalProduct = $value["price_of_unit"] * $value['number_Of_Units'];
        $total = $total + $totalProduct;
    }
    echo "</ul>";

    echo "<br>";

    echo "<p> " . "precio: " . $total  . "</p>";
}

showArray($orderArray);
