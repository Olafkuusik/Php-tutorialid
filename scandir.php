<html>
<head>
	<title>Scan Directory</title>
</head>
<body>
<h1>Table of contents</h1>
<?php

	$dir = 'uploads';
	$files1 = scandir($dir);
	$files2 = scandir($dir, 1);
	
	echo "<p>Folder to load: $dir</p>";
	echo '<p>Contents of the folder in alphabetic order:</p><ul>';
	
	foreach ($files1 as $file)
	{
		if ($file != "." && $file != "..")
		{
			echo "<li>$file</li>";
		}
	}

	echo '</ul>';
	
	echo "<p>Folder to load: $dir</p>";
	echo '<p>Contents of the folder backwards in alphabetic order:</p><ul>';
	
		foreach ($files2 as $file)
	{
		if ($file != "." && $file != "..")
		{
			echo "<li>$file</li>";
		}
	}
	
	echo '</ul>';
	
?>
</body>
</html>
