<style type="text/css">
	body{
		background-image: url(images/back1.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-color: #080A09;
		background-size: 100%;
		margin:0px auto;
		text-align: center;
		font-family: sans-serif;
	}
	big {font-weight: bold;}
	small {opacity: 0.7;}
	#page {
		width: 1200px;
		margin:0px auto;
		text-align: center;
		display: inline-block;
	}

	.home-section {
		float:right;
		background-color: rgba(0,0,0,0.9);
		box-shadow: 0px 0px 40px rgba(20,20,20,0.9);
		width: 800px;
		margin:10px 0px;
	}
	.home-section h1 {
		cursor: pointer;
		padding:18px 0px;
		font-size: 18px;
		width: 100%;
		margin: 0px;
		color:#eee;
		text-shadow:1px 1px #777;
	}
	.featured {
		width: 100%;
		height: 370px;
		margin: 0px;
	}
	.featured-champ {
		cursor: pointer;
		margin:0px;
		height: 370px;
		overflow: hidden;
	}
	.featured img {
		max-width: 100%;
		margin: 0px;
		margin-top:-20px;
	}
	.others {
		font-family: serif;
		text-align: left;
		width:100%;
		margin:0px;
		padding:0px;
	}
	.others img {
		cursor: pointer;
		border-style: solid;
		border-width: 4px;
		border-color: rgba(0,0,0,0.9);
		margin-right: -4px;
		margin-bottom:-4px;
		width: 72px;
	}
	.others[items] img {width: 53px;}
	.others img:hover {border-color: rgba(50,50,50,0.7);}

	.inner-info {
		background-color: rgba(0,0,0,0.7 );
		position: absolute;
		padding: 10px 40px;
		display: inline-block;
		font-size: 13px;
		color:#eee;
		text-shadow: 1px 1px #555;
	}
	.inner-info p {
		margin:8px;
		padding: 0px;
		line-height: 18px;
	}
	.inner-info table {text-align: left;margin: 0px;padding: 0px;line-height: 12px;}
	.featured-champ .name {
		width: 740px;
		padding: 0px 30px;
		margin-top: 280px;
		position: absolute;
		text-align: right;
		font-size: 23px;
		color:#eee;
		text-shadow: 1px 1px #555;
	}
	#home-summary {text-shadow: 1px 1px #666;color: #eee;width: 100%;font-size: 14px}
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
</style>

<div id="page">

<div class="home-section" popular>
	<h1>Popular Champions</h1>
	<div class="featured">
		<?php foreach($home->popularchamps as $k => $champ){ ?>
			<div class="featured-champ" <?php if($k!='0'){echo 'style="display:none;"';} echo "ref=\"$k\""; ?>>
				<div class="inner-info" style="margin-left:25px;margin-top:15px">
					<p>
						Overall Pick Rate<br>
						<big><?php echo $champ['pickrate']; ?>%</big><br>
						<small style="margin-top:-4px">Games: &nbsp;<b><?php echo number_format($champ['games']);?></b></small>
					</p>
					<p>
						Win Rate<br>
						<big style="color:<?php echo $core->getPercentColor($champ['winrate'],'50%'); ?>"><?php echo $champ['winrate']; ?>%</big>
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
			$(".home-section[popular] img[opopular]").click(function(){
				$ref = $(this).attr('ref');
				$(".home-section[popular] .featured-champ[ref!='"+$ref+"']").fadeOut(200);
				setTimeout(function(){
					$(".home-section[popular] .featured-champ[ref='"+$ref+"']").fadeIn(200);
				},210);
			});
		});
	</script>
</div>




