<?php
class Configuracion {
	function Configuracion(){
		$this->url_local = "http://localhost/bilgestatspit/";
		$this->disc_url = "C:/xampp/htdocs/bilgestatspit/";
		$this->http_url = $this->url_local;

		$this->currentseason = "SEASON2015";

		$this->api_id="api_key=bb04661c-be06-45b1-a732-1922c56ea689"; // temp production key
		//$this->api_id="api_key=74a6a3ac-981f-48c1-ac1f-a6653fea17c8"; // DBG key
		//$this->api_id="api_key=58708a58-8a6e-4891-8483-f7e185a4659d"; // scragui key
		
		$this->regionid = array('BR'=>'BR1','EUNE'=>'EUN1','EUW'=>'EUW1','KR'=>'KR','LAN'=>'LA1','LAS'=>'LA2','NA'=>'NA1','OCE'=>'OC1','TR'=>'TR1','RU'=>'RU','PBE'=>'PBE1','Global'=>'*');
		$this->regionhost = array('BR'=>'br.api.pvp.net','EUNE'=>'eune.api.pvp.net','EUW'=>'euw.api.pvp.net','KR'=>'kr.api.pvp.net','LAN'=>'lan.api.pvp.net','LAS'=>'las.api.pvp.net','NA'=>'na.api.pvp.net','OCE'=>'oce.api.pvp.net','TR'=>'tr.api.pvp.net','RU'=>'ru.api.pvp.net','PBE'=>'pbe.api.pvp.net','Global'=>'global.api.pvp.net' );
		$this->tiercolor = array('UNRANKED'=>"#555", 'BRONZE'=>"#cd7f32",'SILVER'=>"#ddd", 'GOLD'=>"#FF6",'PLATINUM'=>"#1df",'DIAMOND'=>'#3af');
		$this->romtoint = array('i' => '1','ii' => '2','iii' => '3','iv' => '4','v' => '5','I' => '1','II' => '2','III' => '3','IV' => '4','V' => '5', '' => '');
		$this->percentcolor = array('+' => '#4d8', '-' => '#f76', '=' => '#dd4');

		$this->url_cdn = "http://ddragon.leagueoflegends.com/cdn/";
		$this->url_tier_medals = "http://sk2.op.gg/images/medals/";
		$this->url_version = $this->url_cdn."5.14.1/";
		$this->url_img = $this->url_version."img/";
		$this->url_uicon = $this->url_img."";

		$this->map_headercolor = array('11'=>'rgba(60,100,70,0.8)','12'=> 'rgba(40,50,130,0.8)', '14'=>'rgba(80,60,0,0.8)');
		$this->map_background = array('11'=>$this->http_url.'images/SRBackground.png','14'=>$this->http_url.'images/BWBackground.png','12'=>$this->http_url.'images/HABackground.jpg');
	}
	function __destruct(){unset($this);}
}
?>