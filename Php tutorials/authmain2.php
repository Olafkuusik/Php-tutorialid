<?php
session_start();
if (isset($_POST['userid']) && isset($_POST['password']))
	{
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$db_conn = new mysqli('localhost', 'root', '', 'auth');
		if (mysqli_connect_errno()) //If there is no errors then true
			{
			echo 'Unable to connect to database: '.mysqli_connect_error();
			exit();
			}
		$query = 	'select * from authorized_users ' .
					"where name='$userid' " .
					" and password=sha1('$password')";
		$result = $db_conn->query($query);
		if ($result->num_rows > 0)
			{
				$_SESSION['valid_user'] = $userid;
			}
		$db_conn->close();
	}
?>
<html>
<body>
<h1>Homepage</h1>
<?
	if (isset($_SESSION['valid_user']))
		{
			echo "'You entered as '".$_SESSION['valid_user']."'<br/>'";
			echo '<a href=logout.php">Exit</a><br/>';
		}
		else
		{
			if (isset($userid)) 
			{
				echo 'unable to enter.<br/><br/>';
			}
			else
			{
				echo 'You have not entered the system.<br/><br/>';
			}
			echo '<form method="post" action="authmain.php"><table>';
			echo '<tr><td>Name:</td>';
			echo '<td>input type="text" name="userid"></td></tr>';
			echo '<tr><td>Password:</td>';
			echo '<td>input type="text" name="password"></td></tr>';
			echo '<tr><td colspan="2" align="center">';
			echo '<input type="submit" value="Enter"></td></tr>';
			echo '</table></form>';
		}
?>
<br/>
<a href="members_only.php">Members only area</a>
</body>
</html>