<div class="home-section" best>
	<h1>Best Champions</h1>
	<div class="featured">
		<?php foreach($home->bestchamps as $k => $champ){ ?>
			<div class="featured-champ" <?php if($k!='0'){echo 'style="display:none;"';} echo "ref=\"$k\""; ?>>
				<div class="inner-info" style="margin-left:25px;margin-top:15px">
					<p>
						Overall Pick Rate<br>
						<big><?php echo $champ['pickrate']; ?>%</big><br>
						<small style="margin-top:-4px">Games: &nbsp;<b><?php echo number_format($champ['games']);?></b></small>
					</p>
					<p>
						Win Rate<br>
						<big style="color:<?php echo $core->getPercentColor($champ['winrate'],'50%'); ?>"><?php echo $champ['winrate']; ?>%</big>
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
			$(".home-section[best] img[obest]").click(function(){
				$ref = $(this).attr('ref');
				$(".home-section[best] .featured-champ[ref!='"+$ref+"']").fadeOut(200);
				setTimeout(function(){
					$(".home-section[best] .featured-champ[ref='"+$ref+"']").fadeIn(200);
				},210);
			});
		});
	</script>
</div>



<style type="text/css">
	.featured-item {
		color: #eee;
		text-shadow: 1px 1px #555;
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

<div class="home-section" items>
	<h1>Popular Items</h1>
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

			$(".home-section[items] img[item]").click(function(){
				$ref = $(this).attr('ref');
				$h = $(".home-section[items] .others").height()+'px';
				$(".home-section[items] .others").css('height',$h);
				$(".home-section[items] .featured-item[ref!='"+$ref+"']").fadeOut(200);
				setTimeout(function(){
					$(".home-section[items] .featured-item[ref='"+$ref+"']").fadeIn(200);
					$(".home-section[items] .others").css('height','auto');
				},210);
			});
		});
	</script>
</div>




<div class="home-section" style="width:1200px">
	<h1>Summary</h1>
	<table id="home-summary" class="tablesorter">
		<thead>
			<tr class="table-title">
				<th width="50px"></th>
				<th sort width="160px" class="headerSortDown">Name</th>
				<th sort width="90px">Pick Rate</th>
				<th sort width="90px">Win Rate</th>
				<th sort width="90px">KDA</th>
				<th sort width="45px" style="font-size:11px">Kills</th>
				<th sort width="45px" style="font-size:11px">Deaths</th>
				<th sort width="45px" style="font-size:11px">Assists</th>
				<th sort width="55px" style="font-size:11px">Minions</th>
				<th sort width="65px" style="font-size:11px">Gold</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($home->summary as $champ) { ?>
				<tr href="">
					<td><img src="<?php echo $core->getFile($core->conf->url_version.'img/champion/'.$champ['keyname'].'.png','champion/square'); ?>" ></td>
					<td class="table-name"><?php echo $champ['fullname']; ?></td>
					<td><?php if(isset($champ['pickrate'])) { echo $champ['pickrate'].'%<br><small style="font-size:11px">( '.number_format($champ['games']).' Games )</small>'; } else echo '???<br><small style="font-size:11px">( ??? Games )</small>'; ?></td>
					<td <?php if(isset($champ['winrate'])) { echo 'style="color:'.$core->getPercentColor($champ['winrate'],'50').'">'.$champ['winrate'].'%<br><small style="font-size:11px">( '.number_format($champ['wins']).' Wins )</small>'; } else echo '>???<br><small style="font-size:11px">( ??? Wins )</small>'; ?></td>
					<td <?php if(isset($champ['kda'])) { echo 'style="color:'.$core->getPercentColor($champ['kda'],'2').'">'.$champ['kda']; } else echo '>???'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageKills'])) { echo $champ['averageKills']."<br><small>( ".number_format($champ['kills'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageDeaths'])) { echo $champ['averageDeaths']."<br><small>( ".number_format($champ['deaths'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageAssists'])) { echo $champ['averageAssists']."<br><small>( ".number_format($champ['assists'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageMinions'])) { echo $champ['averageMinions']."<br><small>( ".number_format($champ['minions'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td style="font-size:11px"><?php if(isset($champ['averageGold'])) { echo number_format($champ['averageGold'])."<br><small>( ".number_format($champ['gold'])." )</small>"; } else echo '???<br><small>( ??? )</small>'; ?></td>
					<td>
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
					0: {
						// disable it by setting the property sorter to false
						sorter: false
					}
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


</div>