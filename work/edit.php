<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>edit</title>

		
		<?php
			include("form-above.php");
        ?>
        
        <?php
        	$edit_id=$_GET["edit_id"];
			$edit_goodid=$_GET["edit_goodid"];
			$flag=$_GET["flag"];
			$name=$_POST["name"];
			$phone=$_POST["phone"];
			$address=$_POST["address"];
			$mail=$_POST["mail"];
			$waybillid=$_POST["waybillid"];
			$stateflag=$_POST["state"];
			$bodyid=$_POST["bodyid"];
			$query=mysql_query("update indent set name='$name',phone='$phone',address='$address',mail='$mail',waybillid='$waybillid' ,stateflag='$stateflag' where orderid='$edit_id'");
			if($bodyid!='')
				$query=mysql_query("update ordergoods set bodyid='$bodyid' where id='$edit_goodid'");
			$sql_edit = mysql_query("select * from indent where orderid = '$edit_id'", $mysql);
			$edit=mysql_fetch_array($sql_edit);
		?>
                
             <div class="content1">	
             	<div class="edit_head">
                            <h3 class="blue">
								您查看的订单详细信息如下：
							</h3>		
                </div>
                <div class="edit_body">
             			<form class="form-horizontal" id="validation-form" method="post" action="edit.php?edit_id=<?php echo "$edit_id&flag=0"; if($edit_goodid!=0) echo "&edit_goodid=$edit_goodid"; ?>">                            
                                        <div class="control-group" style="margin-bottom:10px;">
											<label class="control-label" for="name">姓名:</label>
												<div class="controls">
													<span class="span6">
														<input class="span2" type="text" id="name" name="name" value="<?php echo "$edit[name]"?>"/>
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
														<input class="span2" type="tel" id="phone" name="phone" value="<?php echo "$edit[phone]"?>"/>
														</div>
												</div>
										</div>
                                        
                                        <div class="control-group" style="margin-bottom:10px;">
											<label class="control-label" for="mail">邮编:</label>
												<div class="controls">
													<div class="span4 input-prepend">
														<span class="add-on">
															<i class="icon-book"></i>
														</span>
														<input class="span2" type="tel" id="mail" name="mail" value="<?php echo "$edit[mail]"?>"/>
														</div>
												</div>
										</div>

                                        <div class="control-group" style="margin-bottom:10px;">
											<label class="control-label" for="address">详细地址:</label>
												<div class="controls">
													<span class="span6">
														<input class="span3" type="text" id="address" name="address" value="<?php echo "$edit[address]"?>"/>
													</span>
												</div>
										</div>
                                        
                                        <div class="control-group" style="margin-bottom:10px;">
											<label class="control-label" for="waybillid">运单号:</label>
												<div class="controls">
													<span class="span6">
														<input class="span3" type="text" id="waybillid" name="waybillid" value="<?php echo "$edit[waybillid]"?>"/>
													</span>
												</div>
										</div>
                                       
                                       <div class="control-group">
																<label class="control-label" for="state">订单状态:</label>

																<div class="controls">
																	<span class="span12">
																		<select class="span2" id="state" name="state">
																			<option value="">------------------</option>
																			<option value=0 <?php if("$edit[stateflag]"=="0") echo "selected"?>>未付款</option>
																			<option value=1 <?php if("$edit[stateflag]"=="1") echo "selected"?>>已付款，未发货</option>
																			<option value=2 <?php if("$edit[stateflag]"=="2") echo "selected"?>>已发货</option>
																			<option value=3 <?php if("$edit[stateflag]"=="3") echo "selected"?>>已确认收货</option>
																		</select>
																	</span>
																</div>
											</div>
                                       
										<div class="hr hr-dotted"></div>
                    
                    <table id="table_bug_report" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center" width="50px">序号</th>
                                            <th width="250px">商品名</th>
                                            <th width="50px">数量</th>
											<th>机器编号</th>
                                            <th width="50px" class="center">编辑</th>
										</tr>
									</thead>
                                    <tbody>
										<?php
											$sql = mysql_query("select * from ordergoods where orderid = '$edit_id'", $mysql);
											$count=0;
											while($info=mysql_fetch_array($sql))
											{		
												$count++;	
												echo("
										<tr>	
											<td class='center'>$count</td>
											<td>$info[goodname]</td>
											<td>$info[num]</td>
											<td>");
												if($edit_goodid==$info[id]&&$flag==1)
													echo("<input style='width:450px' type='text' id='bodyid' name='bodyid' value='$info[bodyid]'/>");
												else
													echo("$info[bodyid]");
											
											echo("
											</td>
                                            
											<td class='center'>
													
															<a href='./edit.php?edit_id=$info[orderid]&edit_goodid=$info[id]&flag=1' class='tooltip-success' data-rel='tooltip' title='Edit' data-placement='left'>
															
																<span class='green'>
																	<i class='icon-edit'></i>
																</span>
															</a>
														
											</td>
										</tr>");
											}
										?>
											
                                     </tbody>
								</table>
                                
                                <div class="row-fluid wizard-actions">
											<button class="btn btn-prev" type="button" onClick="window.location.href='checkorder.php'">
												<i class="icon-arrow-left"></i>
												返回
											</button>

											<button class="btn btn-info" type="submit" name="submit">
												<i class="icon-edit"></i>
                                                提交	
											</button>
										</div>
                                </form>
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
	function delconfirm(x){
		if(window.confirm('您确定删除此项吗？')==true){
				window.location.href="del.php?del_id="+x;
		}
	}
	</script>
    
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
						state: {
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
