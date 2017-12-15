<?php
include "Person.php";
include "Engineer.php";
//a person has been instantiate from a class
// we cast a spell to make Person alive
$p = new Person();

echo $p->age; //properties of Person
echo "<br/>";
echo $p->height;
echo "<br/>";
echo $p->fixSomething();


?>