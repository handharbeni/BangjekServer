<?php
class config{
	public $base_url	= "http://192.168.1.12/bangjeck/";
	public $gmaps		= "AIzaSyDaS4PxsXY7mk0TUzcDa8jhel1UVwLi7bc";

	function base_url(){
		return $this->base_url;
	}
	function google_maps_api(){
		return $this->gmaps;
	}
	function browser(){
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$platform="";
		if (preg_match('/okhttp/i', $u_agent)) {
			$platform = 'okhttp';
		}

		if($platform==="okhttp"){
			return 1;
		}else{
			return 1;
		}
	}
	function browser2(){
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$platform="";
		if (preg_match('/Android/i', $u_agent)) {
			$platform = 'android';
		}

		if($platform==="android"){
			return 1;
		}else{
			return 0;
		}
	}
}
$config	= new config();
?>