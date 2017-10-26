<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>test</title>
</head>
<body>
    <form action="/MyBlog/index.php/Home/Test/test" method="post" enctype="multipart/form-data">
        <input type="text" name="abc"/>
        <input type="file" name="test" id="up_face" />
        <input type="submit" name="send" />
    </form>
    <img src="<?php echo ($imgurl); ?>" alt="test"/>
</body>
</html>