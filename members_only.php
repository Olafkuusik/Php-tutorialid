<?php
session_start();

echo '<h1>Only for registered members</h1>';

if (isset($_SESSION['valid_user']))
{
	echo '<p>You entered as '.$_SESSION['valid_user'].'</p>';
	echo '<p>The content is for the registered members only.'</p>';
}
else
{
	echo '<p>You did not enter the system.</p>';
	echo '<p>This page is not available for you.</p>';
}
	echo '<a href="authmain.php">To the main page</a>';
?>