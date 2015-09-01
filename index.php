<?php 
require('core/functions.php');
switch ($core->section) {
	case 'champions':
		require('champions/index.php');
		break;
	case 'items':
		require('items/index.php');
		break;
	case 'about':
		require('about/index.php');
		break;
	case 'update':
		break;
	default:
		require('index/index.php');
		break;
}
?>