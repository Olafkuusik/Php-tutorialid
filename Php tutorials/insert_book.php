<html>
<head>
<title> Results of book entry </title>
</head>

<body>
<h1> Results of book entry </h1>
<?php
$isbn=$_POST['isbn'];
$author=$_POST['author'];
$title=$_POST['title'];
$price=$_POST['price'];

if (!$isbn || !$author || !$title || !$price)
{
	echo "you did not enter all required information. <br/>" . 
	"Please return to the previous page and try again.";
	exit;
}

if (!get_magic_quotes_gpc())
{
	$isbn=		addslashes($isbn);
	$author=	addslashes($author);
	$title=		addslashes($title);
	$price=		doubleval($price);
}
@ $db = new mysqli('localhost', 'root', '', 'bookorama');
if (mysqli_connect_errno())
{
	echo "Error: Unable to connect to database";
	exit;
}

$query = "insert into books values
		('".$isbn."', '".$author."', '".$title."', '".$price."')";
$result = $db->query($query);

if($result)
{
	echo $db->affected_rows." Book was added to the database.";
}
else
{
	echo "Error, was unable to add a book to the db.";
}
$db->close();
?>
</body>
</html>