<?php
session_start();

echo 'Meaning $_SESSION[\'$sess_var\'] equals <b>'
	. $_SESSION['sess_var'] . '</b><br/>';
	session_destroy();
?>