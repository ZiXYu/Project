      
        <?php
			include("php/connect.php");
			if(isset($_SESSION['userid']) == true)
			{
				$id = $_SESSION['userid'];
				$select_user = mysql_query("select * from user where id = '$id'", $mysql);
				$row=mysql_fetch_array($select_user);
			}
		?>
        
        <meta name="description" content="and Validation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/use.css" type="text/css" />
        <link rel="stylesheet" href="css/store.css" type="text/css" />
        <link rel="stylesheet" href="css/cart.css" type="text/css" />
        <link rel="stylesheet" href="css/checkout.css" type="text/css" />
        <link rel="stylesheet" href="css/checkorder.css" type="text/css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<link rel="stylesheet" href="assets/css/chosen.css" />

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
        
		<!--inline styles if any-->
	</head>

	<body>
    <div class="divcss5">
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="homepage.php" class="brand">
						<small>
							<i class="icon-leaf"></i>
							Formlabs
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
						<li class="light-blue user-profile">
							<a data-toggle="dropdown" href="#" class="user-menu">
								<span >
									<small>Welcome,</small>
									<?php
										if(isset($_SESSION["isLog"]) && $_SESSION["isLog"] == 1 && $row["flag"]==2)
											echo "超级管理员";
										else if(isset($_SESSION["isLog"]) && $_SESSION["isLog"] == 1 && $row["flag"]==1)
												echo "客服";
											else if(isset($_SESSION["isLog"]) && $_SESSION["isLog"] == 1 && $row["flag"]==0)	
													echo "$row[username]";
												else 
													echo "游客";	
									?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
								<?php
                                	
									
									if(isset($_SESSION["isLog"]) && $_SESSION["isLog"] == 1 && $row[flag]!=0)
									{
										$isLog = $_SESSION["isLog"];
										echo "<li class='pull-left'><a href='checkorder.php'><i class='icon-cog'></i>Check Order</a></li>";
										
									}
								?>
                                

								<li class="pull-left">
									<a href="<?php
											if(isset($_SESSION["isLog"]) && $_SESSION["isLog"] == 1)
											{
												echo "php/logout.php";
											}
											else 
											{
												echo "login.php";	
											}
										?>
                                    
                                    ">
										<i class="icon-off"></i>
										<?php
											
											if(isset($_SESSION["isLog"]) && $_SESSION["isLog"] == 1)
											{
												$isLog = $_SESSION["isLog"];
												echo "Logout";
											}
											else 
											{
												echo "Login";	
											}
										?>
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div> <!--标题栏-->
        
                <div id="breadcrumbs">
                        <ul class="breadcrumb  pull-right">
                             <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn dropdown-toggle"> THE FORM 1 <span class="caret"></span>
                                                    </button>
                                                            <ul class="dropdown-menu dropdown-default">
                                                                <li class="pull-left">
                                                                    <a href="#">Overview</a>
                                                                </li>
                    
                                                                <li class="pull-left">
                                                                    <a href="#">Material</a>
                                                                </li>
                    
                                                                <li class="pull-left">
                                                                    <a href="#">Software</a>
                                                                </li>
                                                                <li class="pull-left">
                                                                    <a href="#">Finishing</a>
                                                                </li>
                                                                <li class="pull-left">
                                                                    <a href="#">Tech specs</a>
                                                                </li>
                                                             </ul>                                 
                                                     <button class="btn">SUPPORT</button>
                                                     <button class="btn" onClick="window.location.href='http://blog.uniz.cc'">BLOG</button>
                                                     <button class="btn">ABORT US </button>
                                                     <button class="btn" onClick="window.location.href='store.php'">STORE</button>
                                                     <button class="btn" onClick="window.location.href='cart.php'"><i class="icon-shopping-cart bigger-120">&nbsp;  Cart</i></button>
                                                </div>		
                        </ul><!--.breadcrumb-->
                    </div><!---->