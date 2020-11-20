<?php
session_start();
require("userModel.php");

$userName = $_POST['id'];

if (checkUserIDPwd($userName, $password)) {
	echo "<h1>$userName</h1>";
	$_SESSION['uID'] = $userName;
	header("Location: todoListView.php");
} else {
	$_SESSION['uID']="";
	echo "<h1>AAAAAAAAAAAAAA</h1>";
	header("Location: loginForm.php");
}
?>
