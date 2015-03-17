<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Cart</title>

		<body onload="upperMe1()">
		<?php
			include("form-above.php");
        ?>
                
             <div class="content1">	
             	<div class="cart_total">
                	<div class="cart_head">
						<h1 class="blue">
							Shopping cart
						</h1>
                    </div>
                    <div class="cart_head">
                        <h5 class="grey">
                        	Please review the items in your cart, then proceed to checkout.
                        </h5>
                        <p></p>
                    </div>
                    
                    <hr />
                    
                    <div class="cart_body">
                        <?php
							$id=$_SESSION["userid"];
							$sql_cart = mysql_query("select * from buy where userid = '$id'", $mysql);	
							
							while($info=mysql_fetch_array($sql_cart))
							{							
								$sql_goods = mysql_query("select * from goods where id = '$info[goodid]'", $mysql);	
								$good=mysql_fetch_array($sql_goods);				
								echo("
								<div class='clearfix'>
									<div class='row-fluid'>
									
                        				<div class='cart_img'>
                    						<img src='$good[img]' width='97px'>
                           				 </div>
										 
										 <div class='cart_information'>
                            				<p class='text-info bigger-125'>$good[name]</p>
                               				<p class='grey smaller-90'>$$good[price]</p>
                                			<p>Ships immediately</p>
                           				 </div>
										 
										 <div class='cart_num'>
                            				<input type='text' class='input-mini' id='spinner$good[id]' onChange='upperMe1()'/>
                            			</div>
								
										<div class='cart_value'>
                            				<p class='text-info bigger-150' id='output$good[id]'></p>
                           				</div>
								</div>
								");	
							}
					
						?>
                        
                       
                        <div class="cart_hr"><hr /></div>
                       
                        <div class="cart_sum">
                            	<p class="text-info bigger-150" id="sum"></p>
                        </div>
                        
                       	<div class="cart_button">
                        		<button class="btn btn-small" onClick="window.location.href='store.php'">
										<i class="icon-arrow-left"></i>
										Continue Shopping
								</button>
                                
                                <button class="btn btn-small btn-info" onClick="window.location.href='checkout.php'">
										Proceed to Checkout
                                        <i class="icon-arrow-right icon-on-right"></i>
								</button>
                        </div>
                    </div>
				</div>
             </div>  
            </div>
              
             
             <div class="content2">
             	<p>© Copyright 2012-2013 WWW.UniZ.CC, All Rights Reserved. </p>
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cdiv id='cnzz_stat_icon_1000016819'%3E%3C/div%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000016819%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
             </div>     	      
    </div>  
    <!--basic scripts-->
    
	<?php
    	include("form-under.php");
	?>
    
    <script type="text/javascript">
			
			$(function() {
				<?php
					$id=$_SESSION["userid"];
							$sql_cart = mysql_query("select * from buy where userid = '$id'", $mysql);	
							
							while($info=mysql_fetch_array($sql_cart))
							{							
								$sql_goods = mysql_query("select * from goods where id = '$info[goodid]'", $mysql);	
								$good=mysql_fetch_array($sql_goods);		
								echo("$('#spinner$good[id]').ace_spinner({value:$info[num],min:0,max:999,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'});");
							
							}
				?>
			});
	
			function upperMe1(){
				i=0;
				sum=0;
				<?php
							$id=$_SESSION["userid"];
							$sql_cart = mysql_query("select * from buy where userid = '$id'", $mysql);	
							while($info=mysql_fetch_array($sql_cart))
							{		
								$sql_goods = mysql_query("select * from goods where id = '$info[goodid]'", $mysql);	
								$good=mysql_fetch_array($sql_goods);		
								echo("
									i = document.getElementById('spinner$good[id]').value;
									sum = sum + i * $good[value];
									document.getElementById('output$good[id]').innerHTML = '$' + i * $good[value];
									var xmlhttp;
									if (window.XMLHttpRequest)
  									{// code for IE7+, Firefox, Chrome, Opera, Safari
  										xmlhttp=new XMLHttpRequest();
 									}
									else
  									{// code for IE6, IE5
  										xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
  									}
									xmlhttp.open('GET','php/editcart.php?num='+i+'&buy_goodid='+$info[goodid],true);
									xmlhttp.send();
								");
							}
				
				?>
				document.getElementById("sum").innerHTML = "$"+ sum;
			}

		</script>
	</body>
</html>
