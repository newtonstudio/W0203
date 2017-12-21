<?php
class Emailer {

	public function send($to="Jason <newtonstudio@gmail.com>", $subject = "Testing Mailgun by CURL", $message = "Hello Jason"){

		  $ch = curl_init();

		  $apikey = "api:key-3c123e0a5c67c56f17b70d50517e397f";
		  $from = "Mailgun Sandbox <postmaster@sandbox7e1e8cc953714273a441fdd9f0967239.mailgun.org>";
		  $endpoint = "https://api.mailgun.net/v3/sandbox7e1e8cc953714273a441fdd9f0967239.mailgun.org/messages";

		  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		  curl_setopt($ch, CURLOPT_USERPWD, $apikey);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		  $plain = strip_tags(nl2br($message));

		  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		  curl_setopt($ch, CURLOPT_URL, $endpoint);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, array('from' => $from,
		        'to' => $to,
		        'subject' => $subject,
		        'html' => $message,
		        'text' => $plain));

		  $j = json_decode(curl_exec($ch));

		  $info = curl_getinfo($ch);

		  if($info['http_code'] != 200)
		        error("Something wrong on sending");

		  curl_close($ch);

		  return $j;

	}


}

?>