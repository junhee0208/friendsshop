<?php

if(isset($_POST["submit"])){
	$userId = $_POST["userId"];
	$pwd = $_POST["pwd"];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	if(EmptyInputLogin($userId, $pwd) == true){
		header("location: ../index.php?error=emptyinput");
		//header("location: ../login.php?id=$userId&pwd=$pwd");

		exit();
	}
	LoginUser($conn, $userId, $pwd);
}
else{
	header("location: ../login.php");
	exit();
}

?>