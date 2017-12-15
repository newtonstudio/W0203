<?php
class Animal {
	private $name = "Anonymous";
	private $speed = 0;

	public function __construct($name){
		$this->name = $name;
	}

	public function preparing(){
		$this->speed = rand(1,10);
	}

	public function run(){
		echo $this->name." running with speed of ".$this->speed."<br/>";
	}

	public function getSpeed(){
		return $this->speed;
	}
}
?>