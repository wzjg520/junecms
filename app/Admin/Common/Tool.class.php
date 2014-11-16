<?php
namespace Admin\Common;
class Tool {
	//一维数组多级分类
	static public function category($result,$limit='---',$pid=0,$level=0){
		$array=array();
		foreach ($result as $key=>$value){
			if($value['pid']==$pid){
				$value['level']=$level+1;
				$value['limit']=str_repeat($limit, $level);
				$array[]=$value;
				$array=array_merge($array,self::category($result,$limit,$value['id'],$value['level']));
			}		
		}
		return $array;
	}
	//多维数组多级分类(配合datagrid)
	static public function categoryForDgd($result,$pid=0){
		$array=array();
		foreach($result as $key=>$value){
			if($value['pid']==$pid){
				$value['children']=self::categoryForDgd($result,$value['id']);
				$array[]=$value;
			}
		}
		return $array;
	}
}