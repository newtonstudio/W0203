<?php
class Session {
	public function __construct(){
		session_start();
	}

	public function get_sessionID() {
		return session_id();
	}

	public function set_userdata($name, $value) {
		$_SESSION[$name] = $value;
	}

	public function userdata($name) {
		return $_SESSION[$name];
	}
}
?>