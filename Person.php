<?php
class Person {
	public $age = 18; //properties
	protected $height = 183; //properties

	public function __construct($age=21, $height=170) {

		$this->age = $age;
		$this->height = $height;

	}

	public function walk(){
		echo "Walk by leg";
	}

	public function shout(){
		echo "ARRRRRR....";
	}

	public function jump(){
		echo "Doi.. Doi..";
	}
}
?>