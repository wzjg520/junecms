<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller{
	public function index(){
		$this->assign('position','文档列表');
		
		$this->display();
	}
	//获得数据
	public function dataList(){
		$Article= D('Article');
		$count=$Article->count();
		//顶级
		$result=$Article->field(array(
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
	}
	//删除一条数据
	public function curd(){
		$Article=D('Nav');
		$message=array();
		if(array_key_exists('deleted', I('post.'))){
			foreach(I('post.deleted') as $key=>$value){
				$Article->delete($value['id']);
			}
		}
		if(array_key_exists('updated', I('post.'))){
			foreach($_POST['updated'] as $key=>$value){
				if(!$Article->create($value)){
					$message=$Article->getError();
				}else{
					$Article->save();
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
		if(IS_POST){
			$Article= D ('Article');
			var_dump(I('post.'));
			exit();
			if($Article->register(I('post.'))>0){
				$this->success('添加成功',I('post.prev_url'),3);
			} else{
				$this->error('添加失败');
			}
			
		}else{
			$Nav= D('Nav');
			$pNav=$Nav->field(array('id','title','pid'))->order(array('sort'))->select();
			//实现无限极分类
			$pNav= \Admin\Common\Tool::category($pNav,'---',0);
			
			//获得图片目录
			$filePath=$_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Uploads';
			$arrDir=dirToArray($filePath);
			$this->assign('arrDir',$arrDir);
			$this->assign('allNav',$pNav);
			$this->assign('prev_url',PREV_URL);
			$this->assign('attrArray',getAttr('content'));
			$this->assign('position','添加文档');
			$this->display('add');
		}	
	}
	public function update(){
		if(!I('get.id',0))$this->error('非法操作');
		$model= M('Model');
		$Article= D('Nav');
		if(IS_POST){
			if($Article->update(I('post.'))==1){
				$this->success('编辑成功',I('post.prev_url'),3);
			}else{
				$this->error('编辑失败');
			}
		}else{
			$pNav=$Article->field(array('id','title','pid'))->order(array('sort'))->select();
			//分类处理
			$pNav=\Admin\Common\Tool::category($pNav,'---',0);

			$updateNav=$Article->where(array('id'=>I('get.id')))->field(array(
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

}