<?php
require_once("dbconnect.php");

function addJob($stuID,$name, $dad_name, $mom_name, $subsidyType) {
	global $conn;
	$sql = "insert into subsidyform (stuID, name, dad_name, mom_name, subsidyType) values ('$stuID','$name', '$dad_name', '$mom_name', $subsidyType);";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL	
}

function cancelJob($jobID) {
	global $conn;
	$sql = "update subsidyform set status = 3 where id=$jobID and status <> 2;";
	mysqli_query($conn,$sql);
	//return T/F
}

function updateJob($stuID,$name, $dad_name, $mom_name, $subsidyType) {
	global $conn;
	if ($name != NULL) {
		addJob($stuID,$name, $dad_name, $mom_name, $subsidyType);
	} else {
		$sql = "update subsidyform set stuID='$stuID', name='$name', dad_name='$dad_name', mom_name='$mom_name', subsidyType='$subsidyType' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

function getJobList($loginID) {
	global $conn;
	if ($loginID == 'teacher') {
		$sql = "select * from subsidyform where teacher_Agree = '0'";
	}elseif($loginID == 'secretary'){
		$sql = "select * from subsidyform where teacher_Agree = '1' and secretary_Agree = '0'";
	}elseif($loginID == 'president'){
        $sql = "select * from subsidyform where teacher_Agree = '1' and secretary_Agree = '1' and president_Agree = '0'";
    }else{
		$sql = "select * from subsidyform where stuID = '$loginID'";
	}
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function teacherUpdateList($stuID,$teacher_Comment,$teacher_Agree) {
	global $conn;
	//if ($stuID) {
		$sql = "update subsidyform set teacher_Comment='$teacher_Comment', teacher_Agree='$teacher_Agree' where stuID='$stuID'";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	//}
}

function secretaryUpdateList($stuID,$secretary_Comment,$secretary_Agree,$subsidyAmount) {
	global $conn;
	if ($stuID != NULL) {
		$sql = "update subsidyform set secretary_Comment='$secretary_Comment', secretary_Agree='$secretary_Agree' ,subsidyAmount='$subsidyAmount' where stuID='$stuID'";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

function getJobDetail($stuID) {
	global $conn;
	$sql = "select * from subsidyform where stuID='$stuID'";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	$rs=mysqli_fetch_assoc($result);
	return $rs;
}

function setFinished($jobID) {
	global $conn;
	$sql = "update subsidyform set status = 1, finishTime=NOW() where id=$jobID and status = 0;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	
}

function finishJob($stuID){
	global $conn;
    $sql = "update subsidyform set president_Agree='1' where stuID=$stuID;";
	mysqli_query($conn,$sql);
}
function rejectJob($stuID){
	global $conn;
    $sql = "update subsidyform set president_Agree='2' where stuID=$stuID;";
	mysqli_query($conn,$sql);
}

?>