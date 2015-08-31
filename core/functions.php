<?php 
require('core/configuration.php');

class Database {
	function Database(){
		//This class is here to avoid problems with the core class
	}
	function __destruct(){unset($this);}
	
	function get_result_from_query(){}
	function execute_single_query(){}
	function execute_returning_id(){}
}

class Core extends Database {
	function Core(){
		set_time_limit(0);
		$this->conf = new Configuracion();
		$this->url=preg_split("/\//",str_replace('/bilgestatspit', '', $_SERVER['PHP_SELF']));
		

		if(isset($this->url[2]) && $this->url[2] == 'update'){
			$this->update();
		} else {
			$this->title='Home - ';
			$this->url[2] = 'index';
		}
	}
	function __destruct(){unset($this);}

	function sortArray(&$arr, $col, $dir = SORT_ASC) {
		error_reporting(0);
		$sort_col = array();
		foreach ($arr as $key=> $row) {
			$sort_col[$key] = $row[$col];
		}

		array_multisort($sort_col, $dir, $arr);
		return $sort_col;
	}

	function getPercentColor($val,$corte){
		if($val!='-'){
			if(intval($val)>intval($corte)){
				return $this->conf->percentcolor['+'];
			} elseif (intval($val)<intval($corte)) {
				return $this->conf->percentcolor['-'];
			} elseif (intval($val)==intval($corte)) {
				return $this->conf->percentcolor['='];
			} else {
				return "Error";
			}
		}
	}

	function getChampInfo($id,$query,$order){
		$id = (!empty($id)) ? "WHERE id='$id'" : '';
		$order = (!empty($order)) ? "ORDER BY $order" : '';
		$this->query = "SELECT $query FROM champions $id $order";
		$this->get_result_from_query();
		if(empty($id)){ 
			return $this->rows;
		} else {
			return $this->rows[0];
		}
	}

