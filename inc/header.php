<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css"/>
    
	
	<title></title>
	<style>
	.header{
    width:80%;
    margin-right:auto;
    margin-left:auto;
	}

	</style>
</head>
<body>


<div class="header">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: #7952b3 !important">
            <div class="container-fluid">
			<?php //$index_path = $_SERVER['DOCUMENT_ROOT'] . "/FriendsShop/index.php"; ?>
                <a class="navbar-brand" href="index.php">FRIENDS SHOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarColor01" aria-controls="navbarColor01" 
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" 
                                role="button" aria-haspopup="true" aria-expanded="false">ADMIN</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Stock Management</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </li>
                    </ul>
                   

                    <?php
                        if(isset($_SESSION["firstName"]))
                        {
                            //$path = 'http://localhost:8081/friendsshop/templates/inc/logout.inc.php';
                            echo '<p style="margin-left:35%">';
                            echo '<p style="font-size:15px; font-weight:bold; margin:10px auto 10px auto; 
                                     color:white">Welcome ' .$_SESSION["firstName"]. '</p>';
                            echo "<li class='btn btn-warning'><a style='font-weight:bold;color:white' href='inc/logout.inc.php'>Logout</a></li>";
                            echo '</p>';
                        }
                        else
                        {
                            echo '<p class="text-end" style="margin-left:45%">';
                            echo "<li class='btn btn-outline-light me-2'><a style='font-weight:bold;color:white' href='login.php'>Login</a></li><br/>";
                            echo "<li class='btn btn-warning' style='margin-left:15px;'><a style='font-weight:bold;color:white' href='signup.php'>Sign up</a></li>";
                            echo "</p>";
                        }
                    ?>
                </div>
            </div>
        </nav>
</div>