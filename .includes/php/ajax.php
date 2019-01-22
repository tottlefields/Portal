<?php

define('INCLUDE_CHECK',true);
require_once 'connect.php';
require_once 'functions.php';

if (isset($_REQUEST['returned'])){
	$swab_id = $_REQUEST['swabID'];
	mysqli_query($link, "UPDATE swab_data SET returned=1 WHERE ID=".$swab_id);
	exit;
}

?>