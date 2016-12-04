<html>
<head>
	<title>Browse folders</title>
</head>
<body>
<h1>Table of contents</h1>
<?php
	$current_dir = dir("uploads");
	$file="a";
	
	echo "<p>Folder descriptor: $current_dir->handle</p>";
	echo "<p>Folder path: $current_dir->path</p>";
	echo '<p>Folder title:</p><ul>';
	
	
	while (false !== ($file->fread("$current_dir", "r")))
	{
		if ($file != "." && $file != "..")
		{
			echo "<li>$file</li>";
		}
	}
	echo '</ul>';
	//fclose("$current_dir");
	$current_dir->fclose();
?>
</body>
</html>
