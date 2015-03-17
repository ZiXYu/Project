<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>store</title>

		
		<?php
			include("form-above.php");
        ?>
                
             <div class="content1">	
             	<?php
					$sql = mysql_query("select * from goods where id IS NOT NULL", $mysql);
					$count=0;					
					while($info=mysql_fetch_array($sql))
					{														
						$count++;
						if($count%3==1 && $count != 1)
							echo("<div class='total_div_first'>");
						else
							echo("<div class='total_div'>");
						echo("
                				<img src='$info[img]' class='240'>
                   					 <div class='text_div'>
                    					<p class='text-success bigger-110'>$info[name]</p>
                        				<p>$$info[price]</p>
                        				<p class='muted text_div'>$info[profile]</p>
                        				<p>$info[others]</p>
                        				<button class='btn btn-small' onClick=\"window.location.href='php/addcart.php?goodid=$info[id]'\">
										<i class='icon-shopping-cart bigger-110'> Add to Cart</i>
										</button>
                    				</div>
               					</div>");
					}
				?>
             	
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
    
	</body>
</html>
