<?php
namespace Admin\Model;
use Think\Model;
class NavModel extends Model{
	protected $_validate=array(
			array('title','require','-1'), 
			//-2帐号名称已经存在！
			array('title','',-2,0,'unique',1),
			//-3英文名称不得为空！
			array('ename','require',-3),
			//-4英文名称已经存在！
			array('ename','',-4,0,'unique',1),
	);
	
	//注册一条新数据
	public function register($data,$nav){
		if($this->create($data)){
			$flag=$this->add();
			return $flag ? $flag : $this->getError();
		}
	}
	//更新一条数据
	public function update($data){
		if($this->create($data)){
			$flag=$this->save();
			return $flag ? $flag : $this->getError();
		}
	}
	//验证数据是否存在
	public function checkFields($request, $type,$id=0){
		$data=array();
		switch($type){
			case 'title':
				$data['title']=$request['title'];
				break;
			case 'ename':
				$data['ename']=$request['ename'];
				break;
			default:
				return 0;
		}
		return $this->create($data) ? 1 : -1;
	}
}