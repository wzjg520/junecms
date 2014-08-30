$(function(){
	$(window).resize(function(){
		$('#dg').treegrid('resize')
	})
	$('#dg').treegrid({
		iconCls: 'icon-edit',
		treeField:'title',
		idField:'id',
		height:550,
		animate: true,
		url: 'navData',
		method:'post',
		remoteSort:true,
		sortName:'sort',
		sortOrder:'asc',
		fitColumns:true,
		striped:true,
		singleSelect:false,
		pagination:true,
		pageSize:40,
		pageList:[40,80,120,160],
		toolbar:'#tb',
		onDblClickRow:onDblClickRow,
		loadMsg:'信息加载中请稍后',
		pagePosition:'bottom',
		rownumbers:true,
	})
	$page=$('#dg').treegrid('getPager');
	$page.pagination({
		total:100,
		beforePageText:"第",
		afterPageText:"页　共{pages}页",
		displayMsg:"当前显示从 {from} - {to}条记录　共 {total}条记录",
	})
})
var editIndex = undefined,
	removeData=[]
function append(){
	location.href='add';
}
function endEditing(){
	if (editIndex == undefined){return true}
	if ($('#dg').treegrid('endEdit', editIndex)){				
		editIndex = undefined;	
		return true;
	} else {
		return false;
	}
}
function onDblClickRow(index){
	if (editIndex != index){
		if (endEditing()){
			$('#dg').treegrid('beginEdit', index.id).treegrid('select',index.id);
			editIndex = index.id;			
		}
	}
}
function removeit(){		
	var selectIndex=$('#dg').treegrid('getSelections')
	removeData=removeData.concat(selectIndex.slice(0));
	for(var i in selectIndex){
		$('#dg').treegrid('remove', selectIndex[i].id);
	}
}
function reject(){
	$('#dg').treegrid('rejectChanges');
}
function accept(){
	if (editIndex != undefined){
		if ($('#dg').treegrid('endEdit', editIndex)){							
			var updated=$('#dg').treegrid('getSelections')
			editIndex = undefined;	
		}
	}
	var deleted=removeData
	$.ajax({
		url:'curd',
		method:'post',
		success:function(text){
			$('#dg').treegrid('acceptChanges');
			$('#dg').treegrid('load');
			$.messager.show({
							title:'提示信息',
							msg:text,
							timeout:5000,
							showType:'slide'
			});

		},
		data:{
			'deleted':deleted,
			'updated':updated,	
		}
	})
}
function update(val,row,index){
	return '<a href="'+updateUrl+'/id/'+row.id+'.html">编辑</a>';
}
