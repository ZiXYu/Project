<?php	
	session_start();

	//连接到本地mysql数据库 
	$mysql=mysql_pconnect("localhost","root","");	
	
	mysql_query("set names utf-8"); //这就是指定数据库字符集，一般放在连接数据库后面就系了 
	mysql_query("create database test_zkq",$mysql);
	$select_db = mysql_select_db("test_zkq",$mysql);//选择test为操作库

?>