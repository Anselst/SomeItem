<?php if (!defined('THINK_PATH')) exit(); define('HEADER',3); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>MyBlog--登录</title>
<!-- 引入脚本和css -->
<link href="http://127.0.0.1/MyBlog/Application/Home/Public/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="http://127.0.0.1/MyBlog/Application/Home/Public/css/style.css" rel='stylesheet' type='text/css' />
<link href="http://127.0.0.1/MyBlog/Application/Home/Public/css/calen_style.css" rel='stylesheet' type='text/css' />
<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--script-->
<script type="text/javascript" src="http://127.0.0.1/MyBlog/Application/Home/Public/js/move-top.js"></script>
<script type="text/javascript" src="http://127.0.0.1/MyBlog/Application/Home/Public/js/easing.js"></script>
<script src="http://127.0.0.1/MyBlog/Application/Home/Public/js/common.js"></script>
<!--/script-->
<script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
</script>

</head>
<body>
<!---header-->
<?php  $username=$login['username']; ?>
<div class="header">  
	<div class="container">
		<div class="logo">
			<a href="index.html"><img src="http://127.0.0.1/MyBlog/Application/Home/Public/images/logo.jpg" title="" /></a>
		</div>
			<!---start-top-nav-->
			<div class="top-menu">
				<!-- 搜索表单,挺简单的,等用户中心做完后在做这个 -->
				<div class="search">
					<form>
						<input type="text" placeholder="" required="">
						<input type="submit" value=""/>
					</form>
				</div>
				<!-- 顶部菜单,如果用户已经登录则不显示登录和注册项,显示个人中心 -->
				<span class="menu"> </span>
					<ul>
						<li <?php if(defined('HEADER')&&HEADER==1){echo 'class="active"';} ?>><a href="/MyBlog/index.php/Home/Index">主页</a></li>		
						<li <?php if(defined('HEADER')&&HEADER==2){echo 'class="active"';} ?>><a href="/MyBlog/index.php/Home/Index/about">关于</a></li>
						<?php if(!$username){echo "<li ";if(defined('HEADER')&&HEADER==3){echo 'class="active"';}echo '><a href="/MyBlog/index.php/Home/Index/login" style="margin:auto 0 auto auto">登录</a></li>';} ?>
						<?php if(!$username){echo "<li>|</li>";}else{echo '<li><a href="/MyBlog/index.php/Home/User">个人中心</a></li>';} ?>
						<?php if(!$username){echo "<li ";if(defined('HEADER')&&HEADER==4){echo 'class="active"';}echo '><a href="/MyBlog/index.php/Home/Index/reg">注册</a></li>';} ?>
						<!-- <div class="clearfix"> </div> -->
					</ul>
			</div>
			<div class="login">
					<!-- 判断该用户是否选择了头像,未选择使用默认头像 -->
					<?php if(defined('HEADER')&&HEADER==1){ $hello = '欢迎回来,'; } if($username){ if($login['face']){ $face = $login['face']; $image = "<img src=\"http://127.0.0.1/MyBlog/Application/Home/Public/$face\" />"; } else { $image = "<img src=\"http://127.0.0.1/MyBlog/Application/Home/Public/images/avatar.png\" />"; } echo "<p>$hello<a href=\"/MyBlog/index.php/Home/User\">$username!$image</a> - <a href=\"/MyBlog/index.php/Home/User/logout\">退出</a></p>"; } ?>	  
				</div>
			<div class="clearfix"></div>
				<script>
				$("span.menu").click(function(){
				$(".top-menu ul").slideToggle("slow" , function(){
				});
				});
				</script>
			<!---//End-top-nav-->					
	</div>
</div>
<!--/header-->
<div class="contact-content">
	<div class="container">
		<div class="contact-info">
			<h2 style="text-align:center">登录你的账号</h2>
		</div>
		<div class="contact-details">				 
			<form action="/MyBlog/index.php/Home/Index/login_vali" method="POST">
				<input type="text" placeholder="用户名" name="username" required/>
				<input type="password" placeholder="密码" name="psw" required/>
				<input type="text" style="width:20%;display:inline;" placeholder="验证码" name="yzm" required/>
				<img src="/MyBlog/index.php/Home/Index/yzm" class="yzm" alt="">
				<input type="submit" value="登录"/>
			</form>
	  	</div>
	</div>
</div>
<!---->
<div class="footer">
        <div class="container">
        <p>Copyrights © 2017 Blog WGDZR by LiD|WG </p>
        </div>
</div>