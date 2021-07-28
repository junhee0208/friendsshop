<?php

require_once 'dbh.inc.php';
require_once 'function.inc.php';

if(isset($_POST["submit"]))
{
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $image = $_POST["image"];


    CreateProduct($conn, $title, $price, $description, $image);

}
else{
	header("location: ../addproduct.php");
	exit();
}