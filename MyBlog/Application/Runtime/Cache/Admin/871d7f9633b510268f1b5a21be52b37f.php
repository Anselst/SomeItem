<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>后台管理系统</title>
	<link rel="stylesheet" href="http://127.0.0.1/MyBlog/Application/Admin/Public/css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<!-- Header -->
<div id="header">
        <div class="shell">
            <!-- Logo + Top Nav -->
            <div id="top">
                <h1><a href="#">SpringTime</a></h1>
                <div id="top-navigation">
                    欢迎 <a href="#"><strong>Adminstartor</strong></a>
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
                    <li><a href="#" class="active"><span>Dashboard</span></a></li>
                    <li><a href="#"><span>New Articles</span></a></li>
                    <li><a href="#"><span>User Management</span></a></li>
                    <li><a href="#"><span>Photo Gallery</span></a></li>
                    <li><a href="#"><span>Products</span></a></li>
                    <li><a href="#"><span>Services Control</span></a></li>
                </ul>
            </div>
            <!-- End Main Nav -->
        </div>
    </div>
    <!-- End Header -->
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			文章管理
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->		
		<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			<!-- Content -->
                <div id="content-add">
                    <!-- Box -->
                    <div class="box">
                        <!-- Box Head -->
                        <div class="box-head">
                            <h2>添加新的文章</h2>
                        </div>
                        <!-- End Box Head -->
                        
                        <form action="" method="post">
                            
                            <!-- Form -->
                            <div class="form">
                                    <p>
                                        <span class="req">最多50个字</span>
                                        <label>文章标题 <span>(Required Field)</span></label>
                                        <input type="text" class="field size4" />
                                    </p>
                                    <p>
                                            <span class="req">最多20个字</span>
                                            <label>作者<span>(Required Field)</span></label>
                                            <input type="text" class="field size4" />
                                    </p>	
                                    <!-- <p class="inline-field">
                                        <label>日期</label>
                                        <select class="field size2">
                                        <?php $__FOR_START_21731__=1;$__FOR_END_21731__=32;for($i=$__FOR_START_21731__;$i < $__FOR_END_21731__;$i+=1){ ?><option value=""><?php echo ($i); ?>日</option><?php } ?>
                                        </select>
                                        <select class="field size3">
                                        <?php $__FOR_START_32480__=1;$__FOR_END_32480__=13;for($i=$__FOR_START_32480__;$i < $__FOR_END_32480__;$i+=1){ ?><option value=""><?php echo ($i); ?>月</option><?php } ?>
                                        </select>
                                        <select class="field size3">
                                        <?php $__FOR_START_30105__=2017;$__FOR_END_30105__=2019;for($i=$__FOR_START_30105__;$i < $__FOR_END_30105__;$i+=1){ ?><option value=""><?php echo ($i); ?>年</option><?php } ?>
                                        </select>
                                    </p> -->
                                    
                                    <p>
                                        <span class="req">max 100 symbols</span>
                                        <label>内容 <span>(Required Field)</span></label>
                                        <textarea class="field size4" rows="10" cols="30" ></textarea>
                                    </p>	
                                
                            </div>
                            <!-- End Form -->
                            
                            <!-- Form Buttons -->
                            <div class="buttons">
                                <input type="button" class="button" value="清空" />
                                <input type="submit" class="button" value="提交" />
                            </div>
                            <!-- End Form Buttons -->
                        </form>
                    </div>
                    <!-- End Box -->
                </div>
        </div>
    </div>
    <!-- End Container -->
</div>

<!-- Footer -->
<!-- Footer -->
<div id="footer">
        <div class="shell">
            <span class="left">&copy; 2010 - CompanyName</span>
            <span class="right">
            第三方
            </span>
        </div>
</div>
<!-- End Footer -->
<!-- End Footer -->
        
</body>
</html>