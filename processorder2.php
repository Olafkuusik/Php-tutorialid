<?php
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$address = $_POST['address'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$date = date('H:i, jS F Y');
?>
<html>
<head>
	<title>Autovaruosade kaupluse tellimuse tulemused </title>
</head>
<body>
<h1> Autovaruosade kaupluse </h1>
<h2> Tellimuse tulemused </h2>
<?php
	echo "<p>Tellimus on töödeldud " .$date."</p>";
$totalqty = 0;
$totalqty = $tireqty + $oilqty + $sparkqty;
echo "Tooteid telliti: " .$totalqty."<br/>";
if ($totalqty == 0) {
	echo "Te ei valinud tellimislehel ühtegi toodet! <br />";
}	else {
	if ($tireqty > 0) {
	echo $tireqty. " Velgesid <br />";
	}
	if ($oilqty > 0) {
	echo $tireqty. " olipudelit <br />";
	}
	if ($sparkqty > 0) {
	echo $tireqty. " syytekyynlaid <br />";
	}
}
define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);
$totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
$totalamount = number_format($totalamount, 2, '.', ' ');
echo "<p> Kokku: €" .$totalamount. "</p>";
echo "<p> Aadress kohale toimetamiseks: " .$address. "</p>";
$outputstring = $date . "\t" . $tireqty . " velgesid\t" . $oilqty. " olipudelit\t" . $sparkqty . " syytekyynlaid\t\$" . $totalamount . "\t" . $address . "\n";
@ $fp = fopen("$DOCUMENT_ROOT/../orders/orders.txt", 'ab');
if (!$fp) {
	echo "<p><strong>Antud hetkel ei onnestunud tellimust toodelda. " . "Palun proovige hiljem uuesti. </strong></p></body></html>";
	exit;	
}
	flock($fp, LOCK_EX);
	fwrite($fp, $outputstring, strlen($outputstring));
	flock($fp, LOCK_UN);
	fclose($fp);
	echo "<p>Tellimus salvestatud.</p>";
?>
</body>
</html>