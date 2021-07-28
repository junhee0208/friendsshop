<?php
require_once 'inc/function.inc.php';
require_once 'inc/dbh.inc.php';


isset($_GET['prod_id']) ? $_GET['prod_id'] : null;
$prod_id = $_GET['prod_id'];
$product = DeleteProduct($conn, $prod_id);


// if(isset($_GET['prod_id']))
// {
//   $prod_id = $_GET['prod_id'];

//   $product = DeleteProduct($conn, $prod_id);
// } 
?>