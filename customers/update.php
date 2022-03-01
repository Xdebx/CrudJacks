<?php
include "../includes/config.php";
if ($_POST['submit'] ==  "update"){
$customer_id = $_POST['customer_id'];
$title = $_POST['title'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['addressline'];
$town = $_POST['town'];
$phone = $_POST['phone'];
$zip = $_POST['zipcode'];
$sql = "UPDATE CUSTOMER SET title = '$title',fname = '$fname',lname = '$lname',addressline = '$address',town = '$town',zipcode = '$zip',phone = '$phone' WHERE customer_id = " . $customer_id ;
$result = mysqli_query( $conn,$sql);
if ($result) {
//  echo "customer updated";
header("location:index.php");
}
}
?>