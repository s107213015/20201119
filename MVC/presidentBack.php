<?php
require("todoModel.php");
$stuID = (int)$_GET['id'];
rejectJob($stuID);
header("Location: presidentMAIN.php");
?>