<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>自定义导航</title>
<script type="text/javascript" src="/web/junecms/Public/Admin/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/web/junecms/Public/Admin/easyui/jquery.easyui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/locale/easyui-lang-zh_CN.js"> 
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/style/basic.css"> 
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/style/admin.css">
<script type="text/javascript" src="/web/junecms/Public/Admin/js/nav.js"></script>
<script type="text/javascript">
	var url="<?php echo U('Model/modelData');?>",
	updateUrl="/web/junecms/Admin/Nav/update"
</script> 
</head>
<body>
<h2>网站栏目管理 <?php if($position): ?>&gt; <?php echo ($position); endif; ?></h2>
<div class="list">
	<table id="dg" height:auto">
		<thead>
			<tr>
				<th data-options="field:'ck',align:'center',checkbox:true,width:20"></th>
				<th data-options="field:'title',align:'left',width:20">栏目名</th>
				<th data-options="field:'ename', align:'center',width:5,width:20">别名</th>
				<th data-options="field:'sort',sortable:true,editor:'numberbox',align:'center',width:20">排序</th>
				<th data-options="field:'modelName', align:'center',width:20">模型名</th>
				<th data-options="field:'info', align:'center',width:20">简介</th>
				<th data-options="field:'seotitle', align:'center',width:20">seo优化</th>
				<th data-options="field:'id',align:'center',width:20,formatter:update">操作</th>
			</tr>
		</thead>
	</table>
	<div id="tb" style="height:auto">
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">添加</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">移除</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()">保存</a>
	</div>
</div>
<div id="message"></div>
</body>
</html>