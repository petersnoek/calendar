<?php

// maak verbinding, of stop met foutbericht
function ConnectDB() {
	// connect with servername, username, password, databasename
	$connection = new mysqli('localhost','root','','calendar');
	
	if( ! $connection = mysqli_connect() ) {
	    die('No connection: ' . mysqli_connect_error());
	} 

	$connection->select_db('calendar');

	return $connection;
}

function GetBirthdays($connection) {
	// prepare query to select all data from the table books
	$sql = "SELECT * FROM birthdays";
	
	// Perform a query, check for error
	if (!mysqli_query($connection,$sql)) {
	  echo("Error description: " . mysqli_error($connection));
	}

	
	// fetch all selected books to store in variable: booksList
	//$birthdays = $result->fetch_all(MYSQLI_ASSOC);

	//return $birthdays;
}