<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>注册</title>
    </head>
    
    <body style="font-family:微软雅黑;">
   <script language='javascript'>
<?php

include("connect.php");

$imp = "0";

$email = $_POST["email"];
$pwd = $_POST["pwd"];
$pwds = $_POST["pwds"];
$username = $_POST["username"];
$imp = @$_POST["imp"];
//$imp = @$_POST['imp'];

if($username == "" || $pwd == "" || $email == ""|| $pwds == "")
{
	echo "alert('注册失败：信息不完整或不正确!');";
	echo "window.location.href='login.php';";
}
else
{
	if($pwd != $pwds)
	{
		echo "alert('注册失败：密码设置不正确!');";
		echo "window.location.href='login.php';";	
	}
	else
	{
		if($imp != "100")
		{
			echo "alert('注册失败：请同意网站服务条款!');";
			echo "window.location.href='login.php';";
		}
	else
		{
			$select_user = mysql_query("select * from user where username = '$username'", $mysql);
			if(mysql_num_rows($select_user) > 0)
			{
				echo "alert('注册失败：该用户名已存在!');";
				echo "window.location.href='login.php';";
			}
			else
			{
				$select_user = mysql_query("insert into user(email,username,pwd) values ('$email','$username','$pwd')", $mysql);
				echo "alert('注册成功!');";
				echo "window.location.href='login.php';";
			//$_SESSION["isLog"] = 1;
				//$_SESSION["name"] = $name;
		//$_SESSION["id"] = $id;
			}
		}
	}
}

?>
</script>
    </body>
</html>
