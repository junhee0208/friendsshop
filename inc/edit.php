<?php //include_once '../../config/init.php'; ?>

<?php

require_once 'dbh.inc.php';
require_once 'function.inc.php';

//$product = new Product;

$prod_id = isset($_GET['prod_id']) ? $_GET['prod_id'] : null;

if(isset($_POST["submit"]))
{
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $image = $_POST["image"];

    UpdateProduct($conn, $prod_id, $title, $price, $description, $image);

}
else{
	header("location: ../editproduct.php");
	exit();
}



?>