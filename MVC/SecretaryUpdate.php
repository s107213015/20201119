<?php
require("todoModel.php");

$stuID = mysqli_real_escape_string($conn,$_POST['stuID']);
$name = mysqli_real_escape_string($conn,$_POST['name']);
$secretary_Comment = mysqli_real_escape_string($conn,$_POST['secretary_Comment']);
$subsidyAmount = mysqli_real_escape_string($conn,$_POST['subsidyAmount']);
$secretary_Agree = mysqli_real_escape_string($conn,$_POST['secretary_Agree']);
//echo $stuID,$secretary_Comment,$secretary_Agree;
secretaryUpdateList($stuID,$secretary_Comment,$secretary_Agree,$subsidyAmount);
header("Location: SecretaryMain.php");
?>