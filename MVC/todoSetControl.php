<?php
require("todoModel.php");

$act = (int)$_GET['id'];
if ($stuID>0) {
	switch($act) {
		case '同意':
			setFinished($stuID);
			//$sql = "update todo set status = 1, finishTime=NOW() where id=$msgID and status = 0;";
			break;
		case '退回':
			rejectJob($stuID);
			break;
	}
}
header("Location: todoListView.php?m=$msg");
?>

