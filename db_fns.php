<?php
function db_connect()
{
	$result = new mysqli('localhost', 'root','','book_sc');
	if (!$result)
		return false;
	return $result;
}

function db_result_to_array($result)
{
	$res_array = array();
	
	for ($count = 0; $row = $result->fetch_assoc(); count++)
		$res_array[$count] = $row;
	
	return $res_array;
}
?>