<?php
session_start();
/*if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: MainMenu.php ");
} 
if ($_SESSION['uID']=='0'){
	$id = 0;
}*/
require("todoModel.php");
$result = getJobList(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teacher</title>
</head>
<body>
<p>my List !! </p>
<hr />
<form method="post" action="TeacherUpdate.php">


<?php
if(mysqli_num_rows($result)==0){
    echo "無申請資料";
}else{
    echo "<table border='1' width='600px' >";
    echo "<tr><td>申請人</td><td>父</td><td>母</td><td>申請補助種類</td><td>說明</td><td>審核結果</td></tr>";
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
        echo "<td><input name='teacher_Comment' type='text' id='teacher_Comment'></td>";
        echo "<td><select name='teacher_Agree' id='teacher_Agree'>";
        echo "<option value='0'>未審核</option>";
        echo "<option value='1'>通過</option>";
        echo "<option value='1'>未通過</option></select></td>";
        echo "</tr>";
    }
}
?>
</table><br>
<input type='submit' name='Submit' value='送出' />
</form>
</body>
</html>