	function getBilgeSummary(){
		$this->alldata = 549470;
		$allgames = $this->alldata/10;
		//$champs = $this->getChampInfo('', 'id,keyname,fullname','keyname ASC');
		//print '$'."champs = json_decode('".htmlentities(json_encode($champs))."',true);";
		//exit;
		$champs = json_decode('[["266","Aatrox","Aatrox"],["103","Ahri","Ahri"],["84","Akali","Akali"],["12","Alistar","Alistar"],["32","Amumu","Amumu"],["34","Anivia","Anivia"],["1","Annie","Annie"],["22","Ashe","Ashe"],["268","Azir","Azir"],["432","Bard","Bard"],["53","Blitzcrank","Blitzcrank"],["63","Brand","Brand"],["201","Braum","Braum"],["51","Caitlyn","Caitlyn"],["69","Cassiopeia","Cassiopeia"],["31","Chogath","Cho&#039;Gath"],["42","Corki","Corki"],["122","Darius","Darius"],["131","Diana","Diana"],["119","Draven","Draven"],["36","DrMundo","Dr. Mundo"],["245","Ekko","Ekko"],["60","Elise","Elise"],["28","Evelynn","Evelynn"],["81","Ezreal","Ezreal"],["9","FiddleSticks","Fiddlesticks"],["114","Fiora","Fiora"],["105","Fizz","Fizz"],["3","Galio","Galio"],["41","Gangplank","Gangplank"],["86","Garen","Garen"],["150","Gnar","Gnar"],["79","Gragas","Gragas"],["104","Graves","Graves"],["120","Hecarim","Hecarim"],["74","Heimerdinger","Heimerdinger"],["39","Irelia","Irelia"],["40","Janna","Janna"],["59","JarvanIV","Jarvan IV"],["24","Jax","Jax"],["126","Jayce","Jayce"],["222","Jinx","Jinx"],["429","Kalista","Kalista"],["43","Karma","Karma"],["30","Karthus","Karthus"],["38","Kassadin","Kassadin"],["55","Katarina","Katarina"],["10","Kayle","Kayle"],["85","Kennen","Kennen"],["121","Khazix","Kha&#039;Zix"],["96","KogMaw","Kog&#039;Maw"],["7","Leblanc","LeBlanc"],["64","LeeSin","Lee Sin"],["89","Leona","Leona"],["127","Lissandra","Lissandra"],["236","Lucian","Lucian"],["117","Lulu","Lulu"],["99","Lux","Lux"],["54","Malphite","Malphite"],["90","Malzahar","Malzahar"],["57","Maokai","Maokai"],["11","MasterYi","Master Yi"],["21","MissFortune","Miss Fortune"],["62","MonkeyKing","Wukong"],["82","Mordekaiser","Mordekaiser"],["25","Morgana","Morgana"],["267","Nami","Nami"],["75","Nasus","Nasus"],["111","Nautilus","Nautilus"],["76","Nidalee","Nidalee"],["56","Nocturne","Nocturne"],["20","Nunu","Nunu"],["2","Olaf","Olaf"],["61","Orianna","Orianna"],["80","Pantheon","Pantheon"],["78","Poppy","Poppy"],["133","Quinn","Quinn"],["33","Rammus","Rammus"],["421","RekSai","Rek&#039;Sai"],["58","Renekton","Renekton"],["107","Rengar","Rengar"],["92","Riven","Riven"],["68","Rumble","Rumble"],["13","Ryze","Ryze"],["113","Sejuani","Sejuani"],["35","Shaco","Shaco"],["98","Shen","Shen"],["102","Shyvana","Shyvana"],["27","Singed","Singed"],["14","Sion","Sion"],["15","Sivir","Sivir"],["72","Skarner","Skarner"],["37","Sona","Sona"],["16","Soraka","Soraka"],["50","Swain","Swain"],["134","Syndra","Syndra"],["223","TahmKench","Tahm Kench"],["91","Talon","Talon"],["44","Taric","Taric"],["17","Teemo","Teemo"],["412","Thresh","Thresh"],["18","Tristana","Tristana"],["48","Trundle","Trundle"],["23","Tryndamere","Tryndamere"],["4","TwistedFate","Twisted Fate"],["29","Twitch","Twitch"],["77","Udyr","Udyr"],["6","Urgot","Urgot"],["110","Varus","Varus"],["67","Vayne","Vayne"],["45","Veigar","Veigar"],["161","Velkoz","Vel&#039;Koz"],["254","Vi","Vi"],["112","Viktor","Viktor"],["8","Vladimir","Vladimir"],["106","Volibear","Volibear"],["19","Warwick","Warwick"],["101","Xerath","Xerath"],["5","XinZhao","Xin Zhao"],["157","Yasuo","Yasuo"],["83","Yorick","Yorick"],["154","Zac","Zac"],["238","Zed","Zed"],["115","Ziggs","Ziggs"],["26","Zilean","Zilean"],["143","Zyra","Zyra"]]',true);
		foreach ($champs as $v) {
			list($id,$keyname,$fullname) = $v;
			$array[$id]['id'] = $id;
			$array[$id]['keyname'] = $keyname;
			$array[$id]['fullname'] = $fullname;
			$ids = (isset($ids)) ? $ids.",'$id'" : "'$id'";
			$array[$id]['items'] = $this->getBilgeItems('6','all',$id);
			$array[$id]['summonerSpells'] = $this->getBilgeSS('2','all',$id);
		}
		//$this->query="SELECT championId,count(*),sum(kills),sum(deaths),sum(assists),count(winner),sum(minionsKilled),sum(goldEarned) FROM matchparticipants WHERE championId IN($ids) GROUP BY championId";
		//$this->get_result_from_query();
		//print '$'."champsdata = json_decode('".json_encode($this->rows)."',true);"; exit;
		$champsdata = json_decode('[["1","6504","43921","43120","50493","3381","585369","66793845"],["2","2215","13615","14977","12595","1068","243153","24001665"],["3","669","3549","4039","6696","340","77016","7106751"],["4","6719","42730","50164","49258","3242","789800","75151003"],["5","8469","63636","59466","56735","4473","510437","96990912"],["6","492","2901","3008","3060","228","61306","5038662"],["7","3148","25470","19206","18361","1435","283593","31623621"],["8","3654","23052","23549","22711","1801","546678","40031581"],["9","2257","10963","15389","18480","1086","115284","22746700"],["10","3669","22265","22352","26173","1907","330323","41978374"],["11","10702","90122","80145","51178","5308","974523","132020775"],["12","3554","7496","19646","44158","1776","147171","30969763"],["13","1366","6707","9682","7911","577","159005","13342747"],["14","2026","10135","12902","17765","1049","218584","21584951"],["15","4787","29016","28698","38913","2516","765718","55511886"],["16","3784","5521","20568","49994","2000","96557","33627448"],["17","8938","57056","59928","56040","4472","1058607","95581912"],["18","5671","39811","35272","34208","2743","801391","63054905"],["19","6561","41380","39606","49685","3514","308464","74095660"],["20","2282","9296","13266","21350","1147","115172","24060748"],["21","13451","99048","86708","97228","6852","1971402","155516403"],["22","9097","59870","61537","73312","4610","1183131","100066346"],["23","6105","43962","39521","30228","3237","868622","74034997"],["24","6388","46027","43345","33991","3232","641407","73685892"],["25","6911","26695","40104","75352","3560","425876","67072864"],["26","800","2416","4402","8528","401","51029","7627652"],["27","1209","5651","8178","9096","626","185256","13150935"],["28","3050","20163","20759","22223","1383","130455","33132926"],["29","2343","17844","16441","14928","1095","290325","26170309"],["30","1096","8871","8489","9437","574","150424","13040602"],["31","4189","27921","22140","25525","2160","559387","46908897"],["32","3026","15830","17556","30770","1635","146109","33571161"],["33","1265","5996","8092","13582","679","68892","13359560"],["34","1186","7424","6184","9206","590","142497","12775741"],["35","4909","33626","30934","30576","2316","248995","53257810"],["36","1716","7903","9669","12487","789","189939","17164103"],["37","6636","20802","38750","85903","3503","168509","62282693"],["38","771","5502","5176","4760","305","80876","7853931"],["39","2874","21465","17776","16892","1429","374990","32072622"],["40","3093","4012","14200","42727","1663","58872","27861621"],["42","1881","13650","10723","13674","924","294423","21859440"],["43","2330","8314","12996","25503","1181","134886","22685372"],["44","1246","2819","7137","15692","645","52501","11067102"],["45","2918","21813","18890","19973","1447","381622","32268823"],["48","1743","9794","10165","13070","876","167845","19225458"],["50","1267","9544","7740","9090","698","131548","13235715"],["51","8450","55226","47701","60059","4351","1348246","98042065"],["53","10399","33030","63002","120764","5508","334419","94601660"],["54","5611","28966","30782","50213","2894","419129","55275565"],["55","4584","42992","33575","29913","2241","549880","50878434"],["56","1960","15190","13071","12604","982","149098","23758848"],["57","2011","8385","11635","18518","975","193713","20127298"],["58","2481","14755","13782","16082","1308","385882","27640802"],["59","2484","15428","15611","25066","1238","204592","27872938"],["60","2815","21752","17524","19380","1487","138826","32225991"],["61","2043","11852","11856","18053","964","273802","22085376"],["62","3162","22841","19133","21784","1713","360883","35811388"],["63","2613","20249","17807","20327","1378","275813","28480066"],["64","9974","69155","67896","78073","4699","587119","108093906"],["67","14059","108443","95335","79175","6978","1976608","161103706"],["68","1606","10718","9943","11489","788","191731","16663444"],["69","1377","9804","9748","8992","654","171083","14945469"],["72","809","4462","4394","7331","419","41922","9148002"],["74","4685","27512","29058","30363","2572","698020","51244120"],["75","4534","23448","26106","26496","2219","679386","49424109"],["76","7484","51636","50382","47372","3434","542012","77541441"],["77","3627","22676","21847","23761","1862","203254","42815696"],["78","970","6292","6301","5384","426","76422","10195604"],["79","2006","9348","11456","17626","935","96006","20330079"],["80","3496","26321","23580","23098","1731","296678","37480527"],["81","8493","57702","48022","63788","3966","1148797","93063947"],["82","1513","10485","9998","9923","839","239733","17471402"],["83","843","4007","5348","5632","375","92367","8402795"],["84","2979","29430","21664","16266","1465","307706","32656670"],["85","1370","8596","8625","9681","692","146487","13876866"],["86","6007","41132","31293","34047","3070","743379","63609742"],["89","5442","13726","31764","69570","2899","214592","48120780"],["90","2851","20605","16762","19548","1534","426375","32874371"],["91","3353","30703","24935","21872","1725","444833","38893010"],["92","5743","41681","38554","29149","2753","807154","64374009"],["96","3967","26897","26911","28512","1976","513907","43440719"],["98","3936","16066","19869","41810","1991","367573","38948422"],["99","8415","49593","45780","79702","4387","740745","85917044"],["101","1696","11301","9877","13352","866","213182","18308488"],["102","5713","37325","31593","37896","2976","468557","70224679"],["103","6283","46467","35981","47949","3310","790707","68578220"],["104","9612","68979","56847","63704","4845","1478326","110977423"],["105","8107","75491","56619","44440","3948","726174","89053521"],["106","3688","22736","21623","30296","1959","258558","38868278"],["107","6659","50436","45858","39126","3190","571800","76623540"],["110","4617","32864","29232","34109","2343","693184","53279882"],["111","9430","31455","56510","104939","4811","495306","87611572"],["112","7277","51972","50351","47678","3546","995722","79789259"],["113","1838","8441","10110","19295","949","92882","20087794"],["114","4288","37791","30702","20730","2281","568687","50088624"],["115","1961","12437","11804","15258","1000","276052","21825592"],["117","2868","8086","15708","32569","1411","160134","27286396"],["119","3666","28604","24648","23589","1767","539909","45428565"],["120","2386","15249","14317","18740","1168","184819","26642342"],["121","3084","23781","19615","17976","1429","202169","34917946"],["122","9616","77418","67673","51150","4724","1252347","106795472"],["126","2420","17205","15273","15841","1126","336602","26722561"],["127","1080","6423","7140","9003","542","151114","11921498"],["131","9779","83731","67495","63103","5029","936830","113496774"],["133","5904","43755","41957","36203","2833","785840","65559918"],["134","1028","7602","6666","6435","481","142579","11330341"],["143","1337","6876","9299","13101","705","98248","14074872"],["150","4871","28952","30695","33966","2349","653136","52463765"],["154","1095","5246","5411","9950","533","69708","11175665"],["157","9875","81175","77571","60232","5027","1631550","120339650"],["161","2414","15317","15145","20161","1264","260250","25777692"],["201","3658","7481","20798","49155","1879","139845","32029230"],["222","12633","93167","79257","90850","6508","1948243","147653784"],["223","12362","39790","77158","108036","5264","689306","107836153"],["236","3387","23363","20289","22291","1652","559693","39747732"],["238","5314","45050","37006","27768","2559","780765","61700535"],["245","6121","45435","41987","40579","2985","632983","66357721"],["254","4079","27847","26044","30435","2116","212297","47298906"],["266","3580","23538","20380","21793","1881","396734","40965853"],["267","4921","10365","28340","66221","2525","97419","44620095"],["268","2666","15909","19570","17986","1239","383057","29004142"],["412","9351","23640","57053","121325","4584","294645","83265222"],["421","2558","12926","15771","20307","1213","138061","27431035"],["429","3471","22943","23525","22937","1576","520527","38891050"],["432","5658","14697","36452","62382","2441","143762","49767003"]]',true);
		foreach ($champsdata as $v) {
			list($id,$games,$kills,$deaths,$assists,$wins,$minions,$gold) = $v;
			$array[$id]['games'] = $games;
			$array[$id]['kills'] = $kills;
			$array[$id]['deaths'] = $deaths;
			$array[$id]['assists'] = $assists;;
			$array[$id]['wins'] = $wins;
			$array[$id]['minions'] = $minions;
			$array[$id]['gold'] = $gold;
			$array[$id]['pickrate'] = round($games*100/$allgames,2);
			$array[$id]['winrate'] = round($wins*100/$games,2);
			$array[$id]['averageKills'] = round($kills/$games,2);
			$array[$id]['averageDeaths'] = round($deaths/$games,2);
			$array[$id]['averageAssists'] = round($assists/$games,2);
			$array[$id]['averageMinions'] = round($minions/$games,2);
			$array[$id]['averageGold'] = round($gold/$games);
			$array[$id]['kda'] = round(($kills+$assists)/$deaths,2);
		}
		return $array;
	}

