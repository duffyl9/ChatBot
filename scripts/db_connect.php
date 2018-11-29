<?php
//initializes a mysqli connection. username and password will likely need to be changed based on your working environment
	$user = 'root';
	$password ='root';
	$host = 'localhost';
	$myDB = 'chatbot_db';
	$mysqli = new mysqli($host,$user,$password,$myDB);

	if ($mysqli->connect_errno) {
		$_SESSION['message'] =  'Cant connect to the databas';
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();}

?>
