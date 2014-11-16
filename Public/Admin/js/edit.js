$(function(){
	$("#public .text").focus(function(){
		$(this).css('box-shadow','1px 1px 3px #666');
	}).blur(function(){
		$(this).css('box-shadow','none');
	})
})