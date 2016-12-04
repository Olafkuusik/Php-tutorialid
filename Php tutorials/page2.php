<?php
session_start();

	echo 'Meaning $_SESSION[\'$sess_var\'] equals <b>'
		. $_SESSION['sess_var'] . '</b><br/>';
	unset($_SESSION['sess_var']);
?>
<a href="page3.php">To the next page</a>