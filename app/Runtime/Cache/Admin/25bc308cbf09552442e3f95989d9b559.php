<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>文档列表</title>
<script type="text/javascript" src="/web/junecms/Public/Admin/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/web/junecms/Public/Admin/easyui/jquery.easyui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/locale/easyui-lang-zh_CN.js"> 
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/web/junecms/Public/Admin/style/basic.css"> 
<script type="text/javascript" src="/web/junecms/Public/Admin/js/article.js"></script>
</head>
<body>
<h2>文档 -- 文档列表</h2>

<div class="list">
	<table id="dg" height:auto">
		<thead>
			<tr>
				<th data-options="field:'ck',align:'center',checkbox:true,"></th>
				<th data-options="field:'title',align:'center',editor:'text'">文档名</th>
				<th data-options="field:'nid',align:'center',editor:'text'">分类</th>
				<th data-options="field:'info', align:'center',editor:'text'">信息</th>
				<th data-options="field:'author', align:'center',editor:'text'">发布者</th>
				<th data-options="field:'date', align:'center'">发布时间</th>
				<th data-options="field:'id',align:'center',formatter:rowformater">操作</th>
			</tr>
		</thead>
	</table>
	<div id="tb" style="height:auto">
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">添加</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">移除</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()">保存</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()">后退</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true" onclick="getChanges()">GetChanges</a>
	</div>
</div>
</body>
</html>