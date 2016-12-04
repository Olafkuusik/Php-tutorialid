<?php

echo "\n<!-- Start of dump of variables -->\n\n";

echo "<!-- Start of variables GET -->\n";
echo '<!-- '.dump_array($HTTP_GET_VARS)." -->\n";

echo "<!-- Start of variables POST-->\n";
echo '<!-- '.dump_array($HTTP_POST_VARS)." -->\n";

echo "<!-- Start of variables SESSION-->\n";
echo '<!-- '.dump_array($HTTP_SESSION_VARS)." -->\n";

echo "<!-- Start of variables COOKIES-->\n";
echo '<!-- '.dump_array($HTTP_COOKIE_VARS)." -->\n";

echo "<n!-- End of variable dump-->\n";

function dump_array($array)
{
	if(is_array($array))
	{
	$size = count($array);
	$string = "";
	if($size)
	{
	$count = 0;
	$string .= "{ ";
	
	foreach($array as $var => $value)
	{
	$string .= $var." = ".$value;
	if($count++ < ($size-1))
	{
	$string .= ", ";
	}
	}
	$string .= " }";
	}
	return $string;
	}
	else 
	{
	return array;
	}
}
?>