<?php
namespace Admin\Model;
use Think\Model;
class ModelModel extends Model{
	protected $_validate=array(
		array('name','require','帐号名称不得为空！'), // 在新增的时候验证name字段是否唯一
		array('name','','帐号名称已经存在！',0,'unique',1),
		array('status','number','系统错误'),	
	);
}

