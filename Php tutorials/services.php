<?php
	require ("page.inc");
	class ServicesPage extends Page 
	{
		private $row2buttons = array
		(
			"Reengeneering" => "reengineering.php",
			"Standards" => "standards.php",
			"Diction training" => "buzzword.php",
			"Our target" => "mission.php"
		);
		function Display() 
		{
			echo "<html>\n<head>\n";
			$this -> DisplayTitle();
			$this -> DisplayKeywords();
			$this -> DisplayStyles();
			echo "<head>\n<body\n";
			$this -> DisplayHeader();
			$this -> DisplayMenu($this->buttons);
			$this -> DisplayHeader($this->row2buttons);
			echo $this->content;
			$this -> DisplayFooter();
			echo "</body>\n</html\n";
		}
	}
	$services = new ServicesPage();
	$services -> content = "<p>" .
		"Company Convulsing offers many different services, " .
		"if you like we can reengineer your loans.</p>";
	$services->Display();
?>