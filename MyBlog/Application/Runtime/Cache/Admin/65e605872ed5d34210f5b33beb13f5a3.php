<?php if (!defined('THINK_PATH')) exit(); define('HEADER','2'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台管理系统</title>
	<!-- 导入字符集样式表和脚本文件 -->
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
<script src="http://127.0.0.1/MyBlog/Application/Admin/Public/js/common.js"></script>
<link rel="stylesheet" href="http://127.0.0.1/MyBlog/Application/Admin/Public/css/style.css" type="text/css" media="all" />
<script src="http://127.0.0.1/MyBlog/Application/Admin/Public/ueditor/ueditor.config.js"></script>
<script src="http://127.0.0.1/MyBlog/Application/Admin/Public/ueditor/ueditor.all.js"></script>
<script src="http://127.0.0.1/MyBlog/Application/Admin/Public/ueditor/zh-cn/zh-cn.js"></script>
	<!--  -->
</head>
<body>
<!-- Header -->
<div id="header">
        <div class="shell">
            <!-- Logo + Top Nav -->
            <div id="top">
                <h1><a href="#">SpringTime</a></h1>
                <div id="top-navigation" >
                    欢迎 <a href="#" ><strong>Adminstartor</strong></a>
                    <span>|</span>
                    <a href="#">帮助</a>
                    <span>|</span>
                    <a href="#">管理设置</a>
                    <span>|</span>
                    <a href="#">退出</a>
                </div>
            </div>
            <!-- End Logo + Top Nav -->
            
            <!-- Main Nav -->
            <div id="navigation">
                <ul>
                    <li><a href="/MyBlog/index.php/Admin/Index/" <?php if (HEADER==0)echo 'class="active"'; ?> ><span>主控页面</span></a></li>
                    <li><a href="/MyBlog/index.php/Admin/Index/add" <?php if (HEADER==1)echo 'class="active"'; ?> ><span>
<?php if($_GET['id']){echo '修改文章';}else{echo '新建文章';} ?></span></a></li>
                    <li><a href="/MyBlog/index.php/Admin/User" <?php if (HEADER==2)echo 'class="active"'; ?>><span>用户管理</span></a></li>
                    <li><a href="#" class=""><span>图片管理</span></a></li>
                    <li><a href="#" class=""><span>Products</span></a></li>
                    <li><a href="#" class=""><span>Services Control</span></a></li>
                </ul>
            </div>
            <!-- End Main Nav -->
        </div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">

		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">主控页面</a>
			<span>&gt;</span>
			用户管理
		</div>
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">用户管理</h2>
						<div class="right">
							<form action="" method="post">
							<input type="hidden" name="ts" value="submit"/>							
							<label>用户名查找</label>
							<input type="text" class="field small-field" name="search" />
							<input type="submit" class="button" value="搜索" />
							</form>
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>用户名</th>
								<th>头像</th>
								<th>性别</th>
								<th>权限</th>
								<th width="110" class="ac">操作</th>
							</tr>
							<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td class="abcde"><h3><a href="#" id="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></h3></td>
								<td><?php echo ($vo["date"]); ?></td>
								<td><a href="#"><?php echo ($vo["author"]); ?></a></td>
								<td><a href="/MyBlog/index.php/Admin/User/del?id=<?php echo ($vo["id"]); ?>" class="ico del" onclick="return confirm('你要删除这篇文章么?');">删除</a><a href="/MyBlog/index.php/Admin/User/add?id=<?php echo ($vo["id"]); ?>" class="ico edit">修改</a></td>
							</tr>
							<tr class="hide-tr" id="tr<?php echo ($vo["id"]); ?>">
								<td colspan="5"><?php echo (msubstr($vo["content"],0,200)); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
						
						
						<!-- Pagging -->
						<div class="pagging">
								<?php echo ($page); ?>
						</div>
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Management</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<a href="/MyBlog/index.php/Admin/User/add" class="add-button"><span>添加新的文章</span></a>
						<div class="cl">&nbsp;</div>
						
						<p class="select-all"><input type="checkbox" class="checkbox" /><label>select all</label></p>
						<p><a href="#">删除 Selected</a></p>
						
						<!-- Sort -->
						<div class="sort">
							<label>排序方式</label>
							<select class="field">
								<option value="">标题</option>
							</select>
							<select class="field">
								<option value="">日期</option>
							</select>
							<select class="field">
								<option value="">作者</option>
							</select>
						</div>
						<!-- End Sort -->
						
					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<!-- Footer -->
<div id="footer">
        <div class="shell">
            <span style="text-align:center;">&copy; 2017 - WGDZR</span>
            <span style="text-align:center;">
            LiD - WG
            </span>
        </div>
</div>
<!-- End Footer -->
<!-- End Footer -->
	
</body>
</html>