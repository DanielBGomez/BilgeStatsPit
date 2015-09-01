<!DOCTYPE html>
<html>
<head>
<title><?php if(isset($core->title)) { echo $core->title; } ?>Bilge Stats Pit</title>
<link rel="stylesheet" href="<?php echo $core->conf->http_url; ?>css/style.css?update=<?php echo date("YmdHis.",filemtime($core->conf->disc_url."css/style.css")); ?>" type="text/css" media="screen">
<link rel="shortcut icon" href="images/favicon.png">
<script src="js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("[href]").click(function(){
			if($(this).prop("tagName")!='A') {
				$url=$(this).attr('href');
				window.location.href=$url;	
			};
		});
	});
</script>
</head>
<body>

<div id="page">

<div id="header">
	<table id="navegation">
		<tr>
			<td width="110px"><a href="<?php echo $core->conf->http_url; ?>"><img id="logo" src="<?php echo $core->conf->http_url;?>images/logo.png" height="150px" ></td>
			<td><a href="<?php echo $core->conf->http_url; ?>">Home</a></td>
			<td><a href="<?php echo $core->conf->http_url; ?>?/champions">Champions</a></td>
			<td><a href="https://github.com/DanielBGomez/BilgeStatsPit/blob/master/README.md" target="_BLANK">About</a></td>
		</tr>
	</table>
</div>