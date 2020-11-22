<?php
session_start();
/*if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: MainMenu.php ");
} 
if ($_SESSION['uID']=='1'){
	$id = 1;
}*/
$name = "secretary";
require("todoModel.php");
$result = getJobList($name);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Secretary</title>
</head>
<body>
<p>my List !! </p>
<hr />
<?php
if(mysqli_num_rows($result)==0){
    echo "無申請資料";
}else if(mysqli_num_rows($result)>0){
    echo "<table border='1' width='600px'>";
    echo "<tr><td>申請人</td><td>父</td><td>母</td><td>申請補助種類</td><td>審查</td></tr>";
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
        echo "<td><button><a href='SecretaryForm.php?id={$rs['stuID']}'>審核</a></button></td>";
        echo "</tr>";
    }
}
?>
</table><br>
</body>
</html>
