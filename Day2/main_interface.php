<?php
function __autoload($className){
	include $className.".php";
}


$batman = new Batman();
$batman->showSuperPower();
echo "<br/>";
$batman->sing();


$sm = new Superman();
$sm->showSuperPower();



?>