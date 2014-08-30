<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>修改模板</title>
<script type="text/javascript" src="__PUBLIC__easyui/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__easyui/jquery.easyui.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/locale/easyui-lang-zh_CN.js"> 
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="__STYLE__basic.css">
<link rel="stylesheet" type="text/css" href="__STYLE__edit.css">
<script type="text/javascript" src="__PUBLIC__js/edit.js"></script> 
<script type="text/javascript" src="__PUBLIC__js/model_eidt.js"></script>
</head>
<body>
<h2><a href="{:U('Model/index')}">返回上一级</a>模板 -- 修改模板</h2>
<form method="post" id="public">
	<dl class="edit">
		<dd>模板名：<input type="text" name="name" class="text" value="{$model.name}"/></dd>
		<dd>附加表：<input type="text" name="tablename" class="text" value="{$model.tablename}"/></dd>
		<dd>列表模板：</dd>
	</dl>
</form>
</body>
</html>