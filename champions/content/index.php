<?php
if(!isset($core)){
	header('Location: ../');
}
?>

<style type="text/css">
	.featured {height: 640px;overflow: hidden;}
	.featured img {max-width: 1200px;width:1200px;margin: 0px;margin-top:-20px;}
	#content {display: inline-block;margin:0px auto;}
	#content img[championface] {width: 75px;cursor:pointer;border:rgba(0,0,0,0.7) 3px solid;margin:0px;}
    #content img[championface][selected] {border:rgba(221,221,68,0.4) 3px solid;box-shadow: rgb(221,221,68)}
    #content img[championface]:hover {opacity: 0.8;box-shadow: 0px 0px 10px #000}
	.name {width: 532px;
    float: right;
    padding: 0px 50px;
    margin-top: 532px;
    margin-left: 567px;
    position: absolute;
    text-align: right;
    font-size: 27px;}
    .items td {padding: 0px;width:44px;height: 48px;}
    .items img{width:40px;margin: 0px -1px; border:#222 3px solid;cursor: pointer;}
</style>

<?php if(isset($champions->champ)){ ?>
<div class="section" style="padding-bottom:40px">
	<h1 style="height:50px">&nbsp;</h1>
		<div class="featured">
			<div class="inner-info" style="margin-left:25px;margin-top:15px">
				<p>
					Overall Pick Rate<br>
					<big style="color:<?php if(isset($champions->champ['games'])) { echo $core->getPercentColor($champions->champ['pickrate'],$champions->generaldata['averagePickrate']); }?>"><?php if(isset($champions->champ['games'])) {  echo $champions->champ['pickrate']; } else echo "???"; ?>% <small> <?php if(isset($champions->champ['games'])){ echo '<small>'.addsigno($champions->champ['pickrate']-$champions->generaldata['averagePickrate']).'</small>'; } ?></small></big><br>
					<small style="margin-top:-4px">Games: &nbsp;<b><?php if(isset($champions->champ['games'])) { echo number_format($champions->champ['games']); } else { echo "????"; }?></b></small>
				</p>
				<p>
					Win Rate<br>
					<big style="color:<?php if(isset($champions->champ['games'])) { echo $core->getPercentColor($champions->champ['winrate'],$champions->generaldata['averageWinrate']); } ?>"><?php if(isset($champions->champ['games'])) {  echo $champions->champ['winrate']; } else { echo "???";} ?>% <small> <?php if(isset($champions->champ['games'])){ echo '<small>'.addsigno(round($champions->champ['winrate']-$champions->generaldata['averageWinrate'],2)).'</small>'; } ?></small></big>
				</p>
			</div>
			<div class="inner-info" style="margin-left: 25px;margin-top:175px">
				<table class="items" style="width:150px;">
					<tr><td colspan="10" style="text-align:center;height:40px"><big>Most Picked Summoner Spells</big></td></tr>
					<tr>
						<?php foreach ($champions->champ['summonerSpells'] as $spell){ ?>
							<td title="<?php echo $spell['name'].' - '.$spell['pickrate'].'% Pick Rate'; ?>"><img borded src="<?php echo $core->getFile($core->conf->url_version.'img/spell/'.$spell['reference'].'.png','summonerspells'); ?>"></td>
						<?php } ?>
						<?php if(empty($champions->champ['summonerSpells'])){?>
							<td>???</td>
							<td>???</td>
							<td>???</td>
						<?php } ?>
					</tr>
				</table>
			</div>
			<div class="inner-info" style="margin-left:25px;margin-top:310px">
				<p>
					<big>Champion KDA: &nbsp;<font color="<?php if(isset($champions->champ['games'])) { echo $core->getPercentColor($champions->champ['kda'],'2');} ?>"><?php if(isset($champions->champ['games'])) { echo $champions->champ['kda'];} else { echo "???";}?> <small><?php if(isset($champions->champ['games'])){ echo '<small>'.addsigno($champions->champ['kda']-$champions->generaldata['averageKda']).'</small>'; } ?></small></font></big>
				</p>
				<p>
					<table>
						<tr><td width="50px"><small>Kills:</small></td><td style="color:<?php if(isset($champions->champ['games'])) { echo $core->getPercentColor($champions->champ['averageKills'],$champions->generaldata['averageKills']); } ?>"><?php if(isset($champions->champ['games'])) { echo $champions->champ['averageKills'];} else {echo "???";} ?> &nbsp;<small>( <?php if(isset($champions->champ['games'])) { echo number_format($champions->champ['kills']); } else { echo "???";} ?> ) <?php if(isset($champions->champ['games'])){ echo '<small>'.addsigno($champions->champ['averageKills']-$champions->generaldata['averageKills']).'</small>'; } ?></small></td></tr>
						<tr><td><small>Deaths:</small></td><td style="color:<?php if(isset($champions->champ['games'])) { echo $core->getPercentColor($champions->champ['averageDeaths'],$champions->generaldata['averageDeaths']); } ?>"><?php if(isset($champions->champ['games'])) { echo $champions->champ['averageDeaths'];} else {echo "???";} ?> &nbsp;<small>( <?php if(isset($champions->champ['games'])) { echo number_format($champions->champ['deaths']);} else {echo "???";} ?> ) <?php if(isset($champions->champ['games'])){ echo '<small>'.addsigno($champions->champ['averageDeaths']-$champions->generaldata['averageDeaths']).'</small>'; } ?></small></td></tr>
						<tr><td><small>Assists:</small></td><td style="color:<?php if(isset($champions->champ['games'])) { echo $core->getPercentColor($champions->champ['averageAssists'],$champions->generaldata['averageAssists']); } ?>"><?php if(isset($champions->champ['games'])) { echo $champions->champ['averageAssists'];} else {echo "???";} ?> &nbsp;<small>( <?php if(isset($champions->champ['games'])) { echo number_format($champions->champ['assists']);} else {echo "???";} ?> ) <?php if(isset($champions->champ['games'])){ echo '<small>'.addsigno($champions->champ['averageAssists']-$champions->generaldata['averageAssists']).'</small>'; } ?></small></td></tr>
						<tr><td><small>Minions:</small></td><td style="color:<?php if(isset($champions->champ['games'])) { echo $core->getPercentColor($champions->champ['averageMinions'],$champions->generaldata['averageMinions']); } ?>"><?php if(isset($champions->champ['games'])) { echo $champions->champ['averageMinions'];} else {echo "???";} ?> &nbsp;<small>( <?php if(isset($champions->champ['games'])) { echo number_format($champions->champ['minions']);} else {echo "???";} ?> ) <?php if(isset($champions->champ['games'])){ echo '<small>'.addsigno($champions->champ['averageMinions']-$champions->generaldata['averageMinions']).'</small>'; } ?></small></td></tr>
						<tr><td><small>Gold:</small></td><td style="color:<?php if(isset($champions->champ['games'])) { echo $core->getPercentColor($champions->champ['averageGold'],$champions->generaldata['averageGold']); } ?>"><?php if(isset($champions->champ['games'])) { echo number_format($champions->champ['averageGold']);} else {echo "???";} ?> &nbsp;<small>( <?php if(isset($champions->champ['games'])) { echo number_format($champions->champ['gold']);} else {echo "???";} ?> ) <?php if(isset($champions->champ['games'])){ echo '<small>'.addsigno($champions->champ['averageGold']-$champions->generaldata['averageGold']).'</small>'; } ?></small></td></tr>
					</table><br>
					<small>Data analized: &nbsp;<b><?php echo number_format('549470');?></b></small>
				</p>
			</div>
			<div class="inner-info" style="margin-left:25px;margin-top:510px;">
				<table class="items">
					<tr><td colspan="10" style="text-align:center;height:30px"><big>Most Picked Items</big></td></tr>
					<tr>
						<?php foreach ($champions->champ['items'] as $item) { ?>
							<td title="<?php echo $item['name']; ?>"><img <?php echo $item['id']; ?> src="<?php echo $core->getFile($core->conf->url_version.'img/item/'.$item['id'].'.png','item'); ?>"></td>
						<?php } ?>
						<?php if(empty($champions->champ['items'])){?>
							<td>???</td>
							<td>???</td>
							<td>???</td>
							<td>???</td>
							<td>???</td>
							<td>???</td>
							<td>???</td>
							<td>???</td>
							<td>???</td>
							<td>???</td>
						<?php } ?>
					</tr>
				</table>
			</div>
			<div class="name">
				<big><?php echo html_entity_decode($champions->champ['fullname']); ?></big><br>
				<?php echo html_entity_decode($champions->champ['title']); ?>
			</div>
			<img src="<?php echo $core->getFile($core->conf->url_cdn.'img/champion/splash/'.$champions->champ['keyname'].'_0.jpg','champion/splashart'); ?>" >
		</div>
</div>
<?php
	$keys = array_keys($champions->summary);
	$found = array_search($champions->champ['id'], $keys);
	$prev = ($found!='0') ? $core->conf->http_url.'?/champions/'.$champions->summary[$keys[$found-1]]['keyname'] : '';
	$next = ($found!=array_search(end($keys),$keys)) ? $core->conf->http_url.'?/champions/'.$champions->summary[$keys[$found+1]]['keyname'] : ''; 
?>
<script type="text/javascript">
	$("body").keydown(function(e) {
		$prev = "<?php echo $prev;?>";
		$next = "<?php echo $next;?>";
		if(e.keyCode == 37 && $prev!='') { // left
			window.location.href=$prev;
		}else if(e.keyCode == 39 && $next!='') { // right
			window.location.href=$next;
		}
	});
</script>
<?php } ?>

<div id="content">
	<?php foreach ($champions->summary as $champ) { ?>
		<img <?php if(isset($champions->champ)&&$champions->champ['keyname']==$champ['keyname']){echo 'selected'; } ?> championface href="<?php echo $core->conf->http_url.'?/champions/'.$champ['keyname'];?>" title="<?php echo $champ['fullname'];?>" src="<?php echo $core->getFile($core->conf->url_version.'img/champion/'.$champ['keyname'].'.png','champion/square'); ?>">
	<?php }
	 ?>
</div>