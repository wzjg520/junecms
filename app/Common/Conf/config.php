<?php
define(PREV_URL,@$_SERVER['HTTP_REFERER']);
return array(
	//'配置项'=>'配置值'
		'show_page_trace'=>true,
		//数据库配置
		'DB_TYPE'=>'pdo',
		'DB_USER'=>'root',
		'DB_PWD'=>'ABC201314',
		'DB_PREFIX'=>'june_',
		'DB_DSN'=>'mysql:host=localhost;dbname=junecms;charset=UTF-8',
		'DB_CHARSET'=>  'utf8',
		
		
		//视图设置
		'TMPL_TEMPLATE_SUFFIX'=>'.tpl',
		//默认主题
		'DEFAULT_THEME'=>'default',
		
		//加载用户函数
		'LOAD_EXT_FILE' => 'func.tool',
		//重写模式
		'URL_MODEL'=>2,
		
);