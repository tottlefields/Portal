<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

/* Database config */

$db_host	= 'localhost';
$db_user	= 'root';
$db_pass	= '';
$db_name	= 'portal_db'; 

/* End config */

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die('Unable to establish a DB connection');
mysqli_query($link, "SET names UTF8");

function showerror($sql = ''){
	if ($sql != ''){
		echo $sql."\n";
	}
	die("Error " . mysqli_errno() . " : " . mysqli_error());
}

?>

