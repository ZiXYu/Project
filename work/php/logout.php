<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Untitled Document</title>
    </head>
    
    <body>
        <script language="javascript">
    		<?php
        		session_start();
				$_SESSION["isLog"]=0;
				
			?>
			alert("登出成功！");
			window.location.href='../homepage.php';
		</script>
    	
    </body>
</html>
