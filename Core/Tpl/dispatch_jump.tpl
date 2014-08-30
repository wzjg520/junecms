<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
h2{
	font-size:12px;
	border:1px solid #BBDDE5;
	padding:10px;
	margin:10px;
	background:#F4FAFB;
	color:#335B64;
}
div{
	margin:10px;
	background:#F4FAFB;
	color:#335B64;
	
}
.error{
	border:1px solid red;
	padding:10px;
	color:red;
}
.success{
	border:1px solid green;
	padding:10px;
	color:green;
}
.jump{
	padding:0 10px;
	color:#777;
	font-size:12px;
}
.jump a{
	color:green;
}
</style>
</head>
<body>
	<h2><?php if(isset($message)) {?>信息提示页：<?php }else{?>错误提示页：<?php }?></h2>
<?php if(isset($message)) {?>
<div class="success"><?php echo($message); ?></div>
<?php }else{?>
<div class="error"><?php echo($error); ?></div>
<?php }?>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
<script type="text/javascript">

(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>