	function getBilgeChamps($data,$order,$limit){
		$array = array();
		$limit = (!empty($limit)) ? "LIMIT $limit" : '';
		//$this->query="SELECT count(*) FROM matchparticipants";
		//$this->get_result_from_query();

		$this->rows[0][0] = 549470;

		if(!empty($this->rows[0][0])){
			$allgames = $this->rows[0][0]/10;

			//$this->query="SELECT championId,count(*),sum(kills),sum(deaths),sum(assists),count(winner),sum(minionsKilled),sum(goldEarned) FROM matchparticipants WHERE championId!='0' GROUP BY championId ORDER BY $order DESC $limit";
			//$this->get_result_from_query();
			//print json_encode($this->rows);
			//exit;
			//$this->rows = json_decode('[["67","12878","99323","87567","72516","6386","1805304","147515611"],["21","11997","88360","77634","87009","6123","1745652","138590745"],["222","11324","84017","71208","81931","5845","1742989","132699466"],["223","11158","35755","69652","97733","4769","616682","97196793"],["11","9907","83116","74181","47325","4901","906809","121843123"],["53","9547","30388","57563","110916","5097","306314","86785384"],["64","9340","64464","63536","73137","4393","542359","100899299"],["157","9005","74427","70676","54910","4584","1484441","109780428"],["104","8892","63736","52601","58944","4482","1365570","102639897"],["131","8811","75663","61200","57141","4527","847326","102139542"]]',true);
			$this->rows = json_decode('[["50","1218","9187","7399","8709","681","126196","12704741"],["82","1455","10127","9606","9513","803","231137","16829032"],["74","4503","26539","28010","29231","2475","671644","49358299"],["62","3044","22040","18361","20874","1649","347352","34446200"],["40","2973","3884","13647","41267","1606","56548","26850323"],["33","1221","5794","7811","13130","658","66648","12908571"],["32","2937","15380","17113","29897","1576","142029","32594224"],["90","2731","19772","15999","18714","1464","408830","31538967"],["19","6341","40003","38176","47959","3396","297844","71540683"],["89","5234","13193","30462","66882","2789","206538","46307628"]]',true);
			
			foreach ($this->rows as $v) {
				list($id,$games,$kills,$deaths,$assists,$wins,$minions,$gold) = $v;
				$pickrate = round($games*100/$allgames,2);
				$winrate = round($wins*100/$games,2);
				$averageKills = round($kills/$games,2);
				$averageDeaths = round($deaths/$games,2);
				$averageAssists = round($assists/$games,2);
				$averageMinions = round($minions/$games,2);
				$averageGold = round($gold/$games);
				$kda = round(($kills+$assists)/$deaths,2);
				list($keyname,$fullname,$title) = $this->getChampInfo($id,'keyname,fullname,title','');
				$array[] = array('allgames'=>$allgames,'id'=>$id,'games'=>$games,'pickrate'=>$pickrate,'wins'=>$wins,'winrate'=>$winrate,'kills'=>$kills,'averageKills'=>$averageKills,'deaths'=>$deaths,'averageDeaths'=>$averageDeaths,'assists'=>$assists,'averageAssists'=>$averageAssists,'minions'=>$minions,'averageMinions'=>$averageMinions,'gold'=>$gold,'averageGold'=>$averageGold,'kda'=>$kda,'keyname'=>$keyname,'fullname'=>$fullname,'title'=>$title);
			}
		return $array;
		} else {
			print "Error Getting Champions data!";
			exit;
		}
	}

