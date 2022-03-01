<?php
session_start();
include("../includes/connect.php");
if (!isset($_SESSION['user_id']) ) {
 require ('../includes/login_functions.inc.php');
 redirect_user();
}
//print_r($_SESSION);
 try {
mysqli_query($dbc,'START TRANSACTION');
$q = 'INSERT INTO orderinfo(customer_id, date_placed, date_shipped,shipping, shipvia) VALUES (?,NOW(), NOW(), ?, ?)';
$shipping = 10.00;
$shipvia = 1;
$customer_id = 1;
// $flag = true;
$stmt1 = mysqli_prepare($dbc, $q);
mysqli_stmt_bind_param($stmt1, 'idi', $customer_id, $shipping,$shipvia);
mysqli_stmt_execute($stmt1);
$orderinfo_id = mysqli_insert_id($dbc);
// echo $orderinfo_id;
$q2 = 'INSERT INTO orderline(orderinfo_id ,item_id,quantity)VALUES (?, ?, ?)';
$stmt2 = mysqli_prepare($dbc, $q2);
mysqli_stmt_bind_param($stmt2, 'iii', $orderinfo_id, $product_code,$product_qty);
$q3 = 'UPDATE stock SET quantity = quantity - ? where item_id = ?';
$stmt3 = mysqli_prepare($dbc, $q3);
mysqli_stmt_bind_param($stmt3, 'ii', $product_qty,$product_code);
// print_r($_SESSION["cart_products"]);
foreach ($_SESSION["cart_products"] as $cart_itm){
//set variables to use in content below
  $product_name = $cart_itm["item_name"];
  $product_qty = $cart_itm["item_qty"];
  $product_price = $cart_itm["item_price"];
  $product_code = $cart_itm["item_id"];
  $product_color = $cart_itm["product_color"];
  //print_r($product_code);
  mysqli_stmt_execute($stmt2);
  mysqli_stmt_execute($stmt3);
   if( (mysqli_stmt_affected_rows($stmt2) > 0) && (mysqli_stmt_affected_rows($stmt3) > 0) ){
   // mysqli_commit($conn);
   $flag = true;
   }
   // else {
   //   // mysqli_rollback($conn);
   //  $flag = false;
   // }
}
if ($flag == true){
 mysqli_commit($dbc);
  unset($_SESSION['cart_products']);
}
// else {
//  mysqli_rollback($dbc);
// }
}
 catch(mysqli_sql_exception $e) {
  mysqli_rollback($dbc);
 }
header('Location: orders.php');
?>