<?php
require("todoModel.php");
$stuID = (int)$_GET['id'];
finishJob($stuID);
header("Location: presidentMAIN.php");
?>