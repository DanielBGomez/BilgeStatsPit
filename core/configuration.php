<?php
class Configuracion {
	function Configuracion(){
		$this->url_local = "http://localhost/bilgestatspit/";
		$this->disc_url = "C:/xampp/htdocs/bilgestatspit/";
		$this->http_url = $this->url_local;

		$this->api_id="api_key=bb04661c-be06-45b1-a732-1922c56ea689"; // temp production key
		// this key'll be obsolet in September 1st!
		
		$this->percentcolor = array('+' => '#4d8', '-' => '#f76', '=' => '#dd4');

		$this->url_cdn = "http://ddragon.leagueoflegends.com/cdn/";
		$this->url_version = $this->url_cdn."5.14.1/";
		$this->url_img = $this->url_version."img/";
	}
	function __destruct(){unset($this);}
}
?>
