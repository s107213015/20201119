<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: loginForm.php");
} 
if ($_SESSION['uID']=='boss'){
	$bossMode = 1;
} else {
	$bossMode=0;
}
require("todoModel.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning";
}



$result=getJobList($bossMode);
$jobStatus = array('未完成','已完成','已結案','已取消');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Todo List !! </p>
<hr />
<div><?php echo $msg; ?></div><hr>
<a href="loginForm.php">login</a> | <a href="todoEditForm.php?id=-1">Add Task</a> <br>

<?php

while (	$rs=mysqli_fetch_assoc($result)) {
	if ($_SESSION['uID']=='teacher') {	//teacher
		header("Location: TeacherMain.php");
	}
	elseif ($_SESSION['uID']=='secretary'){	//secretary
		
	}
	elseif ($_SESSION['uID']=='president'){	//president
		
	}
	else {							//student
		$result = getJobList($_SESSION['uID']);

		echo "<table border='1'>";
		echo "<tr><td>申請人</td><td>父</td><td>母</td><td>申請補助種類</td><td>teacher說明</td><td>secretary說明</td><td>teacher審核</td><td>secretary審核</td><td>president審核</td></tr>";
		while ($rs=mysqli_fetch_assoc($result)) {
			echo "<tr>";

			$id = $rs['stuID'];
			echo "<input name='id' type='hidden' id='id' value='$id'>";
			echo "<td>".$rs['name']."</td>";
			echo "<td>".$rs['dad_name']."</td>";
			echo "<td>".$rs['mom_name']."</td>";
			if ($rs['subsidyType']==1){
				echo "<td>低收入戶</td>";
			}else if ($rs['subsidyType']==2){
				echo "<td>中低收入戶</td>";
			}else if ($rs['subsidyType']==3){
				echo "<td>家庭突發因素</td>";
			}
			echo "<td>".$rs['teacher_Comment']."</td>";
			echo "<td>".$rs['secretary_Comment']."</td>";
			echo "<td>".$rs['teacher_Agree']."</td>";
			echo "<td>".$rs['secretary_Agree']."</td>";
			echo "<td>".$rs['president_Agree']."</td>";
			echo "</tr>";
		}
	}

}
?>
</table>
</body>
</html>