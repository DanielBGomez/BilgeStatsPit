<?php
if(!isset($core)){
	header('Location: ../');
}

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
	if(!isset($_COOKIE['mobile'])){ ?>
		<script type="text/javascript">
			alert("This page consumes a lot of data due to the large amount of images and data showing.\nIf you are visiting us from a mobile, we recommend not to use a network of metered usage.");
		</script>
		<?php
		$expire=time()+3600;
		setcookie('mobile', 'true', $expire);
	}
}


?>

<style type="text/css">
	#right {width:800px;float:right;display: inline-block;}
	#left  {width:370px;float:left;display: inline-block;}
	#left .section p {
		margin: 0px;
		color:#ccc !important;
		background-color: rgba(50,50,50,0.2);
		padding: 5px 25px;
		font-size: 14px;
	}
	.section[popular] .featured {height: 370px;}
	.section[best] .featured 	 {height: 370px;}
	.featured-champ { cursor: pointer;margin:0px;height: 370px;overflow: hidden;}
	.featured img {max-width: 100%;width:800px;margin: 0px;margin-top:-20px;}
	.others {font-family: serif;text-align: left;width:100%;margin:0px;padding:0px;}
	.others img {cursor: pointer;border-style: solid;border-width: 4px;border-color: rgba(0,0,0,0.9);margin-right: -4px;margin-bottom:-4px;width: 72px;}
	.others[items] img {width: 53px;}
	.others img:hover {border-color: rgba(50,50,50,0.7);}
	.featured-champ .name {width: 740px;padding: 0px 30px;margin-top: 280px;position: absolute;text-align: right;font-size: 20px;	}
</style>


<div id="left">
	<div class="section">
		<h1>Bilge Stats Pit</h1>
		<p style="padding-bottom:5px;height:253px;">
			<img src="<?php echo $core->conf->http_url;?>images/logo.png" width="250px" >
		</p>
		<p style="text-align: justify;padding-bottom:10px">
			This page let you know the Stats of <a href="?/champions">every Champion</a> played while the Black Market Brawlers Games; Popularity of <a href="?/champions/summary/pickrate">Champions</a>, Items and Summoner Spells; a very big table of <a href="?/champions/summary">Summary Data</a> and the <a href="https://github.com/DanielBGomez/BilgeStatsPit/blob/master/README.md" target="_BLANK">Full Documentation</a> of how this App works. 
		</p>
		<p style="padding-bottom:25px">
			<small style="opacity:0.5"><b><a href="http://na.leagueoflegends.com/en/news/community/contests/riot-games-api-challenge-20" target="_BLANK">LEAGUE OF LEGENDS API CHALLENGE 2.0 ENTRY</a></b></small>
		</p>
	</div>


	<style type="text/css">
		#general-data{
			width: 100%;
			color:#ccc !important;
			background-color: rgba(50,50,50,0.2);
			padding: 0px 25px 25px;
			font-size: 13px;
			line-height: 9px;
		}
		#general-data tr {margin:0px auto 0px 20px;width: 245px;display: inline-block;text-align: left}
	</style>
	<div class="section">
		<h1>General Data</h1>
		<p style="padding:25px 0px 10px"><big>Matchs Data:</big></p>
		<p><small>Matchs Analized</small><br><b>54,947</b><br></p>
		<p><small>Matchs Participants</small><br><b>549,470</b></p>
		<p><small>Average Match Duration</small><br><b><?php echo date("i:s",'2024');?></b></p>
		<p style="padding-top:25px">
			<big>Champions Data:</big><br><br>
			<small>Average KDA: &nbsp;</small><?php echo $home->generaldata['averageKda'];?><br>
			<small>Average Win Rate: &nbsp;</small><?php echo $home->generaldata['averageWinrate'];?>%<br>
			<small>Average Pick Rate: &nbsp;</small><?php echo $home->generaldata['averagePickrate'];?>%
		</p>
		<table id="general-data">
			<tr><td width="90px"><small>Average Kills:</small></td><td><?php echo $home->generaldata['averageKills'];?> <small>( <?php echo number_format($home->generaldata['kills']);?> )</small></td></tr>
			<tr><td width="90px"><small>Average Deaths:</small></td><td><?php echo $home->generaldata['averageDeaths'];?> <small>( <?php echo number_format($home->generaldata['deaths']);?> )</small></td></tr>
			<tr><td width="90px"><small>Average Assists:</small></td><td><?php echo $home->generaldata['averageAssists'];?> <small>( <?php echo number_format($home->generaldata['assists']);?> )</small></td></tr>
			<tr><td width="90px"><small>Average Minions:</small></td><td><?php echo $home->generaldata['averageMinions'];?> <small>( <?php echo number_format($home->generaldata['minions']);?> )</small></td></tr>
			<tr><td width="90px"><small>Average Gold:</small></td><td><?php echo $home->generaldata['averageGold'];?> <small>( <?php echo number_format($home->generaldata['gold']);?> )</small></td></tr>
		</table>
	</div>



	<div class="section">
		<h1>Advertisement</h1>
		<p style="padding: 17px 0px !important">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- BilgeStatsPit -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:336px;height:280px;margin:0px auto"
			     data-ad-client="ca-pub-7443905296718249"
			     data-ad-slot="2390881017"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</p>
	</div>
