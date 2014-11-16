$(function(){
	$('#dg').datagrid({
		iconCls: 'icon-edit',
		singleSelect: true,
		url: 'levelData',
		method:'post',
		fitColumns:true,
		striped:true,
		pagination:true,
		pageSize:10,
		pageList:[10,20,30,40],
		toolbar:'#tb',
		singleSelect:false,
		loadMsg:'信息加载中请稍后',
		pagePosition:'bottom',
		rownumbers:true,
		onDblClickRow:onDblClickRow,
	})
	$page=$('#dg').datagrid('getPager');
	$page.pagination({
		total:100,
		beforePageText:"第",
		afterPageText:"页　共{pages}页",
		displayMsg:"当前显示从 {from} - {to}条记录　共 {total}条记录",
	})
})
var editIndex = undefined;
function endEditing(){
	if (editIndex == undefined){return true}
	if ($('#dg').datagrid('validateRow', editIndex)){
		$('#dg').datagrid('endEdit', editIndex);		
		editIndex = undefined;	
		return true;
	} else {
		return false;
	}
}
function onDblClickRow(index){
	if (editIndex != index){
		if (endEditing()){
			$('#dg').datagrid('selectRow', index)
					.datagrid('beginEdit', index);
			editIndex = index;
		} else {
			$('#dg').datagrid('selectRow', editIndex);
		}
	}
}
function append(){
	if (endEditing()){
		$('#dg').datagrid('appendRow',{status:'P'});
		editIndex = $('#dg').datagrid('getRows').length-1;
		$('#dg').datagrid('selectRow', editIndex)
				.datagrid('beginEdit', editIndex);
	}
}
function removeit(){	
	var selected=$('#dg').datagrid('getChecked').length
	if (editIndex == undefined && selected==0){return}
	if(editIndex != undefined){
		 $('#dg').datagrid('cancelEdit', editIndex).datagrid('deleteRow', editIndex);
	}else{	
		 $.each($('#dg').datagrid('getChecked'),function(key,value){
		 	editIndex=$('#dg').datagrid('getRowIndex',value)
		 	$('#dg').datagrid('deleteRow', editIndex);
		 })		
	}
	
	editIndex = undefined;
}
function reject(){
	$('#dg').datagrid('rejectChanges');
	editIndex = undefined;
}
function accept(){
	if (endEditing()){
		var inserted=$('#dg').datagrid('getChanges','inserted'),
		updated=$('#dg').datagrid('getChanges','updated'),
		deleted=$('#dg').datagrid('getChanges','deleted');
		$.ajax({
			url:'curd',
			method:'post',
			success:function(text){				
				$('#dg').datagrid('load');				
				$.messager.show({
								title:'提示信息',
								msg:text,
								timeout:5000,
								showType:'slide'
				});

			},
			data:{
				'inserted':inserted,
				'updated':updated,
				'deleted':deleted,	
			}
		})
		
		
	}
}
function getChanges(){
	var rows = $('#dg').datagrid('getChanges');
	alert(rows.length+' rows are changed!');
}