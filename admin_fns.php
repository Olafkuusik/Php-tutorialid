<?php

function display_category_form($category = '')
{
	$edit = is_array($category);
?>

	<form method="post" action="<?php
	echo $edit ? 'edit_category.php' : 'insert_category.php';
	?> ">
	<table border = 0>
	<tr>
		<td>Naming of categories</td>
		<td><input type="text" name="catname" size=40 maxlength=40 value="<?php echo $edit ? $category['catname'] : '';
		?>"></td>
		</tr>
		<tr>
			<td <?php if ($edit) echo "colspan=2"; ?> align="center">
			<?php if ($edit)
				echo '<input type ="hidden" name="catid" value="' .$category['catid'] . '">';
			?>
			<input type="submit" value="<?php echo $edit ? 'Renew' : 'Add';
			?> Category"></form>
			</td>
			<?php if ($edit)
			{
				echo '<td>';
				echo '<form method="post" action="delete_category.php">';
				echo '<input type="hidden" name=catid" value="'.$category['catid'].'">';
				echo '<input type="submit" value="Delete category">';
				echo '</form></td>';
			} ?>
	</tr>
	</table>
<?php
}

function display_book_form($book = '')
{
?>
	<form method="post" action="<?php
		echo $edit ? 'edit_book.php' : 'insert_book.php'; ?>">
	<table border ="0">
	<tr>
		<td>ISBN:</td>
		<td><input type="text" name="isbn" value="<?php
		echo $edit ? $book['isbn'] : ''; ?>" /></td>
	?>">
	<table border="0">
	<tr>
		<td>Name:</td>
		<td><input type="text" name="title" value="<?php
		echo $edit ? $book['title'] : ''; ?>" /></td>
	</tr>
	<tr>
		<td>Author:</td>
		<td><input type="text" name="author" value="<?php
		echo $edit ? $book['author'] : ''; ?>" /></td>
	</tr>
	<tr>
		<td>
}