</div>



<div id="right">
	<div class="section" popular>
		<h1 href="?/champions/summary/pickrate">Most Picked Champions</h1>
		<div class="featured">
			<?php foreach($home->popularchamps as $k => $champ){ ?>
				<div href="?/champions/<?php echo $champ['keyname'];?>" class="featured-champ" <?php if($k!='0'){echo 'style="display:none;"';} echo "ref=\"$k\""; ?>>
					<div class="inner-info" style="margin-left:25px;margin-top:15px">
						<p>
							Overall Pick Rate<br>
							<big style="color:<?php echo $core->getPercentColor($champ['pickrate'],$home->generaldata['averagePickrate']); ?>"><?php echo $champ['pickrate']; ?>%</big><br>
							<small style="margin-top:-4px">Games: &nbsp;<b><?php echo number_format($champ['games']);?></b></small>
						</p>
						<p>
							Win Rate<br>
							<big style="color:<?php echo $core->getPercentColor($champ['winrate'],$home->generaldata['averageWinrate']); ?>"><?php echo $champ['winrate']; ?>%</big>
						</p>
					</div>
					<div class="inner-info" style="margin-left:25px;margin-top:175px">
						<p>
							<big>Champion KDA: &nbsp;<font color="<?php echo $core->getPercentColor($champ['kda'],'2'); ?>"><?php echo $champ['kda']; ?></font></big>
						</p>
						<p>
							<table>
								<tr><td width="50px"><small>Kills:</small></td><td><?php echo $champ['averageKills']; ?> &nbsp;<small>( <?php echo number_format($champ['kills']); ?> )</small></td></tr>
								<tr><td><small>Deaths:</small></td><td><?php echo $champ['averageDeaths']; ?> &nbsp;<small>( <?php echo number_format($champ['deaths']); ?> )</small></td></tr>
								<tr><td><small>Assists:</small></td><td><?php echo $champ['averageAssists']; ?> &nbsp;<small>( <?php echo number_format($champ['assists']); ?> )</small></td></tr>
								<tr><td><small>Minions:</small></td><td><?php echo $champ['averageMinions']; ?> &nbsp;<small>( <?php echo number_format($champ['minions']); ?> )</small></td></tr>
								<tr><td><small>Gold:</small></td><td><?php echo number_format($champ['averageGold']); ?> &nbsp;<small>( <?php echo number_format($champ['gold']); ?> )</small></td></tr>
							</table><br>
							<small>Data analized: &nbsp;<b><?php echo number_format('549470');?></b></small>
						</p>
					</div>
					<div class="name">
						<big><?php echo $champ['fullname']; ?></big><br>
						<?php echo $champ['title']; ?>
					</div>
					<img src="<?php echo $core->getFile($core->conf->url_cdn.'img/champion/splash/'.$champ['keyname'].'_0.jpg','champion/splashart'); ?>" >
				</div>
			<?php } ?>
		</div>
		<div class="others">
			<?php foreach($home->popularchamps as $k => $champ){ ?>
				<img opopular src="<?php echo $core->getFile($core->conf->url_version.'img/champion/'.$champ['keyname'].'.png','champion/square'); ?>" <?php echo "ref=\"$k\""; ?> >
			<?php } ?>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".section[popular] img[opopular]").click(function(){
					$ref = $(this).attr('ref');
					$(".section[popular] .featured-champ[ref!='"+$ref+"']").fadeOut(200);
					setTimeout(function(){
						$(".section[popular] .featured-champ[ref='"+$ref+"']").fadeIn(200);
					},210);
				});
			});
		</script>
	</div>




	<div class="section" best>
		<h1 href="?/champions/summary/winrate">Best Champions</h1>
		<div class="featured">
			<?php foreach($home->bestchamps as $k => $champ){ ?>
				<div href="?/champions/<?php echo $champ['keyname'];?>" class="featured-champ" <?php if($k!='0'){echo 'style="display:none;"';} echo "ref=\"$k\""; ?>>
					<div class="inner-info" style="margin-left:25px;margin-top:15px">
						<p>
							Overall Pick Rate<br>
							<big style="color:<?php echo $core->getPercentColor($champ['pickrate'],$home->generaldata['averagePickrate']); ?>"><?php echo $champ['pickrate']; ?>%</big><br>
							<small style="margin-top:-4px">Games: &nbsp;<b><?php echo number_format($champ['games']);?></b></small>
						</p>
						<p>
							Win Rate<br>
							<big style="color:<?php echo $core->getPercentColor($champ['winrate'],$home->generaldata['averageWinrate']); ?>"><?php echo $champ['winrate']; ?>%</big>
						</p>
					</div>
					<div class="inner-info" style="margin-left:25px;margin-top:175px">
						<p>
							<big>Champion KDA: &nbsp;<font color="<?php echo $core->getPercentColor($champ['kda'],'2'); ?>"><?php echo $champ['kda']; ?></font></big>
						</p>
						<p>
							<table>
								<tr><td width="50px"><small>Kills:</small></td><td><?php echo $champ['averageKills']; ?> &nbsp;<small>( <?php echo number_format($champ['kills']); ?> )</small></td></tr>
								<tr><td><small>Deaths:</small></td><td><?php echo $champ['averageDeaths']; ?> &nbsp;<small>( <?php echo number_format($champ['deaths']); ?> )</small></td></tr>
								<tr><td><small>Assists:</small></td><td><?php echo $champ['averageAssists']; ?> &nbsp;<small>( <?php echo number_format($champ['assists']); ?> )</small></td></tr>
								<tr><td><small>Minions:</small></td><td><?php echo $champ['averageMinions']; ?> &nbsp;<small>( <?php echo number_format($champ['minions']); ?> )</small></td></tr>
								<tr><td><small>Gold:</small></td><td><?php echo number_format($champ['averageGold']); ?> &nbsp;<small>( <?php echo number_format($champ['gold']); ?> )</small></td></tr>
							</table><br>
							<small>Data analized: &nbsp;<b><?php echo number_format('549470');?></b></small>
						</p>
					</div>
					<div class="name">
						<big><?php echo $champ['fullname']; ?></big><br>
						<?php echo $champ['title']; ?>
					</div>
					<img src="<?php echo $core->getFile($core->conf->url_cdn.'img/champion/splash/'.$champ['keyname'].'_0.jpg','champion/splashart'); ?>" >
				</div>
			<?php } ?>
		</div>
		<div class="others">
			<?php foreach($home->bestchamps as $k => $champ){ ?>
				<img obest src="<?php echo $core->getFile($core->conf->url_version.'img/champion/'.$champ['keyname'].'.png','champion/square'); ?>" <?php echo "ref=\"$k\""; ?> >
			<?php } ?>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".section[best] img[obest]").click(function(){
					$ref = $(this).attr('ref');
					$(".section[best] .featured-champ[ref!='"+$ref+"']").fadeOut(200);
					setTimeout(function(){
						$(".section[best] .featured-champ[ref='"+$ref+"']").fadeIn(200);
					},210);
				});
			});
		</script>
	</div>



	<style type="text/css">
		.featured-item {
			cursor: pointer;
			background-color: rgba(50,50,50,0.2);
			margin-top: 5px;
			display: inline-block;
			font-family: sans-serif;
			width:100%;
			font-size: 14px;
			margin-bottom: -4px;
		}
		.featured-item img{
			width:80px !important;
			float:left;
			margin: 20px;
		}
		.featured-item h1 {	
			margin:0px;
			padding: 0px;
			font-size: 18px;
		}
		.featured-item p {
			padding: 0px;
			margin: 0px;
		}
	</style>

	<div class="section" items>
		<h1>Most Picked Items</h1>
		<div class="others" items>
			<?php foreach($home->popularitems as $k => $item){ ?>
				<img item src="<?php echo $core->getFile($core->conf->url_version.'img/item/'.$item['id'].'.png','item'); ?>" <?php echo "ref=\"$k\""; ?> >
			<?php } foreach($home->popularitems as $k => $item){ ?>
				<table class="featured-item" <?php echo 'style="display:none;" ' . " ref=\"$k\""; ?> >
					<tr>
						<td width="88px">
							<img src="<?php echo $core->getFile($core->conf->url_version.'img/item/'.$item['id'].'.png','item'); ?>" <?php echo "ref=\"$k\""; ?> >
						</td>
						<td width="250px">
							<h1><?php echo $item['name']; ?></h1>
							<small><?php echo $item['plaintext']; ?></small><br><br>
							<h1><small style="opacity:0.9 !important">Pick Rate:</small><small>  &nbsp;<?php echo $item['pickrate']; ?>% </small></h1>
						<small><?php echo number_format($item['count']); ?> times used.</small><br>	
						</td>
						<td style="padding: 10px 20px;font-size:12px">
							<big>Description</big><br>
							<small><?php echo $item['description']; ?></small>
						</td>
					</tr>
				</table>
			<?php } ?>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".featured-item:first").slideDown();

				$(".section[items] img[item]").click(function(){
					$ref = $(this).attr('ref');
					$h = $(".section[items] .others").height()+'px';
					$(".section[items] .others").css('height',$h);
					$(".section[items] .featured-item[ref!='"+$ref+"']").fadeOut(200);
					setTimeout(function(){
						$(".section[items] .featured-item[ref='"+$ref+"']").fadeIn(200);
						$(".section[items] .others").css('height','auto');
					},210);
				});
			});
		</script>
	</div>
