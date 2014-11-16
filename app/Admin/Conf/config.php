<?php
return array(
		//设置路径变量
		'TMPL_PARSE_STRING'  =>array(
				'__PUBLIC__'=> __ROOT__.'/Public/'.MODULE_NAME.'/',
				'__JS__' => __ROOT__.'/Public/'.MODULE_NAME.'/js/',
				'__STYLE__' => __ROOT__.'/Public/'.MODULE_NAME.'/style/',
				'__IMAGES__'=>__ROOT__.'/Public/'.MODULE_NAME.'/images/',
		),
		//过滤模型
		'MODEL_FILTER' => array('Manage','Model','Level','Nav','Public'),
		'FILE_UPLOAD'=>array(
				'maxSize'=>3145728,
				'rootPath'=>'Uploads/',  
				'saveName'=>array('uniqid',time()),
				'exts'    =>array('jpg', 'gif', 'png', 'jpeg'),    
				'autoSub' =>true,    
				'subName' =>array('date','Ymd'),
		),
);