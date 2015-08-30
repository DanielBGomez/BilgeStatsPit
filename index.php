<?php 
require('core/functions.php');
switch ($core->url[2]) {
	case 'update':
		break;
	default:
		require('index/index.php');
		break;
}
?>