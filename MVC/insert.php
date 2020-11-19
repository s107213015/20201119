<?php
require("todoModel.php");

$id = mysqli_real_escape_string($conn,$_POST['id']);
$name = mysqli_real_escape_string($conn,$_POST['name']);
$mom_name = mysqli_real_escape_string($conn,$_POST['mom_name']);
$dad_name = mysqli_real_escape_string($conn,$_POST['dad_name']);
$subsidy_type = mysqli_real_escape_string($conn,$_POST['subsidy_type']);

addJob($id,$name,$mom_name,$dad_name,$subsidy_type);
header("Location: AddForm.php");
?>

