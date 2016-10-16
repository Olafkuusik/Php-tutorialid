<html>
<head>
	<title>Autovaruosade kaupluse tellimuse tulemused </title>
</head>
<?php
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
?>
<body>
<h1> Autovaruosade kaupluse </h1>
<h2> Tellimuse tulemused </h2>
<?php
	echo "<p>Tellimus on töödeldud " .date('H:i,jS F Y')."</p>";
$totalqty = 0;
$totalqty = $tireqty + $oilqty + $sparkqty;
echo "Tooteid telliti: " .$totalqty."<br/>'";
$totalamount = 0.00;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);

$totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
echo "Kokku: $" .number_format($totalamount, 2)."<br />";
$taxrate = 0.10;
$totalamount = $totalamount * (1 + $taxrate);
echo "Kokku, käibemaks müügilt: $" .number_format($totalamount, 2)."<br />";
?>
</body>
</html>