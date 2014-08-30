$(function(){
    $('#color').spectrum({
        preferredFormat: "hex",
        showInput: true,
		color:'#333',
		cancelText: '取消',
    	chooseText: '选择',
		change:function(color){
			$('#title').css('color',color);
		}
    });
	//选择站内图片
	$('#win').window({
		width:670,
		height:450,
		title:'选择站内图片',
		closed:true,
	})
	$('#picIn').click(function(){
		$('#win').window('open');
	})
	$('#win h3').click(function(){
		if($(this).next('ul').css('display')=='none'){
			$(this).next('ul').show();
		}else{
			$(this).next('ul').hide();
		}
		
	})
	$('#public').validate({
		submitHandler:function(form){
//			$(form).ajaxSubmit({
//				
//			})			
		},
		highlight:function(element,errorclass){
			$(element).css('border','1px solid red');
			$(element).nextAll('span').html('&nbsp;').removeClass('succ').removeClass('loading');
		},
		unhighlight:function(element,errorclass){
			$(element).css('border','1px solid green');

			$(element).nextAll('span').html('&nbsp;').addClass('succ');
		},
		rules:{
			title:{
				required:true,
				rangelength:[2,20],
			},
			ename:{
				required:true,
				isECode:true,
			},
//			info:{
//				maxlength:255,
//			}
		},
		messages:{
			title:{
				required:' (*栏目名称不得为空)',
				rangelength:jQuery.format(' (*栏目必须在{0},{1}之间)'),
				
			},
			ename:{
				required:' (*别名不得为空)',
				isECode:' (*必须为字母)',
				remote:' (*已被占用)',
			},
//			info:{
//				maxlength:' (*不得大于255位)'
//			}
		}
	})	
	
	
})