	function getBilgeSS($limit,$order,$where){
		$array = array();
		$championid = (isset($where)) ? $where : '0';
		$limit = (!empty($limit)) ? "LIMIT $limit" : '';
		$order = ($order == 'all') ? array('spell1Id','spell2Id') : preg_split("/,/", $order);
		//$this->query="SELECT count(*) FROM matchparticipants";
		//$this->get_result_from_query();

		$this->rows[0][0] = 549470;

		if(!empty($this->rows[0][0])){
			$allgames = $this->rows[0][0]/10;

			$this->query = "SELECT count(*) FROM spellcount WHERE championid='$championid'";
			$this->get_result_from_query();
			$exist = (!empty($this->rows[0][0]) && $this->rows[0][0] > '0') ? 1 : 0;

			if(!empty($order) && !empty($where) && $exist=='0' && $championid!='41' ) {
				$where = (!empty($championid)) ? "WHERE championId='$championid'" : '';
				$result = array();
				$result2 = array();
				foreach ($order as $o) {
					$this->query="SELECT count($o),$o FROM matchparticipants $where GROUP BY $o ORDER BY count($o) DESC;";
					$this->get_result_from_query();
					$result[$o] = $this->rows;
				}
				foreach ($result as $o => $i) {
					$item = array();
					foreach ($i as $key => $v) {
						foreach ($v as $val){
							$hue = (isset($hue)) ? '{"'.$val.'":"'.$hue.'"}' : $val;
						}
						if(isset($item[$key])) {
							foreach ($item[$key] as $id => $count) {
								foreach (json_decode($hue,true) as $id2 => $count2) {
									if($id == $id2){
										$newcount = $count + $count2;
										$item[$key] = json_decode('{"'.$id.'":"'.$newcount.'"}',true);
									}
								}
							}
						} else {
							$item[$key] = json_decode($hue,true); 
						}
						unset($hue);
					}
					$result2[$o] = $item;
					unset($item);
				}
				foreach ($result2 as $i) {
					$items = array();
					foreach ($i as $v) {
						foreach ($v as $id => $val){
							$items[$id] = (isset($items[$id])) ? $val+$items[$id] : $val;
						}
					}
				}
				foreach ($items as $id => $val) {
					$values = (isset($values)) ? $values.",('".$championid."_".$id."','$id','$val','$championid')" : "('".$championid."_".$id."','$id','$val','$championid')"; 
				}
				if(!empty($values)){
					$this->query = "INSERT INTO spellcount (id,spellid,count,championid) VALUES $values";
					print $this->query."<br><br>";
					$this->execute_single_query();
				}
			}

			$where = (!empty($championid)) ? "WHERE championid='$championid'" : "WHERE campionid='0'";
			$this->query = "SELECT sum(count) FROM spellcount $where";
			$this->get_result_from_query();
			$all = $this->rows[0][0];

			$this->query = "SELECT spellid,count FROM spellcount $where ORDER BY count DESC $limit";
			$this->get_result_from_query();
			foreach ($this->rows as $v) {
				list($id,$count) = $v;
				$this->query="SELECT reference,name FROM summonerspells WHERE id='$id'";
				$this->get_result_from_query();
				list($reference,$name) = $this->rows[0];
				$array[$id]['id']=$id;
				$array[$id]['reference']=$reference;
				$array[$id]['name']=$name;
				$array[$id]['count'] = $count;
				$array[$id]['pickrate'] = (round($count*200/$all,2)>'100') ? '100' : round($count*200/$all,2);
			}
			unset($all);
			return $array;
		} else {
			print "Error Getting Items data!";
			exit;
		}

	}

