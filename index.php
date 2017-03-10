<?php

	// array used to translate monthnumbers to dutch monthnames
	$monthNames = array(
		'onbekend', 'januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus',
		'september', 'oktober', 'november', 'december'
	);

?>
<!doctype html>
<html>
<head>
	<title>Verjaardagskalender</title>
    <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

	// create connection, check if connection works, or show error and stop
	$connection = new mysqli('localhost','root','','calendar');
	if( ! $connection ) {
	    die('Error: could not create connection: ' . mysqli_connect_error());
	} 

	// get all birthdays from database and store them in $birthdays array
	$sql = "SELECT * FROM birthdays ORDER BY month ASC";
	if (!$result = $connection->query($sql)) {
	  	die("Error: could not execute query. Error description: " . mysqli_error($connection));
	}
	$birthdays = $result->fetch_all(MYSQLI_ASSOC);

	/* pretty print debug info
	highlight_string("<?php\n\$data =\n" . var_export($birthdays, true) . ";\n?>");
	*/

	// print all birthday's; only print Monthname and Day once
	setlocale(LC_ALL, 'nld_nld');
	$lastMonth = '';
	$lastDay = '';
	foreach($birthdays as $birthday){
		if ($birthday['month'] != $lastMonth) {
			printf(PHP_EOL . '<h1>%s</h1>' . PHP_EOL, $monthNames[$birthday['month']] );
		}

		if ($birthday['day'] != $lastDay) {
			echo '<h2>' . $birthday['day'] . '</h2>' . PHP_EOL;
        }

		$id =  $birthday['id'];

		// print birthday's (printf replaces %s)
		printf('<p><a href="edit.php?id=%s">%s (%s)</a> <a href="delete.php?id=%s">x</a></p>' . PHP_EOL, 
			$id, $birthday['person'], $birthday['year'], $id);

		$lastMonth = $birthday['month'];
		$lastDay = $birthday['day'];
	}
?>

<p><a href="create.php">+ Toevoegen</a></p>
