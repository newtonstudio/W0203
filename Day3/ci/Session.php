<?php
class Session {
	public function __construct(){
		session_start();
	}

	public function get_sessionID() {
		return session_id();
	}
}
?>