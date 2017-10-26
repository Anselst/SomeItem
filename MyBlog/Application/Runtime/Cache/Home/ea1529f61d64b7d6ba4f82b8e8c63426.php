<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<link rel="stylesheet" href="http://127.0.0.1/MyBlog/Application/Home/Public/css/face.css">
<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script src="http://127.0.0.1/MyBlog/Application/Home/Public/js/common.js"></script>
</head>
<body>
    <div id="face">
    <?php for($i=1;$i<10;$i++){echo "<img src=\"http://127.0.0.1/MyBlog/Application/Home/Public/images/face0$i.png\" class=\"face\" name=\"face0$i\" alt=\"头像\" />";} for($i=1;$i<7;$i++){echo "<img src=\"http://127.0.0.1/MyBlog/Application/Home/Public/images/face1$i.png\" class=\"face\" name=\"face1$i\" alt=\"头像\" />";} ?>
    </div>
</body>
</html>