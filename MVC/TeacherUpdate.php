<?php
require("todoModel.php");
$stuID = mysqli_real_escape_string($conn,$_POST['stuID']);
$teacher_Comment = mysqli_real_escape_string($conn,$_POST['teacher_Comment']);
$teacher_Agree = mysqli_real_escape_string($conn,$_POST['teacher_Agree']);
teacherUpdateList($stuID,$teacher_Comment,$teacher_Agree);
header("Location: TeacherMain.php");
?>