<?php
include "Animal.php";
include "Bird.php";
include "Tiger.php";
include "Lion.php";

$animalShowList = array();
$ani = new Bird();
$animalShowList[] = $ani;
$ani = new Tiger();
$animalShowList[] = $ani;
$ani = new Lion();
$animalShowList[] = $ani;

//polymorphism
foreach($animalShowList as $v) {
	$v->speak();
}







?>