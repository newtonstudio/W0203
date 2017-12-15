<?php
class Person {
	public function __construct(){
		echo "Hello World! <br/>";
	}

	public function speak(){
		echo "Good Morning<br/>";
	}

	public function __destruct(){
		echo "Good Bye! <br/>";
	}

}


$p = new Person();

echo "12345 <br/>";


?>