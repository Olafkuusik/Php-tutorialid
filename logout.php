<?php
	session_start();
	
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION)['valid_user'];
	session_destroy();
?>

<html>
<body>
<h1>Logout</h1>
<?php
	if	(!empty($old_user))
	{
	echo 'logout succesful.<br/>';
	}
	else
	{
	echo 'You did not log in to the system, thus you cannot logout.<br/>';
	}
?>
<a href="authmain.php">To the main page</a>
</body>
</html>