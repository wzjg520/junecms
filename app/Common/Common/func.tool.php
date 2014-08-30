<?php
//过滤字符串中的特殊符号
function filterString($str){
	$search = array ('/\n/','/\'/','/\"/');
	$replace = array ("<br/>","&apos;","&quot;");	
	return $text = preg_replace ( $search, $replace, $str );
}
//获得当前时间
function getTime(){
	return date('Y:m:d H:i:s');
}
//获得视图模型名
function getViewModelName($dirPath,$filterArray=NULL){
	$modelDir=$dirPath;
	$dirArray=array();
	foreach(scandir($modelDir) as $key=>$value){
		if($value != '.' && $value !='..' && !in_array($value, $filterArray)){
			
			if(is_dir($dirPath.'/'.$value)){
				$fileArray=array();
				foreach(scandir($modelDir.'/'.$value) as $k=>$v){
					if($v != '.' && $v !='..'){
						$fileArray[]=$v;
					}
				}
			}
			
			$dirArray[$value]=$fileArray;
			
		}
	}
	return $dirArray;
}
//属性菜单
//对象数组转换json字符串 $flag=0 位datagrid
function objTransJson($result,$count,$flag=0){
	$json='';
	foreach($result as $key=>$value){
		foreach($value as $k=>$v){
			$value[$k]=urlencode(filterString($v));
		}
		$json.=urldecode(json_encode($value)).',';
	}
	if($flag==0)return  '{"total":'.$count.',"rows":['.substr($json,0,-1).']}';
	if($flag==1)return  '['.substr($json,0,-1).']';
}
