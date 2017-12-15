<?php
class Batman implements IHero, IOrdinary {
	
	public function fly(){
		echo "Batman fly with a shotgun";
	}

	public function walk(){
		echo "Batman walk like a shadow";
	}

	public function showSuperPower(){
		echo "Rich...";
	}

	public function sing(){
		echo "Lalala....";
	}

	public function cry(){
		echo "Ouch....";
	}
	
}
?>