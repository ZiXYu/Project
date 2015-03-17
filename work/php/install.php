<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Untitled Document</title>
    </head>
    
    <body>
  <p><a href="login.php">返回登录页面</a></p>
<?php

include("connect.php");

//新建user数据
if(mysql_query("drop table if exists user", $mysql)) echo "存在user表,已删除旧信息<br>";
if(mysql_query("drop table if exists goods", $mysql)) echo "存在goods表,已删除旧信息<br>";
if(mysql_query("drop table if exists buy", $mysql)) echo "存在buy表,已删除旧信息<br>";
if(mysql_query("drop table if exists indent", $mysql)) echo "存在indent表,已删除旧信息<br>";
if(mysql_query("drop table if exists ordergoods", $mysql)) echo "存在ordergoods表,已删除旧信息<br>";
$query = "create table user(email char(255) , username char(255), pwd char(255), flag int(1) default 0, id int(1) not null AUTO_INCREMENT,primary key (id))";
//flag=0 普通用户；=1 客服 =2 管理员。
$create_user = mysql_query($query, $mysql);
if($create_user) echo "create table user TRUE<br>";
else echo "sorry!<br>";

$query = mysql_query("insert into user(email,username,pwd,flag) values ('lxe1031@yahoo.com.cn','yuzixuan','yuzixuan','2')", $mysql);
$query = mysql_query("insert into user(email,username,pwd,flag) values ('331000186@qq.com','kefu','kefu','1')", $mysql);
$query = mysql_query("insert into user(email,username,pwd,flag) values ('123@qq.com','123','123','0')", $mysql);

$query = "create table goods(name char(255), price char(255) , value double, profile text, img char(255), others text, id int(1) not null AUTO_INCREMENT,primary key (id))";
$create_user = mysql_query($query, $mysql);
if($create_user) echo "create table goods TRUE<br>";
else echo "sorry!<br>";

$query = mysql_query("insert into goods(name,price,value,profile,img,others) values ('Form 1 Pre-order (November)','3,299.00','3299','Includes Form 1 printer, Form Finish Kit, Form Software, and 1 liter of resin. Orders placed now have an estimated shipping-date in November. Available for USA (except South Carolina), Canada, Europe, and Australia.','img/good_1.jpg','Ships November 2013!')", $mysql);
$query = mysql_query("insert into goods(name,price,value,profile,img) values ('Clear Resin','149.00','149.00','This clear resin is designed for strength and hardness that make it great for prototypes and detailed models. It is also great for painting. Available in 1-liter bottles for USA (except South Carolina), Canada, Europe, and Australia shipments.','img/good_2.jpg')", $mysql);
$query = mysql_query("insert into goods(name,price,value,profile,img) values ('Resin Tank','69.00','69.00','Use this resin tank to replace an old tank that is at the end of its life, or to keep on hand for additional resin formulations.','img/good_3.jpg')", $mysql);
$query = mysql_query("insert into goods(name,price,value,profile,img) values ('Build Platform','99.00','99.00','A spare build platform can help speed your printing work flow, whether you want to change resin formulas or start a print while you remove the most recent part.','img/good_4.jpg')", $mysql);
$query = mysql_query("insert into goods(name,price,value,profile,img) values ('Resin Tank','69.00','69.00','Use this resin tank to replace an old tank that is at the end of its life, or to keep on hand for additional resin formulations.','img/good_3.jpg')", $mysql);

$query = "create table buy(userid int(1), goodid int(1), num int(1), primary key (userid,goodid))";
$create_user = mysql_query($query, $mysql);
if($create_user) echo "create table buy TRUE<br>";
else echo "sorry!<br>";

$query = mysql_query("insert into buy(userid,goodid,num) values ('2','1','2')", $mysql);
$query = mysql_query("insert into buy(userid,goodid,num) values ('2','5','3')", $mysql);

$query = "create table indent(username char(255), name char(255), address char(255), phone char(255), orderid char(255), mail char(255), waybillid char(255), stateflag int(1) default 0,id int(1) not null AUTO_INCREMENT,primary key (id))";
//stateflag=0 未支付； 1 已支付未发货；2 已发货；3 已收货。
$create_user = mysql_query($query, $mysql);
if($create_user) echo "create table indent TRUE<br>";
else echo "sorry!<br>";

$query = mysql_query("insert into indent(username,name,address,phone,orderid,mail,stateflag) values ('123','虞子轩','浙江省杭州市萧山区雍景湾7-1-301','189-6819-3957','10002013090400001','310016','1')", $mysql);

$query = "create table ordergoods(orderid char(255), goodname char(255), num int(1), bodyid char(255),id int(1) not null AUTO_INCREMENT,primary key (id))";
$create_user = mysql_query($query, $mysql);
if($create_user) echo "create table ordergoods TRUE<br>";
else echo "sorry!<br>";

$query = mysql_query("insert into ordergoods(orderid,goodname,num) values ('10002013090400001','Clear Resin','2')", $mysql);
$query = mysql_query("insert into ordergoods(orderid,goodname,num) values ('10002013090400001','Resin Tank','5')", $mysql);


$close=mysql_close($mysql);
echo "close = ".$close."<br>";
?>
    </body>
</html>
