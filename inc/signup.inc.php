<?php 

if(isset($_POST["submit"])){

	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$userId = $_POST["userId"];
	$pwd = $_POST["password"];
	$pwdRepeat = $_POST["pwdRepeat"];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	if(EmptyInputSignup($firstName, $lastName, $userId, $pwd, $pwdRepeat) !== false){
		header("location: ../signup.php?error=emptyinput");
		exit();
	}

	if(ValidUserId($userId) !== false){
		header("location: ../signup.php?error=invaliduid");
		exit();
	}

	// if(ValidEmail($email) !== false){
	// 	header("location: ../signup.php?error=invalidemail");
	// 	exit();
	// }

	if(PwdMatch($pwd, $pwdRepeat) !== false){
		header("location: ../signup.php?error=passwordnotmatch");
		exit();
	}

	if(UserIdExist($conn, $userId) !== false){
		header("location: ../signup.php?error=usernametaken");
		exit();
	}


	CreateUser($conn, $firstName, $lastName, $userId, $pwd);
}
else{
	header("location: ../signup.php");
	exit();
}