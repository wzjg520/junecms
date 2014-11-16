<?php
//获得属性
function getAttr($type){
	$attr=M('Attr')->where(array('type'=>$type))->field('name,value')->select();
	$attrArray=array();
	foreach ($attr as $key=>$value){
		$attrArray[$value['value']]=$value['name'];
	}
	return $attrArray;
}
//获得目录树
function dirToArray($dir) {	 
	$result = array();
	$cdir = scandir($dir);
	foreach ($cdir as $key => $value){
		if (!in_array($value,array(".",".."))){
			if (is_dir($dir . DIRECTORY_SEPARATOR . $value)){
				$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
			}
			else{
				$result[] = $value;
			}
		}
	}	 
	return $result;
}
