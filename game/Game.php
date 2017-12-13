<?php
class Game {

	public $participants = array();

	public function queueUp(Animal $animal){


		$this->participants[] = $animal;
	}

	public function preparing(){
		foreach($this->participants as $v) {
			$v->preparing();
		}
	}

	public function running(){
		foreach($this->participants as $v) {
			$v->run();
		}
	}

	public function endGame(){

		foreach($this->participants as $v) {
			$speed = $v->getSpeed();
			echo "<br/>".$speed;
		}
	}

}
?>