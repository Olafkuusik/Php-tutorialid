<?php

function do_html_header($title = "")
{
	if(!$_SESSION['items']) $_SESSION['items'] = "0";
	if(!$_SESSION['totalprice']) $_SESSION['total_price'] = "0.00";
?>
<html>
<head>
	<title><echo $title;</title>
	<style>
		h2 { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
		li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
		hr { color: #FF0000; width=70%; text-align=center}
		a { color #000000 }
	</style>
</head>
<body>
<table width="100%" border=0 cellspacing=0 bgcolor="#cccccc">
	<tr>
		<td rowspan=2><a href="index.php">
			<img src="images/Book-O-rama.gif" alt="Book Shop"
			border=0 align="left" valign="bottom" height=55 width=325>
		</a></td>
		<td align="right" valign="bottom">
			<?php if(isset($_SESSION['admin_user']))
				echo "&nbsp;";
			else
				echo "Total books = ".$_SESSION['items'];
			?>
		<td align="right" rowspan?2 width=135>
		<?php	if(isset($_SESSION['admin_user']))
				display_button("logout.php", "log-out", "Exit");
			else
				display_button("show_cart.php", "view-cart", "show cart");
		?>
		</td>
	</tr>
	<tr>
		<td align="right" valign?"top">
			<?php if (isset($_SESSION['admin_user']))
				echo "&nbsp;";
			else
				echo "Total sum = $".number_format($_SESSION['total_price'],2);
			?>
		</td>
	</tr>
</table>
<?php
	if($title)
		do_html_heading($title);
}

function do_html_footer()
{
?>
	</body>
	</html>
<?php
}
function do_html_heading($heading)
{
?>
	<h2>echo $heading;</h2>
<?php
}

function do_html_URL($url, $name)
{
?>
	<a href="<?php echo $url; ?>">echo $name;</a><br />
<?php
}

function display_categories($cat_array)
{
	if (!is_array($cat_array))
	{
		echo "At the moment, categories are not available<br />";
		return;
	}
	echo "<ul>";
	foreach ($cat_array as $row)
	{
		$url = "show_cat.php?catid=".($row['catid']);
		$title = $row['catname'];
		echo "<li>";
		do_html_url($url, $title);
		echo "<li>";
	}
	echo "</ul>";
	echo "<hr />";
}

function display_books($book_array)
{
	if (!is_array($book_array))
	{
		echo "<br />At the moment there are no books available in this categorie<br />";
	}
	else
	{
		echo "<table width = \"100%\" border=0>";
		foreach ($book_array as $row)
		{
			$url = "show_book.php?isbn=".($row['isbn']);
			echo "<tr><td>";
			if (@file_exists('images/'.$row['isbn'].'.jpg'))
			{
				$title = '<img src=\'images/'.($row['isbn']).'.jpg\' border=0 />';
				do_html_url($url,$title);
			}
			else
			{
				echo "&nbsp;";
			}
			echo "</td><td>";
			$title = $row['title'].", author ".$row['author'];
			do_html_url($url, $title);
			echo "</td><tr>";
		}
		echo "</table>";
		echo "<hr />";
	}
}

function display_book_details($book)
{
	if (is_array($book))
	{
		echo "<table><tr>";
		if (@file_exists('images/'.($book['isbn']).'.jpg'))
		{
			$size = GetImageSize('images/'.$book['isbn'].'.jpg');
			if($size[0] > 0 && $size[1] > 0)
				echo '<td><img src=\'images/'.$book['isbn'].'.jpg\' border= 0'.$size[3].'></td>';
		}
		echo "<td><ul>";
		echo "<li><b>Author:&nbsp:</b>";
		echo $book['author'];
		echo "</li><li><b>ISBN:&nbsp;</b>";
		echo $book['isbn'];
		echo "</li><li><b>Our price:&nbsp;</b>";
		echo number_format($book['price'], 2);
		echo "</li><li><b>Annotation:&nbsp;</b>";
		echo $book['description'];
		echo "</li><ul></td></tr></table>";
	}
	else
		echo "Not able to show book data.";
	echo "<hr />";
}
function display_checkout_form()
{
?>
	<br />
	<table border=0 width="100%" cellspacing= 0>
	<form action = "purchase.php" method="post">
	
		<tr>
			<th colspan= 2 bgcolor="#cccccc">Information about you</th>
		</tr>
		<tr>
			<td>FIO</td>
			<td><input type="text" name="name" value="" maxlength=40 size=40></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address" value="" maxlength=40 size=40></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" value="" maxlength=20 size=40></td>
		</tr>
		<tr>
			<td>State</td>
			<td><input type="text" name="state" value="" maxlength=20 size=40></td>
		</tr>
		<tr>
			<td>Post Index</td>
			<td><input type="text" name="zip" value="" maxlength=10 size=40></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><input type="text" name="country" value="" maxlength=20 size=40></td>
		</tr>
		<tr>
			<th colspan=2 bgcolor="#cccccc">
			Address for delivery (Dont fill in if it is the same as billing address)
			</th>
		</tr>
		<tr>
			<td>FIO</td>
			<td><input type="text" name="ship_name" value="" maxlength=40 size=40></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="ship_address" value="" maxlength=40 size=40></td>
		</tr>
		<tr>
			<td>city/village</td>
			<td><input type="text" name="ship_city" value="" maxlength=20 size=40></td>
		</tr>
		<tr>
			<td>State</td>
			<td><input type="text" name="ship_state" value="" maxlength=20 size=40></td>
		</tr>
		<tr>
			<td>Index</td>
			<td><input type="text" name="ship_zip" value="" maxlength=10 size=40></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><input type="text" name="ship_country" value="" maxlength=20 size=40></td>
		</tr>
		<tr>
			<td colspan=2 align="center">
			<b>Please click on the button "Purchase" to confirm the purchase or click "Continue Shopping" to continue shopping.</b>
			<?php display_form_button('purchase','Purchase selected'); ?>
			</td>
		</tr>
		</form>
		</table>
		<hr />
<?php
}
function display_shipping($shipping)
{
?>

	<table border=0 width="100%" cellspacing=0>
	<tr>
		<td align="left">Delivery</td>
		<td align="right"><?php echo number_format($shipping, 2); ?></td>
		</tr>
		<tr>
			<th bgcolor="#cccccc" align="left">TOTAL, INCLUDING DELIVERY</th>
			<th bgcolor="#cccccc" align="right">
			$<?php echo number_format($shipping + $_SESSION['total_price'], 2); ?>
			</th>
		</tr>
	</table>
	<br />
<?php
}
function display_card_from($name)
{
?>
		<table border=0 width="100%" cellspacing=0>
		<form action="process.php" method="post">
			<tr>
				<th colspan=2 bgcolor="#cccccc">Creditcard information</th>
			</tr>
		<tr>
			<td>Vid</td>
			<td><select name="card_type">
				<option> Visa <option> <Mastercard <option> American Express
			</select></td>
		</tr>
		<tr>
			<td>Number</td>
			<td><input type="text" name="card_number" value="" maxlength=16 size=40></td>
		</tr>
		<tr>
			<td>Amex-code</td>
			<td><input type="text" name="amex_code" value="" maxlength=4 size=4></td>
		</tr>
		<tr>
			<td>date validity</td>
			<td>Month<select name="card_month">
			<option> 01 <option> 02 <option> 03 <option> 04 <option> 05 <option> 06 <option> 07 <option> 08 <option> 09 <option> 10 <option> 11 <option> 12
			</select>
			Year <select name="card_year">
			<option> 01 <option> 02 <option> 03 <option> 04 <option> 05 <option> 06 <option> 07 <option> 08 <option> 09 <option> 10
			</select>
			</td>
		</tr>
		<tr>
			<td>Cardholder</td>
			<td><input type="text" name="card_name" value="<?php echo $name; ?>" maxlength=40 size=40></td>
		</tr>
		<tr>
			<td colspan=2 align="center">
				<b>Please click on the button "Purchase" to confirm the purchase or click "Continue Shopping" to continue shopping.</b>
				<?php display_form_button('purchase', 'Purchase selected'); ?>
			</td>
		</tr>
		</table>
<?php
}
function display_cart($cart, $change = true, $images = 1)
{
	echo 	"<table border=\"0\" width=\"100%\ cellspacing=\"0\">
			<form action=\"show_cart.php\" method=\"post\">
			<tr><th colspan=\"". (1+$images) . "\" bgcolor=\"#cccccc\">Products</th>
			<th bgcolor=\"#cccccc\">Price</th>
			<th bgcolor=\"#cccccc\">Amount</th>
			<th bgcolor=\"#cccccc\">Total</th>
			</tr>";
	foreach ($cart as $isbn => $qty)
	{
	$book = get_book_details($isbn);
	echo "<tr>";
		if (file_exists("images/".$isbn.".jpg"))
		{
		$size = GetImageSize("images/".$isbn.".jpg");
		if ($size[0] > 0 && $size[1] > 0)
			{
			echo 	"<img src=\"images/".$isbn.".jpg\"
					style=\"border: 1px solid black\"
					width=\"".($size[0]/3)."\"
					height=\"".($size[1]/3)."\"/>";
			}
		}
		else
		{
		echo "&nbsp;";	
		}
	echo "</td>";
	}
echo 	"td align=\"left\">" .
		"<a href=\"show_book.php?isbn=".$isbn."\">".$book['title']."</a>".
		", author ".$book['author']."</td>" .
		"<td align=\"center\">\$".number_format($book['price'], 2)."</td>" .
		"<td align=\"center\">";
	
	if ($change == true)
	{
		echo "<input type=\"text\" name=\"$isbn\" value=\"$qty\" size=\"3\">";
	}
	else
	{
		echo $qty;	
	}
	echo 	"</td>
			<td align=\"center\">\$".number_format($book['price']*$qty, 2)."</td>
			</tr>\n";

echo 	"<tr>
		<th colspan=\"".(2+$images)."\" bgcolor=\"#cccccc\">&nbsp;</td>
		<th align=\"center\" bgcolor=\"#cccccc\">".$_SESSION['items']."</th>
		<th align=\"center\" bgcolor=\"#cccccc\">\$".number_format($_SESSION['total_price'], 2)."
		</tr>";
		
	if ($change == true)
	{
		echo 	"<tr>
				<td colspan=\"".(2+$images)."\">&nbsp;</td>
				<td align=\"center\">
				<input type=\"hidden\" name=\"save\" value=\"true\"/>
				<input type=\"image\" src=\"images/save-changes.gif\" border=\"0\" alt=\Save Changes\"/>
				</tr>";				
	}
	echo "</form></table>";
}
function display_login_form()
{
?>
	<form method="post" action="admin.php>
	<table bgcolor="#cccccc">
	<tr>
		<td>Username:</td>
		<td><input type="text" name="username"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="passwd"></td>
	</tr>
	<tr>
		<td colspan=2 align="center">
		<input type="submit" value="Enter"></td>
	</tr>
	</table></form>
<?php
}
function display_admin_menu()
{
?>

	<br />
	<a href="index.php">go to homepage</a><br />
	<a href="insert_category_form.php">Add new category</a><br />
	<a href="insert_book_form.php">Add new book</a><br />
	<a href="change_password_form.php">Change administrator password</a><br />
<?php
}
function display_button($target, $image, $alt)
{
	echo "<center><a href=\$target\"><img src=\"images/$image".".gif\ alt=\"$alt\" border=0 height=50 width=135></a></center>";
}
function display_form_button($image, $alt)
{
	echo "<center><input type=\"image\" src=\"images/$image".".gif\" alt=\"$alt\" border=0 height=50 width=135></center>";
}
?>