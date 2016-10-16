<html>
<head>
	<title>Information about the file/title>
</head>
<body>
<h1>Information about the file</h1>
<?php

	$current_dir = 'uploads';
	$file = basename($current_dir);
	
	echo '<h1>Information about the file: '.$file.'</h1>';
	echo '<h2>Data about the file</h2>';
	echo 'Last viewing: '.date('j F Y H:i', fileatime($file)).'<br />';
	echo 'Last modification: '.date('j F Y H:i', filemtime($file)).'<br />';
	
	$user = posix_geteuid(fileowner($file));
	echo 'File owner: '.$user['name'].'<br />';
	
	$user = posix_getgrid(filegroup($file));
	echo 'File group: '.$group['name'].'<br />';
	
	echo 'File access: '.decoct(fileperms($file)).'<br />';
	
	echo 'Type of file: '.filetype($file).'<br />';
	
	echo 'File size: '.filesize($file).' B <br />';
	
	echo '<h2>Flags of file</h2>';
	
	echo 'Folder: '.(is_dir($file)? 'Yes' : 'No').'<br />';
	echo 'Is executable: '.(is_executable($file)? 'Yes' : 'No').'<br />';
	echo 'File: '.(is_file($file)? 'Yes' : 'No').'<br />';
	echo 'Link: '.(is_link($file)? 'Yes' : 'No').'<br />';
	echo 'Readable: '.(is_readable($file)? 'Yes' : 'No').'<br />';
	echo 'Writable: '.(is_writable($file)? 'Yes' : 'No').'<br />';
	
?>
</body>
</html>
