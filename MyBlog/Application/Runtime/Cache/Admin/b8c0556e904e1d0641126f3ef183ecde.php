<?php if (!defined('THINK_PATH')) exit(); define('HEADER','1'); ?>
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
			文章管理
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->		
		<!-- <div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div> -->
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<!-- <div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div> -->
		<!-- End Message Error -->
		<br />
        <!-- Main -->
        <p id="error"></p>
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
                                        <span class="req pan">最多50个字</span>
                                        <label><span class="pan">*</span>文章标题 <span class="pan">(Required Field)</span></label>
                                        <input type="text" class="field size4" name="title" value="<?php echo ($res["title"]); ?>"/>
                                    </p>
                                    <p class="inline-field">
                                            <span class="req pan">最多20个字</span>
                                            <label class="">作者<span class="pan"> (Required Field)</span>
                                                <span class="from">来源<span> (Required Field)</span></span>
                                            </label>
                                            <input type="text" class="field size5" name="author" value="<?php echo ($res["author"]); ?>"/>
                                            <input type="text" class="field size5" name="con_from" value="<?php echo ($res["con_from"]); ?>"/>
                                    </p>	
                                    <!-- <p class="inline-field">
                                        <label>日期</label>
                                        <select class="field size2">
                                        <?php $__FOR_START_1615__=1;$__FOR_END_1615__=32;for($i=$__FOR_START_1615__;$i < $__FOR_END_1615__;$i+=1){ ?><option value=""><?php echo ($i); ?>日</option><?php } ?>
                                        </select>
                                        <select class="field size3">
                                        <?php $__FOR_START_29148__=1;$__FOR_END_29148__=13;for($i=$__FOR_START_29148__;$i < $__FOR_END_29148__;$i+=1){ ?><option value=""><?php echo ($i); ?>月</option><?php } ?>
                                        </select>
                                        <select class="field size3">
                                        <?php $__FOR_START_13029__=2017;$__FOR_END_13029__=2019;for($i=$__FOR_START_13029__;$i < $__FOR_END_13029__;$i+=1){ ?><option value=""><?php echo ($i); ?>年</option><?php } ?>
                                        </select>
                                    </p> -->
                                    
                                    <p class="text-height">
                                        <label><span class="pan">*</span>内容 <span class="pan">(Required Field)</span></label>
                                        <textarea name="content" class="editor-height" id="editor" cols="30" rows="10"><?php echo ($res["content"]); ?></textarea>
                                        <!-- <textarea class="field size4" rows="10" cols="30" name="content" id="content-t" wrap="Virtual"><?php echo ($res["content"]); ?></textarea> -->
                                    </p>	
                                
                            </div>
                            <!-- End Form -->
                            
                            <!-- Form Buttons -->
                            <div class="buttons">
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
<script>
    var ue = UE.getEditor('editor',{  
                //这里可以选择自己需要的工具按钮名称
                toolbars:[['FullScreen','Source','|', 'Undo', 'Redo','|','bold', 'italic', 'underline','|', 'fontfamily','fontsize', '|', 'date', 'time', '|', 'strikethrough', 'superscript', 'subscript',]], 
                enterTag:'br',
            });
    window.UEDITOR_HOME_URL = "./Application/Admin/Public/ueditor/"
            
</script>
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