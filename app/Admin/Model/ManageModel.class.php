<?php
namespace Admin\Model;
use Think\Model;
class ManageModel extends Model{
	protected $_validate=array(
		array('user','require','帐号名称不得为空！'), // 在新增的时候验证name字段是否唯一
		array('user','','帐号名称已经存在！',0,'unique',1),
		array('level','number','系统错误'),	
	);
}

