<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Page;
class LevelController extends Controller{
	public function LevelList(){
		$this->display('LevelList');
	}
	//获得数据
	public function LevelData(){
		$level= M('Level');
		$count=$level->count();		
		$result=$level->field(array('id','level_name','level_info'))->select();
		$json='';
		foreach($result as $key=>$value){
			foreach($value as $k=>$v){
				$value[$k]=urlencode(filterString($v));
			}
			$json.=urldecode(json_encode($value)).',';
		}
		echo '['.substr($json,0,-1).']';
		
	}
	//增删改
	public function curd(){
		$level=D('Level');
		$message=array();
		if(array_key_exists('inserted', $_POST)){
			foreach($_POST['inserted'] as $key=>$value){
				if(!$level->create($value)){
					$message[]=$level->getError();
				}else{
					$level->add();
				}
			}		
		}
		if(array_key_exists('updated', $_POST)){
			foreach($_POST['updated'] as $key=>$value){
				if(!$level->create($value)){
					$message[]=$level->getError();
				}else{
					$level->save();
					
				}
			}
		}
		if(array_key_exists('deleted', $_POST)){
			foreach($_POST['deleted'] as $key=>$value){
				//var_dump($value);
				if($level->table('__MANAGE__')->where(array('level'=>$value['id']))->count()){
					$message[]= $value['level_name'].'等级已被使用无法删除';
				}else{
					$level->delete($value['id']);
				};
								
			}
		}
		 if(count($message) ==0){
		 	echo '保存成功';
		 }else{
		 	$str='';
			foreach($message as $key=>$value){
				$str.=$value.',';
			}
			echo substr($str,0,-1);
		 };
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}