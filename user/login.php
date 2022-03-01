<?php # Script 12.3 - login.php
if ($_SERVER['REQUEST_METHOD'] =='POST') {
require ('../includes/login_functions.inc.php');
require ('../includes/connect.php');
list ($check, $data) = check_login ($dbc, $_POST['email'], $_POST['pass']);
if ($check) { // OK!
session_start();
$_SESSION['user_id'] = $data['user_id'];
$_SESSION['first_name'] = $data['first_name'];
redirect_user('loggedin.php');
} else {
$errors = $data;
}
mysqli_close($dbc);
}
include ('../includes/login_page.inc.php');