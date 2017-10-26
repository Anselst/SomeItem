<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title>MyBlog--个人中心</title>
        <!-- 载入公共脚本和css -->
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
        <script src="http://127.0.0.1/MyBlog/Application/Home/Public/js/register.js"></script>
        <link type="text/css" rel="stylesheet" href="http://127.0.0.1/MyBlog/Application/Home/Public/css/update_user.css" />
    </head>
    <body>        
    <!-- 载入header -->
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
						<?php if(!$username){echo "<li ";if(defined('HEADER')&&HEADER==3){echo 'class="active"';}echo '><a href="/MyBlog/index.php/Home/User/login" style="margin:auto 0 auto auto">登录</a></li>';} ?>
						<?php if(!$username){echo "<li>|</li>";}else{echo '<li><a href="/MyBlog/index.php/Home/User">个人中心</a></li>';} ?>
						<?php if(!$username){echo "<li ";if(defined('HEADER')&&HEADER==4){echo 'class="active"';}echo '><a href="/MyBlog/index.php/Home/User/reg">注册</a></li>';} ?>
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
    <div class="main">
        <div class="user">
            <form action="" method="post">
                <input type="hidden" value="<?php echo ($login["user_id"]); ?>" name="id" />
                <table border="0">
                    <tr>
                        <th>修改用户名:</th> 
                        <td><input type="text" value="<?php echo ($login["username"]); ?>" placeholder="用户名" name="username"></td>
                        <td><span id="un_tip"></span></td>
                    </tr>
                    <tr>
                        <th>修改头像:</th>
                        <td><img src="http://127.0.0.1/MyBlog/Application/Home/Public/<?php echo ($login["face"]); ?>" alt="头像"/></td>
                        <td><input type="file" name="face" id="" value="修改头像"></td>
                    </tr>
                    <tr>
                        <th>手机号码:</th>
                        <td><input type="text" name="phone" placeholder="手机号码" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>邮箱:</th>
                        <td><input type="text" name="email" placeholder="邮箱" value="<?php echo ($login["email"]); ?>" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>QQ:</th>
                        <td><input type="text" name="qq" placeholder="QQ" /></td>
                        <td></td>
                    </tr>
                </table>
                <input type="submit" name="send" class="submit" value="修改"/>
            </form>
        </div>
    </div>
    <!-- 载入footer -->
    <div class="footer">
        <div class="container">
        <p>Copyrights © 2017 Blog WGDZR by LiD|WG </p>
        </div>
</div>
    </body>

</html>