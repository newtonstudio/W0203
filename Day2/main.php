<?php
function __autoload($className){
	include $className.".php";
}

$p = new Person();
$p->walk();

$e = new Engineer();
$e->walk();

$d = new Doctor();
$d->walk();

$d = new Fireman();
$d->walk();

?>