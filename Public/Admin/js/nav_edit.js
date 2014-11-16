$(function(){
	$('#public').validate({
		submitHandler:function(form){
			form.submit();			
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
				remote:{
					url:THINKPHP['module']+'/Nav/checkTitle.html',
					type:'post',
					data:{
						
					},
					beforeSend:function (){
						$('#title').nextAll('span').html('&nbsp').removeClass('succ').addClass('loading');
					},
					complete:function(jqXHR){
						if(jqXHR.responseText == 'true'){							
							$('#title').nextAll('span').html('&nbsp').removeClass('loading').addClass('succ');
						}else{
							$('#title').nextAll('span').html('&nbsp').removeClass('succ').removeClass('loading');
						}
					}
				},
			},
			ename:{
				required:true,
				isECode:true,
				remote:{
					url:THINKPHP['module']+'/Nav/checkEname.html',
					type:'post',
					beforeSend:function (){
						$('#ename').nextAll('span').html('&nbsp').removeClass('succ').addClass('loading');
					},
					complete:function(jqXHR){
						if(jqXHR.responseText == 'true'){							
							$('#ename').nextAll('span').html('&nbsp').removeClass('loading').addClass('succ');
						}else{
							$('#ename').nextAll('span').html('&nbsp').removeClass('succ').removeClass('loading');
						}
					}
				}
			},
			info:{
				maxlength:255,
			}
		},
		messages:{
			title:{
				required:' (*栏目名称不得为空)',
				rangelength:jQuery.format(' (*栏目必须在{0},{1}之间)'),
				remote:' (*已被占用)',
				
			},
			ename:{
				required:' (*别名不得为空)',
				isECode:' (*必须为字母)',
				remote:' (*已被占用)',
			},
			info:{
				maxlength:' (*不得大于255位)'
			}
		}
	})
})

