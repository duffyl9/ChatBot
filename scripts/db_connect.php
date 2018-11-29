<?php
//initializes a mysqli connection. username and password will likely need to be changed based on your working environment
	$user = 'root';
	$password ='';
	$host = 'localhost';
	$myDB = 'chatbot_db';
	$conn = new mysqli($host,$user,$password,$myDB);

	if ($conn->connect_errno) {
		$_SESSION['message'] =  'Cant connect to the databas';
    printf("Connection failed: %s\n", $conn->connect_error);
		
    die();
	}

?>
