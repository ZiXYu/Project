<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>addcart</title>
    </head>
    
    <body>
    
<script language='javascript'>
<?php

include("connect.php");

$goodid = $_GET["goodid"];
$userid = $_SESSION["userid"];
$select_num = mysql_query("select * from buy where userid = '$userid' and goodid = '$goodid'", $mysql);
if(mysql_num_rows($select_num) == 0)
{
	$query = mysql_query("insert into buy(userid,goodid,num) values ('$userid','$goodid','1')", $mysql);
}
else
{
	$query = mysql_query("update buy set num=num+1 where userid = '$userid' and goodid = '$goodid'", $mysql);
	
}
echo("window.location.href='../cart.php'");
?>
</script>
    </body>
</html>
