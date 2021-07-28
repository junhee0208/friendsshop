<?php

// $serverName = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "dbfshop";

$serverName = "friendsserver.mysql.database.azure.com";
$dbUsername = "junhee@friendsserver";
$dbPassword = "Jh200734019!";
$dbName = "dbfshop";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);



if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}



