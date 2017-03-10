<?php
	// connect with servername, username, password, databasename
	$connection = new mysqli('localhost','root','','library');
	
	// prepare query to select all data from the table books
	$sql = "SELECT * FROM books";
	
	// execute the query 
	$result = $connection->query($sql);
	
	// fetch all selected books to store in variable: booksList
	$booksList = $result->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html>
<body>
	<table>
<?php 
	// repeat for each book in booksList
	foreach($booksList as $book){
?>
	<tr>
		<td><?php echo $book['id']; ?></td>
		<td><?php echo $book['title']; ?></td>
		<td><?php echo $book['author']; ?></td>
	</tr>
<?php																			
	} // end foreach
?>
	</table>
</body>
</html>