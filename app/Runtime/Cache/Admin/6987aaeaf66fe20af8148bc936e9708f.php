<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加栏目</title>
</head>
<script type="text/javascript" src="/web/junecms/Public/Admin/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/web/junecms/Public/Admin/easyui/jquery.easyui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/locale/easyui-lang-zh_CN.js"> 
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/style/basic.css">
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/style/edit.css">
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/style/nav.css">
<script type="text/javascript" src="/web/junecms/Public/Admin/js/edit.js"></script>
<script type="text/javascript" src="/web/junecms/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/web/junecms/Public/Admin/js/nav_edit.js"></script>
<script type="text/javascript">
	var	THINKPHP={
		module:'/web/junecms/Admin',
		id:"<?php echo ($updateNav["id"]); ?>",
	}
</script> 
<body>
<h2><a href="<?php echo U('Nav/index');?>">返回上一级</a>网站栏目管理 <?php if($position): ?>&gt; <?php echo ($position); endif; ?></h2>
<form name="form" id="public" method="post" action="<?php echo U('nav/add');?>">
<input type="hidden" value="<?php echo ($prev_url); ?>" name="prev_url"/>
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
			<?php if(is_array($allNav)): $i = 0; $__LIST__ = $allNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["limit"]); echo ($val["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</dd>
	<dd>所属模板：
		<select name="model" class="select">
			<?php if(is_array($model)): $i = 0; $__LIST__ = $model;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
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