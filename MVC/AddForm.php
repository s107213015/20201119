<?php
session_start();
require("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Requisition</title>
</head>
<body>
<h1>Add New Requisition</h1>
<form method="post" action="insert.php">
        申請人: <input name="name" type="text" id="name" /> <br>
        學號: <input name="id" type="text" id="id" /> <br>
        家庭狀況:<br>
        母:<input name="mom_name" type="text" id="mom_name" /> <br>
        父:<input name="dad_name" type="text" id="dad_name" /> <br>
      申請補助種類:<select  name="subsidy_type" type="select" id="subsidy_type" /> 
					<option value='1'>低收入戶</option>
					<option value='2'>中低收入戶</option>
					<option value='3'>家庭突發因素</option>
					</select><br>
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
