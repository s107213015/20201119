<?php
session_start();
require("todoModel.php");
/*if (! isset($_SESSION['uID']) or $_SESSION['uID']!="boss") {
	header("Location: loginForm.php");
} */
$stuID = (int)$_GET['id'];
$rs = getJobDetail($stuID);
if (! $rs) {
	echo "no data found";
	exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TeacherForm</title>
</head>
<body>
<h1>Edit Task</h1>
<form method="post" action="TeacherUpdate.php">
<input type='hidden' name='stuID' value='<?php echo $stuID ?>'>
<table border='1' width='600px'>
<tr><td>申請人</td><td>父</td><td>母</td><td>申請補助種類</td></tr>
<?php
    echo "<tr>";
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
    echo "</tr>";
?>
</table><br>
    說明:<input name='teacher_Comment' type='text' id='teacher_Comment'><br>
	審核: <select  name="teacher_Agree" type="select" id="teacher_Agree" /> 
		<option value='0'>未審核</option>
		<option value='1'>通過</option>
		<option value='2'>未通過</option>
	</select>
	<br>
<input type="submit" name="Submit" value="送出" />
</form>
</table>
</body>
</html>
