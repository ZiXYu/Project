<!DOCTYPE html>
<html lang="en">
	<head>
    	
		<meta charset="utf-8" />
		<title>Homepage</title>

		<?php
        	include("form-above.php");
		?>
        
                <div class="content1">               
                	<div class="container-self" id="idTransformView2">
  						<ul class="slider-self slider2-self" id="idSlider2">
    						<li><img src="img/1.jpg"/></li>
    						<li><img src="img/2.jpg"/></li>
    						<li><img src="img/3.jpg"/></li>
                        	<li><img src="img/4.jpg"/></li> 
							<li><img src="img/5.jpg"/></li>                       
  						</ul>
  						<ul class="num-self" id="idNum2">
    						<li>1</li>
    						<li>2</li>
    						<li>3</li>
                       	 	<li>4</li>
                        	<li>5</li>
  						</ul>
					</div>
                    
                	<div class="text_left">
                    	<div class="clearfix">
                			<blockquote class="pull-left">
								<h2>The Precision of Stereolithography</h2>
									<small class="bigger-150">
											<cite title="Source Title">Right on Your Desktop</cite>
									</small>
                        	</blockquote>
                        </div>
                        <h5 class="bigger">The UniZ -  printer  marries high-end stereolithography (SL) technology and a seamless user experience at a price affordable to the professional designer, engineer and maker.</h5>
                    </div>
                    
                	<div class="text_right">
                        <div class="widget-box">
							<div class="widget-header">
								<h4>订阅</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									<form action="http://list.qq.com/cgi-bin/qf_compose_send" target="_blank" method="post">

										<fieldset>
											<label>请填写您的邮件地址，跟踪我们的最新状态：</label>
               								<input type="hidden" name="t" value="qf_booked_feedback"> 
                    						<input type="hidden" name="id" value="0726995f79797dc0386d251b7fbd3dd26b0d2f0be6ecfa5b">
											<input type="text" name="to" id="to" class="email_length"/>
										</fieldset>
                                       
										<div class="form-actions center">
											<input type="submit" class="btn btn-small btn-success" value="Submit"></input>
										</div>
									</form>                                 
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
		var $ = function (id) {
			return "string" == typeof id ? document.getElementById(id) : id;
		};

		var Class = {
  		create: function() {
			return function() {
	  		this.initialize.apply(this, arguments);
			}
  		}
		}

		Object.extend = function(destination, source) {
			for (var property in source) {
				destination[property] = source[property];
			}
			return destination;
		}

		var TransformView = Class.create();
		TransformView.prototype = {
 		 //容器对象,滑动对象,切换参数,切换数量
  		initialize: function(container, slider, parameter, count, options) {
			if(parameter <= 0 || count <= 0) return;
			var oContainer = $(container), oSlider = $(slider), oThis = this;

			this.Index = 0;//当前索引
	
			this._timer = null;//定时器
			this._slider = oSlider;//滑动对象
			this._parameter = parameter;//切换参数
			this._count = count || 0;//切换数量
			this._target = 0;//目标参数
	
			this.SetOptions(options);
	
			this.Up = !!this.options.Up;
			this.Step = Math.abs(this.options.Step);
			this.Time = Math.abs(this.options.Time);
			this.Auto = !!this.options.Auto;
			this.Pause = Math.abs(this.options.Pause);
			this.onStart = this.options.onStart;
			this.onFinish = this.options.onFinish;
	
			oContainer.style.overflow = "hidden";
			oContainer.style.position = "relative";
	
			oSlider.style.position = "absolute";
			oSlider.style.top = oSlider.style.left = 0;
  		},
 		 //设置默认属性
  		SetOptions: function(options) {
			this.options = {//默认值
				Up:			true,//是否向上(否则向左)
				Step:		5,//滑动变化率
				Time:		10,//滑动延时
				Auto:		true,//是否自动转换
				Pause:		2000,//停顿时间(Auto为true时有效)
				onStart:	function(){},//开始转换时执行
				onFinish:	function(){}//完成转换时执行
			};
			Object.extend(this.options, options || {});
  		},
  		//开始切换设置
  		Start: function() {
			if(this.Index < 0){
				this.Index = this._count - 1;
			} else if (this.Index >= this._count){ this.Index = 0; }
	
			this._target = -1 * this._parameter * this.Index;
			this.onStart();
			this.Move();
  		},
 		 //移动
  		Move: function() {
			clearTimeout(this._timer);
			var oThis = this, style = this.Up ? "top" : "left", iNow = parseInt(this._slider.style[style]) || 0, iStep = this.GetStep(this._target, iNow);
	
			if (iStep != 0) {
				this._slider.style[style] = (iNow + iStep) + "px";
				this._timer = setTimeout(function(){ oThis.Move(); }, this.Time);
			} else {
				this._slider.style[style] = this._target + "px";
				this.onFinish();
				if (this.Auto) { this._timer = setTimeout(function(){ oThis.Index++; oThis.Start(); }, this.Pause); }
			}
  		},
  		//获取步长
 		 GetStep: function(iTarget, iNow) {
			var iStep = (iTarget - iNow) / this.Step;
			if (iStep == 0) return 0;
			if (Math.abs(iStep) < 1) return (iStep > 0 ? 1 : -1);
			return iStep;
  		},
  		//停止
  		Stop: function(iTarget, iNow) {
			clearTimeout(this._timer);
			this._slider.style[this.Up ? "top" : "left"] = this._target + "px";
  		}
		};

		window.onload=function(){
			function Each(list, fun){
				for (var i = 0, len = list.length; i < len; i++) { fun(list[i], i); }
			};
	
			var objs2 = $("idNum2").getElementsByTagName("li");
	
			var tv2 = new TransformView("idTransformView2", "idSlider2", 1002, 5, {
				onStart: function(){ Each(objs2, function(o, i){ o.className = tv2.Index == i ? "on" : ""; }) },//按钮样式
				Up: false
			});
	
			tv2.Start();
	
			Each(objs2, function(o, i){
				o.onmouseover = function(){
					o.className = "on";
					tv2.Auto = false;
					tv2.Index = i;
					tv2.Start();
				}
				o.onmouseout = function(){
					o.className = "";
					tv2.Auto = true;
					tv2.Start();
				}
			})
		}
		</script>
	</body>
</html>
