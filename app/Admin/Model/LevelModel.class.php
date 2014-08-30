<?php
namespace Admin\Model;
use Think\Model;
class LevelModel extends Model{
	protected $_validate=array(
		array('level_name','require','等级名称不得为空！'), // 在新增的时候验证name字段是否唯一
		array('level_name','','等级名称已经存在！',0,'unique',1),
		array('level_info','0,200','等级简介不得大于200位','0','length'),	
	);
}

