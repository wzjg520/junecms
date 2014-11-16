<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加栏目</title>
</head>
<script type="text/javascript" src="__PUBLIC__easyui/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__easyui/jquery.easyui.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/locale/easyui-lang-zh_CN.js"> 
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="__STYLE__basic.css">
<link rel="stylesheet" type="text/css" href="__STYLE__edit.css">
<link rel="stylesheet" type="text/css" href="__STYLE__nav.css">
<script type="text/javascript" src="__PUBLIC__js/edit.js"></script>
<script type="text/javascript" src="__PUBLIC__js/jquery.validate.js"></script>
<script type="text/javascript" src="__PUBLIC__js/nav_edit.js"></script>
<script type="text/javascript">
	var	THINKPHP={
		module:'__MODULE__',
		id:"{$updateNav.id}",
	}
</script> 
<body>
<h2><a href="{:U('Nav/index')}">返回上一级</a>网站栏目管理 <if condition="$position">&gt; {$position}</if></h2>
<form name="form" id="public" method="post" action="{:U('nav/add')}">
<input type="hidden" value="{$prev_url}" name="prev_url"/>
<dl class="edit">
	<dd>
		<label for="title">栏目名称：</label>
		<input type="text" id="title" name="title" class="text"/> <span class="star">*必填</span>
	</dd>
	<dd>
		<label for="ename">别　　名：</label>
		<input type="text" id="ename" name="ename" class="text"/> <span>*英文</span>
	</dd>
	<dd>上级栏目：
		<select name="pid" class="select">
			<option value="0">顶级栏目</option>
			<volist name="allNav" id="val"><option value="{$val.id}">{$val.limit}{$val.title}</option></volist>
		</select>
	</dd>
	<dd>所属模板：
		<select name="model" class="select">
			<volist name="model" id="val"><option value="{$val.id}">{$val.name}</option></volist>
		</select>
	</dd>
	<dd>SEO 标题：
		<input type="text" class="text" name="seotitle"/>
	</dd>
	<dd>前台显示：
	<label><input type="radio" name="state" class="state" value="1"/> 是</label> <label><input type="radio" name="state" class="state" value="0"/> 否</label></dd>
	<dd>
		<label for="info">栏目描述：</label>
		<textarea name="info" class="textarea"></textarea> <span>*不得大于255位</span>
		</dd>
	<dd><input type="submit" name="send" value="提交" class="submit"/></dd>
</dl>	
	
</form>
</body>
</html>