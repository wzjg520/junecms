$(function(){
	$('.accordion').accordion({
		selected:0,
//		fit:true,
	});
	$('#header ul li').click(function(){
		var index=($(this).index())
		var value=$(this).find('a').html();
		var title=$('#sidebar').prev().find('.panel-title').html(value);
		$('div.accordion').hide();
		$('div.accordion').eq(index).show();
	})
})
