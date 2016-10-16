<html>
<head>
	<title>Loading...</title>
</head>
<body>
<h1>Loading file...</h1>

<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	if ($_FILES['userfile']['error'] > 0) 
	{
		echo 'Problem: ';
		switch ($_FILES['userfile']['error']) 
		{
			case 1: echo 'File size is larger than upload_max_filesize';
				break;
			case 2: echo 'File size is larger than max_file_size';
				break;
			case 3: echo 'File was uploaded only partially';
				break;
			case 4: echo 'File not loaded';
				break;
			case 6: echo 'Unable to upload: No temporary catalog';
				break;
			case 7: echo 'Unable to save to disk';
				break;
		}
		exit;
	}
	if ($_FILES['userfile']['type'] != 'text/plain') 
	{
		echo 'Problem: File is not textfile';
		exit;
	}
	$upfile = '\\uploads\\'.$_FILES['userfile']['name'];
	echo $upfile;
	if (is_uploaded_file($_FILES['userfile']['tmp_name'])) 
	{
		if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $DOCUMENT_ROOT)) 
		{
			echo 'Problem: Cannot move file to directed folder';
			exit;
		}
	}
	else {
		echo 'Problem: Possible attack from file uplod. File: ';
		echo $_FILES['userfile']['name'];
		exit;
	}
	echo 'File uploaded succesfully.<br /><br />';
	$contents = file_get_contents($upfile);
	$contents = strip_tags($contents);
	file_put_contents($_FILES['userfile']['name'], $contents);
	echo 'Preview of the uploaded file: <br /><hr />';
	echo nl2br($contents);
	echo '<br /><hr />';
?>
</body>
</html>