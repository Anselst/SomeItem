<?php if (!defined('THINK_PATH')) exit(); define('HEADER',2); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>关于本站</title>
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
<div class="about-content">
	 <div class="container">
		 <h2>博客简介</h2>
		 <div class="about-section">
			 <div class="about-grid">
				 <h3>为什么我要创建这个博客?</h3>
				 <p style="text-indent:2em;">这个博客,是我使用thinkphp框架做的第一个项目,也是我使用php做的第一个完整的项目.博客内容是从网络上选取的,如果侵犯了您的权益,请联系我删除.不过你可能并不会发现我用了你的文章,因为我并不准备将博客正式运营.这个项目这是我的一个练手项目,完全是给自己看的,所以不必担心侵权.
				 </p>
				 <p style="text-indent:2em;">上面那段话已经把我要说的说完了,这段话完全是为了凑字数,保持版面完整性,所以你可以忽略他.哦,对了,这个博客只有我能看到,那我为什么还要说呢?因为字数还没有凑够啊,字数不够不好看,我也是很无奈啊.
				 </p>
			 </div>
			 <div class="about-grid2">
				 <h3>WHY YOU SHOULD READ THIS BLOG?</h3>
				 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
				 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
				 versions of Lorem Ipsum.</p>	
				 <ul>
					 <li><a href="#">Always free from repetition</a></li>
					 <li><a href="#">Vestibulum rhoncus nibh quis dui fermentum iaculis.</a></li>
					 <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
					 <li><a href="#">In consequat dolor in lorem egestas ultrices.</a></li>
					 <li><a href="#">Ultrices rhoncus nibh quis dui.</a></li>
				 </ul>	
			 </div>
			 <div class="who-iam">
				 <h3>WHO THE IAM?</h3>
				 <div class="man-info">
					 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
				     <h4>Some facts about me.</h4>  
					 <li>Nullam at turpis a orci pretium pharetra.</li>
					 <li>Curabitur tincidunt purus mollis facilisis placerat.</li>
					 <li>Mauris a nulla ac est tincidunt interdum.</li>
					 <li>Pellentesque vel enim nec urna imperdiet mollis.</li>
					 <li>Integer interdum risus et scelerisque volutpat.</li>
				 </div>
				 <div class="man-pic">
				 <img src="http://127.0.0.1/MyBlog/Application/Home/Public/images/man.jpg" alt=""/>
				 </div>
				 <div class="clearfix"></div>
			 </div>			 
		  </div>		 
	  </div>
</div>
<!---->
<div class="footer">
        <div class="container">
        <p>Copyrights © 2017 Blog WGDZR by LiD|WG </p>
        </div>
</div>