	function getBilgeItems($limit,$order,$where){
		$array = array();
		$championid = (isset($where)) ? $where : '0';
		$limit = (!empty($limit)) ? "LIMIT $limit" : '';
		$order = ($order == 'all') ? array('item0','item1','item2','item3','item4','item5') : preg_split("/,/", $order);
		//$this->query="SELECT count(*) FROM matchparticipants";
		//$this->get_result_from_query();

		$this->rows[0][0] = 549470;

		if(!empty($this->rows[0][0])){
			$allgames = $this->rows[0][0]/10;

			$this->query = "SELECT count(*) FROM itemcount WHERE championid='$championid'";
			$this->get_result_from_query();
			$exist = (!empty($this->rows[0][0]) && $this->rows[0][0] > '0') ? 1 : 0;

			if(!empty($order) && !empty($where) && $exist=='0' && $championid!='41' ) {
				$where = (!empty($championid)) ? "WHERE championId='$championid'" : '';
				$result = array();
				$result2 = array();
				foreach ($order as $o) {
					$this->query="SELECT count($o),$o FROM matchparticipants $where GROUP BY $o ORDER BY count($o) DESC;";
					$this->get_result_from_query();
					$result[$o] = $this->rows;
				}
				foreach ($result as $o => $i) {
					$item = array();
					foreach ($i as $key => $v) {
						foreach ($v as $val){
							$hue = (isset($hue)) ? '{"'.$val.'":"'.$hue.'"}' : $val;
						}
						if(isset($item[$key])) {
							foreach ($item[$key] as $id => $count) {
								foreach (json_decode($hue,true) as $id2 => $count2) {
									if($id == $id2){
										$newcount = $count + $count2;
										$item[$key] = json_decode('{"'.$id.'":"'.$newcount.'"}',true);
									}
								}
							}
						} else {
							$item[$key] = json_decode($hue,true); 
						}
						unset($hue);
					}
					$result2[$o] = $item;
					unset($item);
				}
				foreach ($result2 as $i) {
					$items = array();
					foreach ($i as $v) {
						foreach ($v as $id => $val){
							$items[$id] = (isset($items[$id])) ? $val+$items[$id] : $val;
						}
					}
				}
				foreach ($items as $id => $val) {
					$values = (isset($values)) ? $values.",('".$championid."_".$id."','$id','$val','$championid')" : "('".$championid."_".$id."','$id','$val','$championid')"; 
				}
				if(!empty($values)){
					$this->query = "INSERT INTO itemcount (id,itemid,count,championid) VALUES $values";
					print $this->query."<br><br>";
					$this->execute_single_query();
				}
			}

			$where = (!empty($championid)) ? "WHERE championid='$championid'" : "WHERE campionid='0'";
			$this->query = "SELECT itemid,count FROM itemcount $where ORDER BY count DESC $limit";
			$this->get_result_from_query();
			foreach ($this->rows as $v) {
				list($id,$count) = $v;
				$array[$id]['id'] = $id;
				$array[$id]['count'] = $count;

				$this->query="SELECT count(*),name,description,plaintext FROM items WHERE id='$id'";
				$this->get_result_from_query();
				if($this->rows[0][0]>'0'){
					list($c,$name,$description,$plaintext) = $this->rows[0];
					$itemarray=array();
					$itemarray['name']=$name;
					$itemarray['description']=$description;
					$itemarray['plaintext']=$plaintext;
				} else {
					$json = file_get_contents("https://global.api.pvp.net/api/lol/static-data/lan/v1.2/item/$id?locale=en_US&version=5.14.1&".$this->conf->api_id);
					$itemarray = json_decode($json,true);
					$plaintext = (isset($itemarray['plaintext'])) ? ",plaintext='".htmlentities($itemarray['plaintext'], ENT_QUOTES, "UTF-8")."'" : '';
					$this->query="INSERT INTO items SET id='$id',name='".htmlentities($itemarray['name'], ENT_QUOTES, "UTF-8")."',description='".htmlentities($itemarray['description'], ENT_QUOTES, "UTF-8")."' $plaintext;";
					$this->execute_single_query();
				}
				if(isset($itemarray['name'])){
					$array[$id]['name'] = $itemarray['name'];
					$array[$id]['description'] = htmlentities($itemarray['description']);
					$array[$id]['plaintext'] = (isset($itemarray['plaintext'])) ? $itemarray['plaintext'] : '';
				} elseif(isset($itemarray['status']['status_code'])) {
					print "Error ".$itemarray['status']['status_code'];
					exit;
				} else {
					print "Unknow Error!";
				}
			}
			return $array;
		} else {
			print "Error Getting Items data!";
			exit;
		}
	}

