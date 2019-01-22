<?php

$swabPrefix = 'CFT';

function create_order_row(){
	global $link, $swabPrefix;
	
	$insert = "INSERT INTO swab_data (ID) values (NULL)";	
	mysqli_query($link, $insert);
	$swab_id = mysqli_insert_id($link);
	
	$update = "UPDATE swab_data SET PortalID='$swabPrefix$swab_id' WHERE ID=$swab_id";
	mysqli_query($link, $update);
	
	return $swab_id;
}

function debug_array($array){
	echo '<pre>';
	print_r($array);	
	echo '</pre>';
}

?>