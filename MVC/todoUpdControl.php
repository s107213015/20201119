<?php
require("todoModel.php");

$name=mysqli_real_escape_string($conn,$_POST['name']);
$dad_name=mysqli_real_escape_string($conn,$_POST['dad_name']);
$mom_name=mysqli_real_escape_string($conn,$_POST['mom_name']);
$subsidyType=mysqli_real_escape_string($conn,$_POST['subsidy_type']);
$stuID=(int)$_POST['stuID'];


if ($name != NULL) { //if title is not empty
	updateJob($stuID,$name, $dad_name, $mom_name, $subsidyType);
	$msg="Message updateded";
} else {
	$msg= "Message title cannot be empty";
}
header("Location: todoListView.php?m=$msg");