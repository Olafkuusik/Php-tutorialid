<?php
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
	<title>Autovaruosade kauplus - klientide tellimused</title>
</head>
<body>
<h1>Autovaruosade kauplus</h1>
<h2>Klientide tellimused</h2>

<?php

	@ $fp= fopen("$DOCUMENT_ROOT/../orders/orders.txt", 'rb');
	if (!$fp) {
		echo "<p><strong>Pole toodeldud tellimusi. Palun vaadake hiljem uuesti.</strong></p>";
		exit;
	}
	while (!feof($fp)) {
		$order= fgets($fp, 999);
		echo $order."<br />";
	}

	echo 'Lopppunkt failis on: '.(ftell($fp));
	echo '<br />';
	rewind($fp);
	echo 'Positsioon parast funktsiooni rewind(): ' .(ftell($fp));
	echo '<br />';

	fclose($fp);

?>
</body>
</html>