	function getFile($url,$type){
		$file = preg_split("/\//",$url);
		$file = end($file);
		if(!file_exists($this->conf->disc_url.'images/'.$type.'/'.$file)){
			$return = $this->subir($file,$url,$type);
			if($return == '404' && $type == 'summonericon'){
				return str_replace(" ","%20",$this->conf->http_url.'images/'.$type.'/404.png');
			} else { 
				return $return;
			}
		} else {
			return str_replace(" ","%20",$this->conf->http_url.'images/'.$type.'/'.$file);
		}
	}

	private function subir($name,$imagen,$type){
		$ruta = $this->conf->disc_url.'images/';
		// Verificar si existe la carpeta para el tipo de imagen ("$type") y en caso de no existir, la crea.
		foreach(preg_split("/\//", $type) as $t){
			$ruta .= $t.'/';
			if(!file_exists($ruta)) {
				mkdir($ruta, 0777);
			}
		}
		$file_headers = @get_headers($imagen);
		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
		    return '404';
		} else {
			file_put_contents($ruta.$name, file_get_contents($imagen));	
			return str_replace(" ","%20",$this->conf->http_url.'images/'.$type.'/'.$name);
		}
	}

	private function update(){
		if (isset($_COOKIE['apitries']) && $_COOKIE['apitries'] > 20) {
			print '<META HTTP-EQUIV="REFRESH" CONTENT="120;URL='.$_SERVER['PHP_SELF'].'">';
			print "Reposando por 120 segundos";
			exit;
		}
		$context = stream_context_create(array(
    		'http' => array('ignore_errors' => true),
		));

		print "Getting data From DB... ";
		$this->query="SELECT region, matchid FROM matchs WHERE region IN('LAS','NA','KR') AND updated IS NULL LIMIT 10";
		print "DONE<br>";
		$this->get_result_from_query();
		if(empty($this->rows[0])){
			print "No more data outdated found in the Database Records :D";
			exit;
		}
		foreach ($this->rows as $v) {
			unset($vals);
			$region=$v[0];$matchid= $v[1];
			$this->query="SELECT count(*) FROM matchs WHERE matchid='$matchid' AND region='$region' AND updated='1'";
			$this->get_result_from_query();
			if(!(isset($this->rows[0][0]) && $this->rows[0][0] > '0')){
				print "<br>$matchid - $region<br><br>";

				$region = strtolower($region);
				print "Getting Data from api... ";
				$json = file_get_contents("https://$region.api.pvp.net/api/lol/$region/v2.2/match/$matchid?".$this->conf->api_id,false,$context);
				$matchsarray = json_decode($json);
				if (empty($matchsarray->participants)) {
					print "ERROR<br>Reloading Page...<br>";
					$apitries = (isset($_COOKIE['apitries'])) ? $_COOKIE['apitries']++ : 1;
					setcookie('apitries',$apitries,time()+60, "/");
					print '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL='.$_SERVER['PHP_SELF'].'">';
				} else {
					$region = strtoupper($region);
					print "DONE<br>";

					$participants = $matchsarray->participants;				
					print "Assign values for each participant... ";
					foreach ($participants as $participant) {
						$teamid = $participant->teamId;
						$champid = $participant->championId;
							$stats = $participant->stats;
						$this->query="SELECT count(*) FROM matchparticipants WHERE id='".$region.$matchid.$teamid.$champid."'";
						$this->get_result_from_query();
						if(!(isset($this->rows[0][0]) && $this->rows[0][0] > '0')){
							$vals = (isset($vals)) ? $vals.", ('".$region.$matchid.$teamid.$champid."','$matchid','$region'" : "('".$region.$matchid.$teamid.$champid."','$matchid','$region'";
							foreach ($participant as $key => $value) {
								if($key != 'stats' && $key != 'runes' && $key != 'masteries' && $key != 'timeline'){
									$vals .= (!empty($value)) ? ",'$value'" : ", NULL";
								}
							}
							foreach ($stats as $key => $value) {
								$vals .= (!empty($value)) ? ",'$value'" : ", NULL";
							}
							$vals .= ")";
						}
					}
					if(isset($vals)){
						print " DONE<br>Insert participants into DB... ";
						$this->query = "INSERT INTO matchparticipants (id,matchId,region,teamId,spell1Id,spell2Id,championId,highestAchievedSeasonTier,participantId,winner,champLevel,item0,item1,item2,item3,item4,item5,item6,kills,doubleKills,
									tripleKills,quadraKills,pentaKills,unrealKills,largestKillingSpree,deaths,assists,totalDamageDealt,totalDamageDealtToChampions,totalDamageTaken,largestCriticalStrike,totalHeal,minionsKilled,
									neutralMinionsKilled,neutralMinionsKilledTeamJungle,neutralMinionsKilledEnemyJungle,goldEarned,goldSpent,combatPlayerScore,objectivePlayerScore,totalPlayerScore,totalScoreRank,
									magicDamageDealtToChampions,physicalDamageDealtToChampions,trueDamageDealtToChampions,visionWardsBoughtInGame,sightWardsBoughtInGame,magicDamageDealt,physicalDamageDealt,trueDamageDealt,
									magicDamageTaken,physicalDamageTaken,trueDamageTaken,firstBloodKill,firstBloodAssist,firstTowerKill,firstTowerAssist,firstInhibitorKill,firstInhibitorAssist,inhibitorKills,towerKills,
									wardsPlaced,wardsKilled,largestMultiKill,killingSprees,totalUnitsHealed,totalTimeCrowdControlDealt) VALUES ";
						$this->query .= $vals;
						$this->execute_single_query();
						print " DONE<br>Update match in DB... ";

						$this->query = "UPDATE matchs SET ";
						foreach ($matchsarray as $key => $value) {
							if($key != 'teams' && $key != 'participants' && $key != 'participantIdentities'){
								$sets = (isset($sets)) ? $sets.",$key='$value'" : "$key='$value'";
							}
						}
						$this->query.= $sets.",updated='1' WHERE matchid='$matchid' AND region='$region'";
						$this->execute_single_query();				
						print " DONE <br><br>";
					} else {
						print "Can't find Values!<br>";
						print "Marking as Updated... ";
						$this->query = "UPDATE matchs SET ";
						foreach ($matchsarray as $key => $value) {
							if($key != 'teams' && $key != 'participants' && $key != 'participantIdentities'){
								$sets = (isset($sets)) ? $sets.",$key='$value'" : "$key='$value'";
							}
						}
						$this->query.= $sets.",updated='1' WHERE matchid='$matchid' AND region='$region'";
						$this->execute_single_query();				
						print " DONE <br><br>";
					}
					print '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL='.$_SERVER['PHP_SELF'].'">';
				}
			}
		}
		print  '<script>$(window).load(function() {
  				$("html, body").animate({ scrollTop: $(document).height() }, 1000);
				});</script>';
		$this->query="SELECT count(*) FROM matchs WHERE region IN('LAS','NA','KR') AND updated IS NULL";
		$this->get_result_from_query();
		print $this->rows[0][0]."<div id=\"end\">Partidas restantes.</div><br><br>";
		
		/*
		$regiones = array('BR','EUNE','EUW','KR','LAN','LAS','NA','OCE','RU','TR');
			$region = 'TR';
			$json = file_get_contents('BILGEWATER/'.$region.'.json');
			$matchsarray = json_decode($json);

			foreach ($matchsarray as $matchid) {
				$this->values = (isset($this->values)) ? $this->values.",('".$region."','$matchid')" : "('".$region."','$matchid')";
				//$this->values = "('".$region."','$matchid');";
			}
			$this->query = "INSERT INTO matchs (region,matchid) VALUES ".$this->values;
			$this->execute_single_query();
			print "Insertado <b>".count($matchsarray)."</b> datos de <b>$region</b>.";
			*/
	}
}

$core = new Core();
?>
