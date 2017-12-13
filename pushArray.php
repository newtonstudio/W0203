<?php

//Indexed Array

$cars = array("Volvo","BMW","Saab");
echo "before <br/>";
print_r($cars);

$cars[] = "Toyota";
echo "after <br/>";
print_r($cars);

//how we push value into an indexed array


//Associative Array
$cars = array(
	"Toyota" => 252000,
	"Honda" => 79800,
	"BMW" => 3300000,
);

echo "before <br/>";
print_r($cars);
echo "<br/>";

$cars['Nissan'] = 123000;
echo "after <br/>";
print_r($cars);



?>