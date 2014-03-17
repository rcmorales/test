<?php
 Class Person extends PersonBase
 {
	
	public function saySomething(){
		$url = 'https://baconipsum.com/api/?type=all-meat&sentences=1&start-with-lorem=1';
		$res = file_get_contents($url);
		$txt = json_decode($response, true);
		$reverse = strrev($txt);	
		return $reverse;
	} 
 }



>
