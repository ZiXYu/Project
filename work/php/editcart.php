<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Untitled Document</title>
    </head>
    
    <body>
<script language='javascript'>
<?php

include("connect.php");

$num = $_GET["num"];
$userid = $_SESSION["userid"];
$goodid = $_GET["buy_goodid"];

if($num == 0)
	$query = mysql_query("delete from buy  where userid = '$userid' and goodid = '$goodid'", $mysql);
else
	$query = mysql_query("update buy set num='$num' where userid = '$userid' and goodid = '$goodid'", $mysql);
	
echo("window.location.href='cart.php'");
?>
</script>    
    </body>
</html>
