<?php
if(!isset($core)){
	header('Location: ../');
}
?>


<style type="text/css">
	#summary {width: 100%;font-size: 14px}
	#summary img {width: 50px;}
	#summary td {margin:0px;line-height: 12px;}
	tr[class='0'] {background-color: rgba(200,200,200,0.3);}
	tr[class='1'] {background-color: rgba(100,100,100,0.3);}
	.table-title {height:50px;border-top:#222 2px solid;font-weight: bold}
	.table-title th[href]{cursor: pointer;}
	#summary tr[href]{cursor: pointer;}
	#summary th {background-color: rgba(90,0,0,0.2);background-repeat: no-repeat;background-position: bottom center;}
	#summary th.headerSortDown {background-color: rgba(90,0,0,0.5);background-image: url(images/sortdown.png);}
	#summary th.headerSortUp {background-color: rgba(90,0,0,0.5);background-image: url(images/sortup.png);}
	#summary img[borded] {border:rgba(20,20,20,0.7) 5px solid;width:40px;}
</style>

<div class="section" style="width:1200px;float:left;" id="Summary">
	<h1>Summary</h1>
	<table id="summary" class="tablesorter">
		<thead>
			<tr class="table-title">
				<th width="50px"></th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/keyname'; ?>" width="160px" <?php if($champions->ssort=='keyname'){ echo 'class="headerSortDown"'; } ?> >Name</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/pickrate'; ?>"  width="90px" <?php if($champions->ssort=='pickrate'){ echo 'class="headerSortDown"'; } ?>>Pick Rate</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/winrate'; ?>"  width="90px" <?php if($champions->ssort=='winrate'){ echo 'class="headerSortDown"'; } ?>>Win Rate</th>
				<th colspan="2" style="font-size:11px">Most Picked Spells</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/kda'; ?>"  <?php if($champions->ssort=='kda'){ echo 'class="headerSortDown"'; } ?> >KDA</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageKills'; ?>"  width="45px" style="font-size:11px" <?php if($champions->ssort=='averageKills'){ echo 'class="headerSortDown"'; } ?>>Kills</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageDeaths'; ?>"  width="45px" style="font-size:11px" <?php if($champions->ssort=='averageDeaths'){ echo 'class="headerSortDown"'; } ?>>Deaths</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageAssists'; ?>"  width="45px" style="font-size:11px" <?php if($champions->ssort=='averageAssists'){ echo 'class="headerSortDown"'; } ?>>Assists</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageMinions'; ?>"  width="55px" style="font-size:11px" <?php if($champions->ssort=='averageMinions'){ echo 'class="headerSortDown"'; } ?>>Minions</th>
				<th href="<?php echo $core->conf->http_url.'?/champions/summary/averageGold'; ?>"  width="65px" style="font-size:11px" <?php if($champions->ssort=='averageGold'){ echo 'class="headerSortDown"'; } ?>>Gold</th>
				<th colspan="6">Most Picked Items</th>
			</tr>
		</thead>
		<tbody>
			<?php $i='1'; ?>
			<?php foreach ($champions->summary as $champ) { $i=($i=='0') ? '1' : '0';?>
				<tr class="<?php echo $i; ?>" href="?/champions/<?php echo $champ['keyname'];?>">
					<td><img src="<?php echo $core->getFile($core->conf->url_version.'img/champion/'.$champ['keyname'].'.png','champion/square'); ?>" ></td>
					<td class="table-name"><?php echo $champ['fullname']; ?></td>
					<td <?php if(isset($champ['pickrate'])) { echo 'style="color:'.$core->getPercentColor($champ['pickrate'],$champions->generaldata['averagePickrate']).'">'.$champ['pickrate'].'%<br><small style="font-size:11px">( '.number_format($champ['games']).' Games )</small>'; } else echo '>???<br><small style="font-size:11px">( ??? Games )</small>'; ?></td>
					<td <?php if(isset($champ['winrate'])) { echo 'style="color:'.$core->getPercentColor($champ['winrate'],$champions->generaldata['averageWinrate']).'">'.$champ['winrate'].'%<br><small style="font-size:11px">( '.number_format($champ['wins']).' Wins )</small>'; } else echo '>???<br><small style="font-size:11px">( ??? Wins )</small>'; ?></td>
					<?php $a=1; foreach ($champ['summonerSpells'] as $spell){ ?>
						<?php if($a>2){break;} $a++?>
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
					<?php $a=1;foreach ($champ['items'] as $item) { ?>
						<?php if($a>6){break;} $a++?>
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
			<?php  } ?>
		</tbody>
	</table>

	<!-- script type="text/javascript">
		$("td[href]").click(function(){
			$href= $(this).attr('href');
			window.location.href=$href;
		});
	</script -->
</div>
