<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="__PUBLIC__easyui/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__easyui/jquery.easyui.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/locale/easyui-lang-zh_CN.js"> 
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="__PUBLIC__easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="__STYLE__basic.css"> 
<link rel="stylesheet" type="text/css" href="__STYLE__admin.css">
<script type="text/javascript" src="__PUBLIC__js/model.js"></script>
<script type="text/javascript">
	var url='__CONTROLLER__'
</script> 
<title>模板列表</title>
</head>
<body>
<h2>模板 -- 模板列表</h2>
<div class="list">
	<table id="dg" height:auto">
		<thead>
			<tr>
				<th data-options="field:'ck',align:'center',checkbox:true,width:20"></th>
				<th data-options="field:'name',align:'center',editor:'text',width:20">模板名称</th>
				<th data-options="field:'tablename',align:'center',editor:'text',width:20">附加表名</th>
				<th data-options="field:'info', align:'center',width:5,editor:'text',width:20">模板信息</th>
				<th data-options="field:'status', align:'center',editor:'text',width:20">是否启用</th>
				<th data-options="field:'template_show', align:'center',editor:'text',width:20">前台显示模板</th>
				<th data-options="field:'date', align:'center',width:20">添加时间</th>
				<th data-options="field:'id',width:20,align:'center',formatter:rowformater">操作</th>
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
<div id="message"></div>
<div id="win"></div>
</body>
</html>