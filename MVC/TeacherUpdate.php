<?php
require("todoModel.php");

$id = mysqli_real_escape_string($conn,$_POST['id']);
$teacher_Comment = mysqli_real_escape_string($conn,$_POST['teacher_Comment']);
$teacher_Agree = mysqli_real_escape_string($conn,$_POST['teacher_Agree']);
//echo $id,$teacher_Comment,$teacher_Agree;
updateList($id,$teacher_Comment,$teacher_Agree);
header("Location: TeacherMain.php");
?>