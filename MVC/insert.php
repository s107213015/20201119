<?php
require("todoModel.php");

$id = mysqli_real_escape_string($db_link,$_POST['id']);
$name = mysqli_real_escape_string($db_link,$_POST['name']);
$mom_name = mysqli_real_escape_string($db_link,$_POST['mom_name']);
$dad_name = mysqli_real_escape_string($db_link,$_POST['dad_name']);
$subsidy_type = mysqli_real_escape_string($db_link,$_POST['subsidy_type']);
if($id){
    addJob($id,$name,$mom_name,$dad_name,$subsidy_type);
    header("Location: todoListView.php");
}


?>

