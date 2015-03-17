<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>checkorder</title>

		
		<?php
			include("form-above.php");
        ?>
                
             <div class="content1">	
             	<div class="checkorder_head">
                	<div class="row-fluid">
                    	<div class="span6">
                            <h3 class="blue">
								所有未完成订单内容如下：
							</h3>
                        </div>
                        <div class="checkorder_search">
                        	<div class="pull-right">
										<div class="widget-main">
												<form class="form-search" action="checkorder.php?flag=1" method="post">
													<input type="text" class="input-medium search-query" name="search" id="search"/>
													<button value="submit" class="btn btn-info btn-small">
														Search
														<i class="icon-search icon-on-right bigger-110"></i>
													</button>
												</form>
											</div>
                         	</div>
						</div>				
                </div>
             	<div class="checkorder_body">
             		<table id="table_bug_report" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center" width="50px">序号</th>
                                            <th width="150px">订单号</th>
											<th width="100px">收件人</th>
											<th>地址</th>
                                            <th width="150px">运单号</th>
                                            <th width="40px" class="center">编辑</th>
										</tr>
									</thead>
                                    <tbody>
										<?php
											$flag=$_GET["flag"];
											$search=$_POST["search"];
											if($flag && $search != "")
												$sql = mysql_query("select * from indent where name = '$search'", $mysql);
											else	
												$sql = mysql_query("select * from indent where stateflag != 3", $mysql);
											$count=0;	
											$_SESSION["flag"]=0;
											while($info=mysql_fetch_array($sql))
											{		
												$count++;	
												echo("
										<tr>	
											<td class='center'>$count</td>
											<td>$info[orderid]</td>
											<td>$info[name]</td>
											<td>$info[address]</td>
											<td>$info[waybillid]</td>
                                            
											<td class='center'>
												<div class='inline position-relative'>
										
													<button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown' >
														<i class='icon-cog icon-only bigger-110'></i>
													</button>
													
													<ul class='dropdown-menu dropdown-icon-only dropdown-light pull-right dropdown-caret dropdown-close'>
														<li>
															<a href='./edit.php?edit_id=$info[orderid]' class='tooltip-success' data-rel='tooltip' title='Edit' data-placement='left'>
															
																<span class='green'>
																	<i class='icon-edit'></i>
																</span>
															</a>
														</li>

														<li>
															<a href='#' class='tooltip-error' data-rel='tooltip' title='Delete' data-placement='left' onClick='delconfirm($info[orderid])'>
																<span class='red'>
																	<i class='icon-trash'></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>");
											}
										?>
											
                                     </tbody>
								</table>
             	</div>
             </div>  
             
              
             
             <div class="content2">
             	<p>© Copyright 2012-2013 WWW.UniZ.CC, All Rights Reserved. </p>
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cdiv id='cnzz_stat_icon_1000016819'%3E%3C/div%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000016819%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
             </div>     	      
    </div>  
    <!--basic scripts-->
     <script type="text/javascript">
	function delconfirm(x){
		if(window.confirm('您确定删除此项吗？')==true){
				window.location.href="del.php?del_id="+x;
		}
	}
	</script>
	<?php
    	include("form-under.php");
	?>
    
	</body>
</html>
