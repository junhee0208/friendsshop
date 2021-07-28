<?php

function EmptyInputSignup($firstName, $lastName, $userId, $pwd, $pwdRepeat)
{
	$result;

	if( empty($firstName) || empty($lastName) || empty($userId) ||empty($pwd) ||empty($pwdRepeat))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}


function ValidUserId($userId)
{
	$result;
	if( !preg_match("/^[a-zA-Z0-9]*$/", $userId))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function ValidEmail($email){

	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function PwdMatch($pwd, $pwdRepeat)
{
	$result;
	if($pwd !== $pwdRepeat)
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function UserIdExist($conn, $userId)
{
	$sql = "SELECT * FROM tbuser WHERE userId = ?;";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			
			echo("<script>location.href = '../login.php?msg=stmtfailed';</script>");
			exit();
		}
	
		mysqli_stmt_bind_param($stmt, "s", $userId);
		mysqli_stmt_execute($stmt);
	
		$resultData = mysqli_stmt_get_result($stmt);
	
        if($row = mysqli_fetch_assoc($resultData)){
			return $row;
		}
		else{
			$result = false;
			return $result;
        }
	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}
	

	mysqli_stmt_close($stmt);
}


function CreateUser($conn, $firstName, $lastName, $userId, $pwd)
{
	$sql = "INSERT INTO tbuser (firstName, lastName, userId, password) VALUES(?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../signup.php?error=stmtfailed");
			exit();
		}
	
	
		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
		mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $userId, $hashedPwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	
		header("location: ../login.php?error=none");
		exit();

	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}
	
}

function EmptyInputLogin($userId, $pwd)
{
	$result;

	if(empty($userId) ||empty($pwd))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function LoginUser($conn, $userId, $pwd)
{
	$uidExist = UserIdExist($conn, $userId);

    //$pwd = password_hash($pwd, PASSWORD_DEFAULT);
	//Check the id that user has input exists in CB	
	if ($uidExist === false){
		header("location: ../login.php?error=wrongId");
		exit();
	}

	$hashedPwd = $uidExist["password"];
	$checkPwd = password_verify($pwd, $hashedPwd);
    

	if($checkPwd === false){

		header("location: ../login.php?error=wrongPassword");
        exit();
	}
	else if($checkPwd === true){
		//session!!
		session_start();
		$_SESSION["firstName"] = $uidExist["firstName"];
		$_SESSION["isAdmin"] = $uidExist["isAdmin"];
        $fName = $uidExist["firstName"];
		header("location: ../index.php?fname=$fName");
		exit();

	}
}

function CreateProduct($conn, $title, $price, $description, $image)
{
	$sql = "INSERT INTO tbproduct (productName, productPrice, productDesc, productImg) VALUES(?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../addproduct.php?error=stmtfailed");
			exit();
		}
	
		$price = "$" . $price;
		mysqli_stmt_bind_param($stmt, "ssss", $title, $price, $description, $image);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	
		header("location: ../index.php?error=none");
		exit();

	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}
}

function GetProduct($conn, $prod_id)
{
	$sql = "SELECT * FROM tbproduct WHERE productNo = ?";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../editproduct.php?error=stmtfailed");
			exit();
		}
	
		mysqli_stmt_bind_param($stmt, "s", $prod_id);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);
	
        if($row = mysqli_fetch_assoc($resultData)){
			//$data = $row["productName"];
			//header("location: ../templates/editproduct.php?data=$data");
			return $row;
		}
		else{
			$result = false;
			return $result;
        }
		
		header("location: ../editproduct.php?error=none");
		exit();

	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}

	mysqli_stmt_close($stmt);
}

function UpdateProduct($conn, $prod_id, $title, $price, $description, $image)
{
	$sql = "UPDATE tbproduct 
			SET productName = ?, 
				productPrice = ?, 
				productDesc = ?, 
				productImg = ?
	         WHERE productNo = ?";

	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../editproduct.php?error=stmtfailed");
			exit();
		}
	
		//$price = "$" . $price;
		mysqli_stmt_bind_param($stmt, "sssss", $title, $price, $description, $image, $prod_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	
		header("location: ../index.php?error=none");
		exit();

	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}
}

function DeleteProduct($conn, $prod_id)
{
	header("location: ../deleteproduct.php?pid=$prod_id");
	
	$sql = "DELETE FROM tbproduct WHERE productNo =?";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../deleteproduct.php?error=stmtfailed");
			exit();
		}
	
		mysqli_stmt_bind_param($stmt, "s", $prod_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	
		header("location: index.php?error=none");
		exit();

	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}

}

?>