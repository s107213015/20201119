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
	if ($stuID== -1) {
		addJob($stuID,$name, $dad_name, $mom_name, $subsidyType);
	} else {
		$sql = "update subsidyform set stuID='$stuID', name='$name', dad_name='$dad_name', mom_name='$mom_name', subsidyType='$subsidyType' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

function getJobList($id) {
	global $conn;
	if ($id == 0) {
		$sql = "select * from subsidyform where teacher_Agree = '0'";
	}else if($id == 1){
		$sql = "select * from subsidyform where secretary_Agree = '0'";
	}
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function teacherupdateList($stuID,$teacher_Comment,$teacher_Agree) {
	global $conn;
	if ($stuID) {
		$sql = "update subsidyform set teacher_Comment='$teacher_Comment', teacher_Agree='$teacher_Agree' where stuID='$stuID'";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

function getJobDetail($id) {
	global $conn;
	if ($id == -1) { //-1 stands for adding a new record
		$rs=[
			"id" => -1,
			"title" => "new title",
			"content" => "job description",
			"urgent" => "一般"
		];
	} else {
		$sql = "select id, title, content, urgent from todo where id=$id;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$rs=mysqli_fetch_assoc($result);
	}
	return $rs;
}

function setFinished($jobID) {
	global $conn;
	$sql = "update subsidyform set status = 1, finishTime=NOW() where id=$jobID and status = 0;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	
}

function rejectJob($jobID){
	global $conn;
	$sql = "update subsidyform set status = 0 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}

function setClosed($jobID) {
	global $conn;
	$sql = "update subsidyform set status = 2 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}


?>