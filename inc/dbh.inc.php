<?php

// $serverName = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "dbfshop";

//for Azure
$serverName = "friendsserver.mysql.database.azure.com";
$dbUsername = "junhee@friendsserver";
$dbPassword = "***********";
$dbName = "dbfshop";

//for GCP
// $serverName = "34.68.192.143";
// $dbUsername = "root";
// $dbPassword = "***********";
// $dbName = "dbfshop";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);



if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}



