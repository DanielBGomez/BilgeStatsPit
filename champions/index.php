<?php
if(!isset($core)){
	header('Location: ../');
}

require('content/classes.php');
require('common/header.php');
switch ($champions->section) {
	case 'summary':
		require('content/summary.php');
		break;
	
	default:
		require('content/index.php');
		break;
}
require('common/footer.php');
?>