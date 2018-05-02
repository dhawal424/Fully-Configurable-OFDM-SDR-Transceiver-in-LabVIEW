<?php
//Database credentials
$dbHost     = 'smartparking.c2ts2ev2ujeh.ca-central-1.rds.amazonaws.com';
$dbUsername = 'nedsouz';
$dbPassword = '10166326';
$dbName     = 'users';

//Connect with the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//Display error if failed to connect
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
else 
	echo'connected to database';

?>
