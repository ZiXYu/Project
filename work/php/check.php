<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>check</title>
    </head>
<body style="font-family:微软雅黑;">
<script language='javascript'>
<?php

include("connect.php");

$username = $_POST["username"];
$pwd= $_POST["pwd"];

if($username == "" || $pwd == "")
{
	echo "alert('登陆失败：账号/密码不正确!');";
	echo "window.location.href='../login.php';";
}
else
{
	$select_user = mysql_query("select * from user where username = '$username' and pwd = '$pwd'", $mysql);
	if(mysql_num_rows($select_user) == 0)
	{
		echo "alert('登陆失败：账号/密码不正确!');";
		echo "window.location.href='../login.php';";
	}
	else
	{
		echo "alert('登录成功');";
		echo "window.location.href='../homepage.php';";
		$row=mysql_fetch_array($select_user);
		$_SESSION["isLog"] = 1;
		$_SESSION["userid"]=$row["id"];
		//echo "alert('登录成功!');";
		//if($row["flag"] == 1) $_SESSION["isLog"] = 2; else $_SESSION["isLog"] = 1;
		//$_SESSION["name"] = $row["name"];
		//$_SESSION["id"] = $row["id"];
	}
}
?>
</script>
    </body>
</html>
