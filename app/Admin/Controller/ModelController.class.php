<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class ModelController extends Controller{
	public function index(){
		$dirArray=getViewModelName(dirname(dirname(T())),C('MODEL_FILTER'));
		//var_dump($dirArray);
		$this->display();
	}
	public function modelData(){
		$model= M('Model');
		$count=$model->count();	
		$result=$model->field(array(
				'id',				
				'name',
				'tablename',
				'info',
				'status',
				'template_show',
				'sort',
				'date'					
		))->page($_POST['page'],$_POST['rows'])->order('sort DESC')->select();
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
		$model=D('Model');
		$message=array();
		if(array_key_exists('inserted', $_POST)){
			foreach($_POST['inserted'] as $key=>$value){
				$value['date']=getTime();
				if(!$model->create($value)){
					$message[]=$model->getError();
				}else{
					$model->add();
				}
			}
		}
		if(array_key_exists('updated', $_POST)){
			foreach($_POST['updated'] as $key=>$value){
				if(!$model->create($value)){
					$message[]=$model->getError();
				}else{
					$model->save();
				}
			}
		}
		if(array_key_exists('deleted', $_POST)){
			foreach($_POST['deleted'] as $key=>$value){
				$model->delete($value['id']);
			}
		}
		if(count($message) ==0){
			echo '保存成功';
		}else{
			echo $message[0];
		};
	}
	//独立修改页面使用
	public function update(){
		if(IS_GET){
			$model=M('Model');
			$result=$model->where(array('id'=>$_GET['id']))->select();
			$this->assign('model',$result[0]);
			$this->display();
		}
		
	}
}