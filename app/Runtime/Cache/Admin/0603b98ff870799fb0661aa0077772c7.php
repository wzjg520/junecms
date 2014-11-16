<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加栏目</title>
</head>
<script type="text/javascript" src="/junecms/Public/Admin/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/junecms/Public/Admin/easyui/jquery.easyui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/easyui/locale/easyui-lang-zh_CN.js"> 
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/style/basic.css">
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/style/edit.css">
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/style/article.css">
<link rel="stylesheet" type="text/css" href="/junecms/Public/Admin/style/spectrum.css">
<script type="text/javascript" src="/junecms/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/junecms/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="/junecms/Public/Admin//ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/junecms/Public/Admin/js/article_edit.js"></script>
<script type="text/javascript" src="/junecms/Public/Admin/js/edit.js"></script>
<script type="text/javascript" src="/junecms/Public/Admin/js/spectrum.js"></script>
<script type="text/javascript">
	var	THINKPHP={
		module:'/junecms/Admin',
		id:"<?php echo ($updateNav["id"]); ?>",
	}
	$(function(){		
		if($('#thumbsrc').val() !=''){
			var thumbsrc=$('#thumbsrc').val()
			$('#pic_show').show().html('<img src="/junecms/'+thumbsrc+'" alt="缩略图"/>');
		}
		$("#picUpload").wrap("<form id='myupload' action='<?php echo U('Public/fileUpload', array('tb' => 2));?>' method='post' enctype='multipart/form-data'></form>");
		$("#picUpload").change(function(){
			if($('#picUpload').val()=='')return;
			$('#myupload').ajaxSubmit({
				beforeSend:function(){
					$('.loading').html('上传中...');
				},
				success:function(data){
					$('.loading').html('上传图片');
					if(typeof data == 'string'){
						$('#thumbsrc').val(data);
						$('#pic_show').show().html('<img src="/junecms/'+data+'" alt="缩略图"/>');
						$.messager.show({
							title:'恭喜：',
							msg:'图片上传成功',
							timeout:4000,
							showType:'slide'
						});
					}else{
						$.messager.defaults = { ok: "是" }
						$.messager.alert('警告：',data.info);
					};
				},
			})
		})
		$('#win ul li img').click(function(){
			var data=$(this).attr('title')	
			$('#thumbsrc').val(data);
			$('#pic_show').show().html('<img src="/junecms/'+data+'" alt="缩略图"/>');
		})
	})
	
</script> 
<body>
<h2><a href="<?php echo U('article/index');?>">返回上一级</a>文档管理 <?php if($position): ?>&gt; <?php echo ($position); endif; ?></h2>
<form name="form" id="public">
<input type="hidden" value="<?php echo ($prev_url); ?>" name="prev_url"/>
<dl class="edit">
	<dd>
		<label for="title">栏目名称：</label>
		<input type="text" id="title" name="title" class="text"/> <span class="star">*必填</span>
		<input type="text" id="color" name="color" value="#eee"/>
	</dd>
	<dd>
		属　　性：
		<?php if(is_array($attrArray)): foreach($attrArray as $key=>$val): ?><label><input type="checkbox" name="attr[]" value="<?php echo ($key); ?>"/> <?php echo ($val); ?> </label><?php endforeach; endif; ?>
		
		
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
	<dd>
		<label for="tag">标　　签：</label>
		<input type="text" id="tag" class="text" name="tag" /> <span>中间请以‘|’隔开，例如：黑色|纯棉|塑料</span>
	</dd>
	<dd>
		<label for="keyword">关 键 词：</label>
		<input type="text" class="text" id="keyword" name="keyword" /> <span>中间请以‘|’隔开，例如：黑色|纯棉|塑料</span>
	</dd>
	<dd>
		缩 略 图：
		<input type="text" name="thumbsrc" id="thumbsrc" class="text" />
		<input type="button" id="picIn" name="picIn" value="选择站内图片"/>
		<div class="pic">
			<span class="loading">上传图片</span>
			<input type="file" id="picUpload" name="picUpload"/>
		</div>
		
		<div src="" id="pic_show" style="display:none"></div>
	</dd>
	<dd>
		<label for="info" style="vertical-align:40px">摘　　要：</label>
		<textarea name="info" class="textarea" id="info"></textarea>
		<span>255字以内</span>		
	</dd>
	<dd>
		<label for="source">文章来源：</label>
		<input type="text" class="text" name="source" id="source"/>
	</dd>
	<dd>
		<label for="author">作　　者：</label>
		<input type="text" class="text" id="author" name="author" />
	</dd>
	<dd><textarea class="ckeditor" id="TextArea1" name="content"></textarea></dd>
	<dd>前台显示：
	<label><input type="radio" name="state" class="state" value="1"/> 是</label> <label><input type="radio" name="state" class="state" value="0"/> 否</label>
	　　允许评论：
	<label><input type="radio" name="is_commend" value="1"/> 是</label> <label><input type="radio" name="is_commend" value="0" /> 否</label>
	　　评 论 量：<input type="text" class="text readcount" name="readcount" value="100"/>
	</dd>
	
	<dd><input type="submit" name="send" value="提交" class="submit"/></dd>
</dl>	
	
</form>
<div id="msg"></div>
<div id="win">
	<?php if(is_array($arrDir)): foreach($arrDir as $k=>$vo): ?><h3><?php echo ($k); ?></h3>
		 <ul>
		 	<?php if(is_array($vo)): foreach($vo as $key=>$val): ?><li><img src="/junecms/Uploads/<?php echo ($k); ?>/<?php echo ($val); ?>" title="/Uploads/<?php echo ($k); ?>/<?php echo ($val); ?>"/></li><?php endforeach; endif; ?>
		 </ul><?php endforeach; endif; ?>
	
</div>
</body>
</html>