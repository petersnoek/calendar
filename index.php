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


	// 1 create connection, check if connection works, or show error and stop
	$connection = new mysqli('localhost','root','','calendar');
	if( ! $connection ) {
	    die('No connection: ' . mysqli_connect_error());
	} 

	// 2 get all birthdays from database and store them in $birthdays array
	$sql = "SELECT * FROM birthdays ORDER BY month ASC";
	if (!$result = $connection->query($sql)) {
	  echo("Error description: " . mysqli_error($connection));
	}
	$birthdays = $result->fetch_all(MYSQLI_ASSOC);

	// 3 print all birthday's; only print Monthname and Day once
	setlocale(LC_ALL, 'nld_nld');
	$lastMonth = '';
	$lastDay = '';
	foreach($birthdays as $birthday){
		if ($birthday['month'] != $lastMonth) {
			echo '<h1>';
			echo $monthNames[$birthday['month']]; 
			echo '</h1>';
		}

		if ($birthday['day'] != $lastDay) {
			echo '<h2>' . $birthday['day'] . '</h2>';
        }

		$id =  $birthday['id'];

		echo '<p>
		<a href="edit.php?id=' . $id . '">' . $birthday['person'] . ' (' . $birthday['year'] . ')</a>
		<a href="delete.php?id=' . $id . '">x</a></p>';

		$lastMonth = $birthday['month'];
		$lastDay = $birthday['day'];
	}