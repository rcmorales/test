<?php
 Class PersonBase
 {
    public $age = '';
	private $height = '0';
	
	public function addHeight($inches){
	        $this->height = $this->height + $inches;
	}
	
	private function getHeight(){
	    if ($this->height == 0){
			throw new Exception('Height is zero.');
		}else{
			return $this->height;
		}
	}
	
	public function setRandomAge(){
		$this->age = rand(18,90);	
	}
	
	public function saySomething(){
		$url = 'https://baconipsum.com/api/?type=all-meat&sentences=1&start-with-lorem=1';
		$res = file_get_contents($url);
		$txt = json_decode($res, true);
		echo $txt;	
	} 
 }



>
