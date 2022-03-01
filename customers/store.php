<?php
include "../includes/config.php";
print_r($_POST);
if ($_POST['submit'] ==  "save"){
$title = $_POST['title'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['addressline'];
$town = $_POST['town'];
$phone = $_POST['phone'];
$zip = $_POST['zipcode'];
$sql = "INSERT INTO CUSTOMER (title,fname,lname,addressline,town,zipcode,phone)
VALUES ('$title','$fname','$lname','$address','$town','$phone','$zip')";
echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result) {
//echo "customer saved";
header('location:index.php');
}
}
?>