<?php
session_start();

$_SESSION['sess_var'] = "Welcome to our site!";
//echo $_SESSION['sess_var'];
echo 'Meaning $_SESSION[\'$sess_var\'] equals <b>'
	. $_SESSION['sess_var'] . '</b><br/>';
?>
<a href="page2.php">To the next page</a>