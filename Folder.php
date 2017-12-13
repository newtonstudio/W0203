<?php
class Folder {
	private $key = "54361";

	protected $pKey = "12345";

	public function getKey(){
		return $this->key;
	}
}

class Subfolder extends Folder {
	public function getPKey(){
		return $this->pKey;
	}
}


$f = new Subfolder();

echo $f->getPKey();


?>