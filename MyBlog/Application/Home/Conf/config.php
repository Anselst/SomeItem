<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'  =>array(
		'__PUBLIC__' => SITE_URL.'Application/Home/Public', // 更改默认的/Public 替换规则
		// '__JS__'     => '/Public/JS/', // 增加新的JS类库路径替换规则     
		// '__UPLOAD__' => '/Uploads' // 增加新的上传路径替换规则
	),
	'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
	'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
	define('__PUBLIC__', SITE_URL.'Application/Home/Public/'),
	define('TEST', './Application/Home/Public/'),
);