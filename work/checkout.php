<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>checkout</title>

		
		<?php
			include("form-above.php");
        ?>
                
             <div class="content1">	
             
             	<div class="checkout_head">
                	<div class="checkout_headcontent">
                		<p>You're purchasing this…</p>
                        
                        <div class="row-fluid">
                        	<div class="clearfix">
                        	<?php
							$id=$_SESSION["userid"];
							$sql_cart = mysql_query("select * from buy where userid = '$id'", $mysql);	
							$count=0;
							$_SESSION["sum"]=0;
							while($info=mysql_fetch_array($sql_cart))
							{							
								$sql_goods = mysql_query("select * from goods where id = '$info[goodid]'", $mysql);	
								$good=mysql_fetch_array($sql_goods);		
								$count++;
								$_SESSION["sum"]=$_SESSION["sum"]+$info['num']*$good['value'];
								if($count%3==1 && $count != 1)		
									echo("<div class='checkout_img first'>");
								else
									echo("<div class='checkout_img'>");
								echo("								
                        				<img src='$good[img]' width='50px'>
                    				</div>
                            		<div class='checkout_information'>
                                		<p class='bigger-110'>$good[name]</p>
                                		<p class='grey smaller-90'>$info[num]x $$good[price]</p>
                            		</div>");	
							}
					
						?>
                        </div>
                        </div>
                        <hr class="checkout_color"/>
                        
                        <div class="checkout_sum">
							<p class="bigger-200">total:&nbsp;&nbsp;&nbsp;$<?php $sum=$_SESSION['sum'];echo("$sum");?></p>
                        </div>                        
                    </div>
                </div>
             	
                <div class="checkout_body">
                	<h3 class="text-info">请输入您的收货信息</h3>
                   		 <div class="widget-box">               
                    		<div class="row-fluid">
								<div class="span12">
									<form class="form-horizontal" id="validation-form" method="post" action="php/order.php"> 
                                        
                                        <div class="control-group" style="margin-bottom:10px;">
											<label class="control-label" for="name">姓名:</label>
												<div class="controls">
													<span class="span6">
														<input class="span3" type="text" id="name" name="name"/>
													</span>
												</div>
										</div>

                                            
                                        <div class="control-group" style="margin-bottom:10px;">
											<label class="control-label" for="phone">联系电话:</label>
												<div class="controls">
													<div class="span6 input-prepend">
														<span class="add-on">
															<i class="icon-phone"></i>
														</span>
														<input class="span4" type="tel" id="phone" name="phone"/>
														</div>
												</div>
										</div>
                                        
                                        <div class="control-group" style="margin-bottom:10px;">
											<label class="control-label" for="mail">邮编:</label>
												<div class="controls">
													<div class="span6 input-prepend">
														<span class="add-on">
															<i class="icon-book"></i>
														</span>
														<input class="span4" type="tel" id="mail" name="mail"/>
														</div>
												</div>
										</div>

                                        <div class="control-group" style="margin-bottom:10px;">
											<label class="control-label" for="address">详细地址:</label>
												<div class="controls">
													<span class="span10">
														<input class="span8" type="text" id="address" name="address"/>
													</span>
												</div>
										</div>
                                       
										<div class="hr hr-dotted"></div>
	
										<div class="row-fluid wizard-actions">
											<button class="btn btn-prev" type="reset">
												<i class="icon-refresh"></i>
												重置
											</button>

											<button class="btn btn-info" type="submit" name="submit">
												<i class="icon-edit"></i>
                                                提交	
											</button>
										</div>
                                </form>
                            	</div>	
							</div>	<!--PAGE CONTENT ENDS HERE-->
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
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('999-9999-9999');
				$('#mail').mask('999999');
				
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) ;
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'span',
					errorClass: 'help-inline',
					focusInvalid: false,
					rules: {
						name: {
							required: true
						},
						phone: {
							required: true
						},
						address: {
							required: true
						},
						mail: {
							required: true
						},
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-error', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.control-group').removeClass('info').addClass('error');
					},
			
					success: function (e) {
						$(e).closest('.control-group').removeClass('error').addClass('info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is(':checkbox') || element.is(':radio')) {
							var controls = element.closest('.controls');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl').eq(0));
						} 
						else if(element.is('.chzn-select')) {
							error.insertAfter(element.nextAll('[class*="chzn-container"]').eq(0));
						}
						else error.insertAfter(element);
					},

					invalidHandler: function (form) {
					}
				});
			
			})
		</script>
    
	</body>
</html>
