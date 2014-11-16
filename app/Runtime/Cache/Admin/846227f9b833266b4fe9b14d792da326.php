<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>ihuahua</title>
<meta charset="UTF-8" />
<script type="text/javascript" src="/junecms/Public/Admin/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/junecms/Public/Admin/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/junecms/Public/Admin/js//admin.js"></script>
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/easyui/locale/easyui-lang-zh_CN.js"> 
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/easyui/themes/icon.css"> 
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/style/basic.css"> 
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/style/admin.css"> 
</head>
<body id="layout" class="easyui-layout">
	<div data-options="region:'north'" style="height:88px" id="header" border="false"  split="true" maxHeight="88">
		<p>您好， [<a href="?a=admin">去首页</a>] [<a href="?a=admin&m=loginOut">退出</a>]</p>
	<ul>
		<li class="first" ><a href="#">首页</a></li>
		<li><a href="#">伪静态</a></li>
		<li><a href="#">会员管理</a></li>
		<li><a href="#">信息采集</a></li>
		<li><a href="#">模板</a></li>
		<li><a href="#">系统</a></li>
	</ul>
	</div>
	<div data-options="region:'west'" split="true" border="false" title="首页" style="width:200px" id="sidebar">
		<!--首页-->
		<div class="accordion" style="display=block">
			<div title="常用操作">
				<dl style="display:block">
					<dd><a href="<?php echo U('Nav/index');?>" target="in">网站栏目管理</a></dd>
					<dd><a href="<?php echo U('Article/index');?>" target="in">文档管理</a></dd>
					<dd><a href="#">网站公告</a></dd>
					<dd><a href="#">首页轮播器</a></dd>	
				</dl>
			</div>
			<div title="导航管理">
				<dl>
					<dd><a href="<?php echo U('Nav/index');?>" target="in">导航</a></dd>	
					<dd><a href="<?php echo U('Article/index');?>" target="in">文章</a></dd>
					<dd><a href="###" target="in">评论审核</a></dd>		
				</dl>
			</div>
			<div title="内容管理">
				<dl>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
				</dl>
			</div>
			<div title="快捷入口">
				<dl>
					<dd><a href="<?php echo U('Manage/index');?>" target="in">管理员列表</a></dd>
					<dd><a href="<?php echo U('Level/levelList');?>" target="in">等级列表（待开发）</a></dd>
					<dd><a href="#" target="in">权限设定（待开发）</a></dd>
					<dd><a href="#" target="in">模版编辑（待开发）</a></dd>
					<dd><a href="#" target="in">图片管理</a></dd>		
				</dl>
			</div>
			<div title="网站目录结构">
				<ul id="tt" class="easyui-tree">  
				    <li>  
				        <span>Folder</span>  
				        <ul>  
				            <li>  
				                <span>Sub Folder 1</span>  
				                <ul>  
				                    <li><span><a href="#">File 11</a></span></li>  
				                    <li><span>File 12</span></li>  
				                    <li><span>File 13</span></li>  
				                </ul>  
				            </li>  
				            <li><span>File 2</span></li>  
				            <li><span>File 3</span></li>  
				        </ul>  
				    </li>  
   					 <li><span>File21</span></li>  
				</ul>  
			</div>	
		</div>
		<!--伪静态-->
		<div class="accordion" style="display:none;">
				<dl>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
				</dl>
		</div>
		<!--会员管理-->
		<div class="accordion" style="display:none;">
				<dl>
					<dd><a href="#" target="in">我的账户</a></dd>
					<dd><a href="<?php echo U('Manage/manageList');?>" target="in">管理员列表</a></dd>
					<dd><a href="<?php echo U('Level/levelList');?>" target="in">等级列表</a></dd>
					<dd><a href="#" target="in">权限设置</a></dd>
					
				</dl>
		</div>
		<!--信息采集-->
		<div class="accordion" style="display:none;">
				<dl>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
				</dl>
		</div>
		<!--模块化-->
		<div class="accordion" style="display:none;">
				<dl>
					<dd><a href="<?php echo U('Model/index');?>" target="in">模板列表</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
				</dl>
		</div>
		<!--系统设置-->
		<div class="accordion" style="display:none;">
				<dl>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
					<dd><a href="#" target="in">待开发</a></dd>
				</dl>
		</div>
	</div>
	<div data-options="region:'center'" title="内容" split="true" id="main">
		<iframe frameborder='0' src="" name="in"></iframe>
	</div>
</body>
</html>