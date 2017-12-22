<?php
class SMS {

	private $username = "";
	private $password = "";

	public function sendSms($dest, $msg, $type){

		$destination = urlencode($dest);
	      $message = $msg;
	      $message = html_entity_decode($message, ENT_QUOTES, 'utf-8'); 
	      $message = urlencode($message);
	      
	      $username = urlencode($this->username);
	      $password = urlencode($this->password);
	      $sender_id = urlencode("66300");
	      /*
	      	Type of SMS
			1 - ASCII (English, Bahasa Melayu, etc)
			2 - Unicode (Chinese, Japanese, etc)
	      */
	      $type = (int)$type;

	      $fp = "https://www.isms.com.my/isms_send.php";
	      $fp .= "?un=$username&pwd=$password&dstno=$destination&msg=$message&type=$type&sendid=$sender_id";
	      //echo $fp;
	      
	      $result = $this->ismscURL($fp);
	      return $result;

	}

	public function checkBalance() {
		$result = $this->ismscURL("https://www.isms.com.my/isms_balance.php?un=".urlencode($this->username)."&pwd=".urlencode($this->password));
		return $result;
	}

	public function ismscURL($link){

      $http = curl_init($link);
      curl_setopt($http, CURLOPT_RETURNTRANSFER, TRUE);
      $http_result = curl_exec($http);
      $http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
      curl_close($http);
      return $http_result;
    }
}

?>