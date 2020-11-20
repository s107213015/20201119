<?php
require("todoModel.php");

$stuID = mysqli_real_escape_string($conn,$_POST['stuID']);
$secretary_Comment = mysqli_real_escape_string($conn,$_POST['secretary_Comment']);
$secretary_Agree = mysqli_real_escape_string($conn,$_POST['secretary_Agree']);
//echo $stuID,$secretary_Comment,$secretary_Agree;
secretaryUpdateList($stuID,$secretary_Comment,$secretary_Agree);
header("Location: SecretaryMain.php");
?>