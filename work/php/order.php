<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Untitled Document</title>
    </head>
    
    <body>
<script language="javascript">
<?php

include("connect.php");

$name = $_POST["name"];
$userid = $_SESSION["userid"];
$add = $_POST["address"];
$phone = $_POST["phone"];
$mail = $_POST["mail"];

$sql_user = mysql_query("select * from user where id = '$userid'", $mysql);
$row=mysql_fetch_array($sql_user);

$query = mysql_query("insert into indent(username,name,address,phone,mail) values ('$row[username]','$name','$add','$phone','$mail')", $mysql);
$id = mysql_insert_id();
$orderid="1000".date('Ymd').sprintf("%05d",mysql_insert_id());
$query = mysql_query("update indent set orderid = '$orderid' where id = '$id'",$mysql);


$sql_cart = mysql_query("select * from buy where userid = '$userid'", $mysql);
	
while($info=mysql_fetch_array($sql_cart))
{
	$sql_goods = mysql_query("select * from goods where id = '$info[goodid]'", $mysql);	
	$good=mysql_fetch_array($sql_goods);
	$query = mysql_query("insert into ordergoods(orderid,goodname,num) values ('$orderid','$good[name]','$info[num]')", $mysql);
	$query = mysql_query("delete from buy where userid = '$userid'");
}		
echo "alert('订单提交成功');";
echo "window.location.href='../homepage.php';";
?>
					
</script>

    </body>
</html>
