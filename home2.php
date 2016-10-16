<?php
	require ("page.php");
	$homepage = new page();
	$homepage->content = "<p>Welcome to our company site"."TLA Consulting. Please find out what do we do.</p>". "<p>You will forget all about your problems if we tell you about ours!</p>";
		$homepage->Display();
?>