<html>
<head>
 <title>Book shop - search results</title>
</head>

<body>
	<h1>Book shop - search results</h1>
<?php
	$searchtype = $_POST['searchtype'];
	$searchterm = trim($_POST['searchterm']);
	if (!$searchtype || !$searchterm)
		{
		echo 'You did not enter search parameters. Please return' . 
		' to the previous page and try a new search.';
		exit;
		}
	if (!get_magic_quotes_gpc())
		{
		$searchtype = addslashes($searchtype);
		$searchterm = addslashes($searchterm);
		}
@ $db= new mysqli('localhost', 'root', '', 'bookorama');
$errn= mysqli_connect_errno();
if (mysqli_connect_errno())
	{
		echo 'Error: Unable to establish connection' .
		' with database. Please try again later.';
		exit;
	}

	$query = "select * from books where ".$searchtype." like '%".$searchterm."%'";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	echo "<p> Found book/s ".$num_results."</p>";
	
	for ($i = 0; $i < $num_results; $i++)
	{
		$row = $result->fetch_assoc();
		echo "<p><strong>".($i+1).". Name: ";
		echo htmlspecialchars (stripslashes($row['title']));
		echo "</strong><br/>Author: ";
		echo stripslashes($row['author']);
		echo "<br/>ISBN: ";
		echo stripslashes($row['isbn']);
		echo "<br/>Price: ";
		echo stripslashes($row['price']);
		echo "</p>";
	}

	$result->free();
	$db->close();
?>
</body>
</html>

	