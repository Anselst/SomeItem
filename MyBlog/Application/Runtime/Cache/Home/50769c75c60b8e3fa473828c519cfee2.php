<?php if (!defined('THINK_PATH')) exit(); define('HEADER',0); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo ($res["title"]); ?></title>

<!---->
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
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/MyBlog/Application/Home/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/MyBlog/Application/Home/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/MyBlog/Application/Home/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
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

<!-- <?php if(is_array($res["test"])): $i = 0; $__LIST__ = $res["test"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><?php echo ($vo); ?></p><?php endforeach; endif; else: echo "" ;endif; ?> -->

<div class="single">
	<div class="container">
		<div class="col-md-8 single-main">				 
			<div class="single-grid">
				<img src="http://127.0.0.1/MyBlog/Application/Home/Public/images/post1.jpg" alt=""/>	
				<div class="post-info">							
				<h4><a href=""><?php echo ($res["title"]); ?></a>-- <?php echo ($res["author"]); ?> <?php echo ($res["date"]); ?></h4>
				</div>
				<?php if(is_array($res["content"])): $i = 0; $__LIST__ = $res["content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p style="font-family:仿宋;font-size:19px;text-indent:2em;margin:0;color:#222"><?php echo ($vo); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="prev">
				<?php if($prev): ?><p><strong>上一篇:</strong>
				<a href="/MyBlog/index.php/Home/Index/single?title=<?php echo ($prev["id"]); ?>"><?php echo ($prev["title"]); ?></a></p>
				<?php else: ?><p><strong>上一篇: 已经到头了</strong></p><?php endif; ?>
			</div>
			<div class="next">
				<?php if($next): ?><p><strong>下一篇:</strong>
				<a href="/MyBlog/index.php/Home/Index/single?title=<?php echo ($next["id"]); ?>"><?php echo ($next["title"]); ?></a></p>
				<?php else: ?><p><strong>下一篇: 已经到头了</strong></p><?php endif; ?>
			</div>				
			<div class="comment">
				<h3>写条评论吧</h3>
				<form action="/MyBlog/index.php/Home/User/comment" method="post">
					<textarea name="comment" class="editor-height" id="editor" cols="30" rows="10"></textarea>							
					<input type="submit" value="评论"/>
				</form>
			</div>
		</div>
		  	<div class="col-md-4 content-right">
        <div class="recent">
            <div class="btn_b">
                <button class="btn1" value="-1"><span>&lt;</span></button>
                <button class="btn2" value="+1"><span>&gt;</span></button>
            </div>
            <div class="tab">
                <table id="tip" cellspacing="0">
                    <tr>
                        <th colspan="7" ><?php echo ($curMonth); ?></th>
                    </tr>
                    <tr class="weak">
                        <td>周日</td>
                        <td>周一</td>
                        <td>周二</td>
                        <td>周三</td>
                        <td>周四</td>
                        <td>周五</td>
                        <td>周六</td>
                    </tr>
                    <?php  $count = 42; for ($i=0;$i<6;$i++){ echo '<tr>'; if($i==0&&$days['prevD']>0){ if($days['prevD']==7){ for($j=0;$j<count($days['prevD']);$j++){ echo '<td class="prev">'; echo $calen[$i][$j]; echo '</td>'; $count--; } } else { for($j=0;$j<$days['prevD'];$j++){ echo '<td class="prev">'; echo $calen[$i][$j]; echo '</td>'; $count--; } for(;$j<7;$j++){ echo '<td class="current">'; echo $calen[$i][$j]; echo '</td>'; $count--; } } } else { if ($count == $days['nextD']){ for($j=0;$j<$count;$j++){ echo '<td class="next">'; echo $calen[$i][$j]; echo '</td>'; } } else { for ($j=0;$j<7;$j++){ echo '<td class="current">'; echo $calen[$i][$j]; echo '</td>'; $count--; } } echo '</tr>'; } } ?>

                </table>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="archives">
            <h3>ARCHIVES</h3>
            <ul>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            </ul>
        </div>
        <div class="categories">
            <h3>CATEGORIES</h3>
            <ul>
            <li><a href="#">Vivamus vestibulum nulla</a></li>
            <li><a href="#">Integer vitae libero ac risus e</a></li>
            <li><a href="#">Vestibulum commo</a></li>
            <li><a href="#">Cras iaculis ultricies</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
     </div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<script>
	window.UEDITOR_HOME_URL = "./Application/Home/Public/ueditor/"
	//实例化编辑器
	var ue = UE.getEditor('editor',{  
                //这里可以选择自己需要的工具按钮名称
                toolbars:[['bold', 'italic', 'underline','|', 'fontfamily','fontsize', '|', 'strikethrough', 'superscript', 'subscript','|','emotion','simpleupload']],
            });
</script>
<!---->
<div class="footer">
        <div class="container">
        <p>Copyrights © 2017 Blog WGDZR by LiD|WG </p>
        </div>
</div>