</div>


<style type="text/css">
	#home-summary {width: 100%;font-size: 14px}
	#home-summary img {width: 50px;}
	#home-summary td {margin:0px;line-height: 12px;}
	tr[class='0'] {background-color: rgba(200,200,200,0.3);}
	tr[class='1'] {background-color: rgba(100,100,100,0.3);}
	.table-title {height:50px;border-top:#222 2px solid;font-weight: bold}
	.table-title th[sort]{cursor: pointer;}
	#home-summary tr[href]{cursor: pointer;}
	#home-summary th {background-color: rgba(90,0,0,0.2);background-repeat: no-repeat;background-position: bottom center;}
	#home-summary th.headerSortDown {background-color: rgba(90,0,0,0.5);background-image: url(images/sortdown.png);}
	#home-summary th.headerSortUp {background-color: rgba(90,0,0,0.5);background-image: url(images/sortup.png);}
	#home-summary img[borded] {border:rgba(20,20,20,0.7) 5px solid;width:40px;}
</style>

<div class="section" style="width:1200px;float:left;" id="Summary">
	<h1 href="?/champions/summary">Summary</h1>
	<table id="home-summary" class="tablesorter">
		<thead>
			<tr class="table-title">
				<th width="50px"></th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/keyname'; ?>" width="160px" class="headerSortDown">Name</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/pickrate'; ?>"  width="90px">Pick Rate</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/winrate'; ?>"  width="90px">Win Rate</th>
				<th colspan="2" style="font-size:11px">Most Picked Spells</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/kda'; ?>">KDA</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageKills'; ?>"  width="45px" style="font-size:11px">Kills</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageDeaths'; ?>"  width="45px" style="font-size:11px">Deaths</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageAssists'; ?>"  width="45px" style="font-size:11px">Assists</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageMinions'; ?>"  width="55px" style="font-size:11px">Minions</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageGold'; ?>"  width="65px" style="font-size:11px">>Gold</th>
				<th colspan="6">Most Picked Items</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($home->summary as $champ) { ?>
				<tr  href="?/champions/<?php echo $champ['keyname'];?>">
					<td><img src="<?php echo $core->getFile($core->conf->url_version.'img/champion/'.$champ['keyname'].'.png','champion/square'); ?>" ></td>
					<td class="table-name"><?php echo $champ['fullname']; ?></td>
					<td <?php if(isset($champ['pickrate'])) { echo 'style="color:'.$core->getPercentColor($champ['pickrate'],$home->generaldata['averagePickrate']).'">'.$champ['pickrate'].'%<br><small style="font-size:11px">( '.number_format($champ['games']).' Games )</small>'; } else echo '>???<br><small style="font-size:11px">( ??? Games )</small>'; ?></td>
					<td <?php if(isset($champ['winrate'])) { echo 'style="color:'.$core->getPercentColor($champ['winrate'],$home->generaldata['averageWinrate']).'">'.$champ['winrate'].'%<br><small style="font-size:11px">( '.number_format($champ['wins']).' Wins )</small>'; } else echo '>???<br><small style="font-size:11px">( ??? Wins )</small>'; ?></td>
					<?php foreach ($champ['summonerSpells'] as $spell){ ?>
						<td width="50px" title="<?php echo $spell['name'].' - '.$spell['pickrate'].'% Pick Rate'; ?>"><img borded src="<?php echo $core->getFile($core->conf->url_version.'img/spell/'.$spell['reference'].'.png','summonerspells'); ?>"></td>
					<?php } ?>
					<?php if(empty($champ['summonerSpells'])){?>
						<td width="50px">???</td>
						<td width="50px">???</td>
					<?php } ?>
					<td <?php if(isset($champ['kda'])) { echo 'style="color:'.$core->getPercentColor($champ['kda'],'2').'">'.$champ['kda']; } else echo '>???'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageKills'])) { echo $champ['averageKills']."<br><small>( ".number_format($champ['kills'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageDeaths'])) { echo $champ['averageDeaths']."<br><small>( ".number_format($champ['deaths'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageAssists'])) { echo $champ['averageAssists']."<br><small>( ".number_format($champ['assists'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageMinions'])) { echo $champ['averageMinions']."<br><small>( ".number_format($champ['minions'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageGold'])) { echo number_format($champ['averageGold'])."<br><small>( ".number_format($champ['gold'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<?php foreach ($champ['items'] as $item) { ?>
						<td width="50px" title="<?php echo $item['name']; ?>"><img <?php echo $item['id']; ?> borded src="<?php echo $core->getFile($core->conf->url_version.'img/item/'.$item['id'].'.png','item'); ?>"></td>
					<?php } ?>
					<?php if(empty($champ['items'])){?>
						<td width="50px">???</td>
						<td width="50px">???</td>
						<td width="50px">???</td>
						<td width="50px">???</td>
						<td width="50px">???</td>
						<td width="50px">???</td>
					<?php } ?>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<script type="text/javascript" src="js/tablesorter.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			colortable('home-summary');
			$("#home-summary tbody tr").change(function(){
				alert("CHANGE!");
			});

			$("th").click(function(){
				setTimeout(function(){
					colortable('home-summary');
				},10);
			});

			function colortable($id){
				$("#"+$id+" tbody tr").removeAttr('class');
				$i='0'; 
				$("#"+$id+" tbody tr").each(function(){
					$(this).attr('class',$i);
					switch($i){
						case '0':
							$i='1';
							break;
						case '1':
							$i='0';
							break;
					}
				});
			}

			$("#home-summary").tablesorter({
				// pass the headers argument and assing a object
				headers: {
					// assign the secound column (we start counting zero)
					0: {sorter: false},
					2: {sorter: false},
					4: {sorter: false},
					8: {sorter: false},
					9: {sorter: false},
					10: {sorter: false},
					11: {sorter: false}
				}
			}); 
		}); 
	</script>
	<!-- script type="text/javascript">
		$("td[href]").click(function(){
			$href= $(this).attr('href');
			window.location.href=$href;
		});
	</script -->
</div>
