<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Page;
class ManageController extends Controller{
	public function index(){
		
	}
	public function manageList(){
		$this->display('manageList');
	}
	//获得数据
	public function manageData(){
		$manage= M('Manage');
		$count=$manage->count();	
		$result=$manage->field(array(
				'm.id',
				'm.user',
				//'m.level',
				'm.realname',
				'm.regtime',
				'm.lasttime',
				'm.lastip',
				'l.level_name AS level',					
		))->alias('m')->page($_POST['page'],$_POST['rows'])->join('LEFT JOIN __LEVEL__ l ON m.level=l.id')->order('m.level DESC')->select();
		$json='';
		foreach($result as $key=>$value){
			foreach($value as $k=>$v){
				$value[$k]=urlencode(filterString($v));
			}
			$json.=urldecode(json_encode($value)).',';
		}
		echo '{"total":'.$count.',"rows":['.substr($json,0,-1).']}';
		
	}
	//增删改
	public function curd(){
		$manage=D('Manage');
		$message=array();
		if(array_key_exists('inserted', $_POST)){
			foreach($_POST['inserted'] as $key=>$value){
				$value['regtime']=getTime();
				if(!$manage->create($value)){
					$message[]=$manage->getError();
				}else{
					$manage->add();
				}
			}		
		}
		if(array_key_exists('updated', $_POST)){
			foreach($_POST['updated'] as $key=>$value){
				if(!$manage->create($value)){
					$message[]=$manage->getError();
				}else{
					$manage->save();
				}
			}
		}
		if(array_key_exists('deleted', $_POST)){
			foreach($_POST['deleted'] as $key=>$value){
				$manage->delete($value['id']);
			}
		}
		 if(count($message) ==0){
		 	echo '保存成功';
		 }else{
		 	echo $message[0];
		 };
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}