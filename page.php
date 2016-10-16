<?php
class Page 
{
	public $content;
	public $title= "Convulsing company LTD";
	public $keywords = Convulsing company, Real site, search engines are my best friends";
	public $buttons = array
	(
		"Home" => "home2.php",
		"Contact" => "contact.php",
		"Services" => "services.php",
		"Map of the site" => "map.php"
	);
	
	public function __set($name, $value)
	{
		$this->$name = $value;
	}
	public function Display() 
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
	
	public function DisplayTitle() 
	{
		echo "<title>".$this->title."</title>";
	}
	
?>