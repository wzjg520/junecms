<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>修改栏目</title>
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
<form name="form" id="public" method="post">
<input type="hidden" value="{$prev_url}" name="prev_url"/>
<input type="hidden" value="{$updateNav.id}" name="id"/>
<dl class="edit">
	<dd>
		<label for="title">栏目名称：</label>
		<input type="text" id="title" name="title" value="{$updateNav.title}" class="text"/> <span>*必填</span>
	</dd>
	<dd>
		<label for="ename">别　　名：</label>
		<input type="text" id="ename" name="ename" value="{$updateNav.ename}" class="text"/> <span>*英文</span>
	</dd>
	<dd>上级栏目：
		<select name="pid" class="select">
			<option value="0" <if condition="$updateNav.pid eq 0">selected="selected"</if> >顶级栏目</option>
			<volist name="allNav" id="val"><option value="{$val.id}" <if condition="$val['id'] eq $updateNav['pid']">selected="selected"</if> >{$val.limit}{$val.title}</option></volist>
		</select>
	</dd>
	<dd>所属模板：
		<select name="model" class="select">
			<volist name="model" id="val"><option value="{$val.id}" <if condition="$updateNav['model'] eq $val['id']">selected="selected"</if> >{$val.name}</option></volist>
		</select>
	</dd>
	<dd>SEO 标题：
		<input type="text" class="text" name="seotitle" value="{$updateNav.ename}"/>
	</dd>
	<dd>前台显示：
	<label><input type="radio" name="status" class="status" <if condition="$updateNav.status eq 1">checked="checked"</if> value="1"/> 是</label> <label><input type="radio" name="state" class="state" <if condition="$updateNav.status eq 0">checked="checked"</if> value="0"/> 否</label></dd>
	<dd>
		<label for="info">栏目描述：</label>
		<textarea name="info" class="textarea">{$updateNav.info}</textarea> <span>*不得大于255位</span>
		</dd>
	<dd><input type="submit" name="send" value="提交" class="submit"/></dd>
</dl>	
	
</form>
</body>
</html>