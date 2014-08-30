<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class NavController extends Controller{
	public function index(){
		$this->assign('position','自定义栏目列表');
		$this->display();
	}
	//获得数据
	public function navData(){
		$nav= M('Nav');
		$count=$nav->count();
		//顶级
		$result=$nav->field(array(
				'n.id',
				'n.ename',
				'n.title',
 				'n.pid',
				'n.model',
				'n.info',
 				'n.seotitle',
// 				'n.status',
 				'n.sort',
				'm.name modelName'
		))->alias('n')->page($_POST['page'],$_POST['rows'])->join('LEFT JOIN __MODEL__ m ON n.model=m.id')->order('n.'.I('post.sort').' '.I('post.order'))->select();
		$result=\Admin\Common\Tool::categoryForDgd($result);
		echo '{"total":'.$count.',"rows":'.json_encode($result).'}';

		//echo objTransJson($higher, $count);
	}
	//删除一条数据
	public function curd(){
		$nav=D('Nav');
		$message=array();
		if(array_key_exists('deleted', I('post.'))){
			foreach(I('post.deleted') as $key=>$value){
				$nav->delete($value['id']);
			}
		}
		if(array_key_exists('updated', I('post.'))){
			foreach($_POST['updated'] as $key=>$value){
				if(!$nav->create($value)){
					$message=$nav->getError();
				}else{
					$nav->save();
				}
			}
		}
		if(count($message) ==0){
		 	echo '保存成功';
		 }else{
		 	echo $message[0];
		 };
	}
	public function add(){
		$model= M('Model');
		$nav= D('Nav');
		if(IS_POST){
			if($nav->register(I('post.'))>0){
				$this->success('添加成功',I('post.prev_url'),3);
			} else{
				$this->error('添加失败');
			}
			
		}else{
			$pNav=$nav->field(array('id','title','pid'))->order(array('sort'))->select();
			//实现无限极分类
			$pNav= \Admin\Common\Tool::category($pNav,'---',0);
			
			$result=$model->field(array('id','name'))->select();
			$this->assign('model',$result);
			$this->assign('allNav',$pNav);
			$this->assign('prev_url',PREV_URL);
			$this->display('add');
		}	
	}
	public function update(){
		if(!I('get.id',0))$this->error('非法操作');
		$model= M('Model');
		$nav= D('Nav');
		if(IS_POST){
			if($nav->update(I('post.'))==1){
				$this->success('编辑成功',I('post.prev_url'),3);
			}else{
				$this->error('编辑失败');
			}
		}else{
			$pNav=$nav->field(array('id','title','pid'))->order(array('sort'))->select();
			//分类处理
			$pNav=\Admin\Common\Tool::category($pNav,'---',0);

			$updateNav=$nav->where(array('id'=>I('get.id')))->field(array(
					'id',
					'title',
					'ename',
					'pid',
					'seotitle',
					'info',
					'model',
					'status',
					'info'
			))->select();
			$result=$model->field(array('id','name'))->select();
			$this->assign('model',$result);
			$this->assign('allNav',$pNav);
			$this->assign('updateNav',$updateNav[0]);
			$this->assign('prev_url',PREV_URL);
			$this->display('update');
		}
		
		
	}
	//ajax验证栏目名是否重复
	public function checkTitle(){
		if(IS_AJAX){
			if(strpos($_SERVER['HTTP_REFERER'],'update'))exit('true');	
			$nav=D('Nav');
			$flag=$nav->checkFields(I('post.'),'title');			
			echo $flag > 0 ? 'true' : 'false';
		 
		}else{
			$this->error('非法访问');
		}
	}
	//ajax验证别名是否重复
	public function checkEname(){
		if(IS_AJAX){
			if(strpos($_SERVER['HTTP_REFERER'],'update'))exit('true');
			$nav=D('Nav');
			$flag=$nav->checkFields(I('post.'),'ename');
			echo $flag > 0 ? 'true' : 'false';
		}else{
			$this->error('非法访问');
		}
	}
}