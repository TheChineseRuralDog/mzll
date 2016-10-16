<?php 


namespace Common\Model;

use Think\Model;
/**
* 
*/
class ConfigModel extends Model
{
	//表名
	private $_db="";
	//表的字段
	protected $id="id";
	protected $name="name";
	protected $pwd="pwd";

	function __construct()
	{
		$this->_db=M('basics_config');
	}
	public function getConfig()
	{
		$res=$this->_db->select();
		if(empty($res)){
			return revert(0,"数据库繁忙");
		}
		else{
			return revert(1,"成功",$res);
		}
	}
	public function update($item)
	{
		$res=$this->_db->save($item);
		if(empty($res)){
			return revert(0,"数据库繁忙");
		}
		else{
			return revert(1,"更新成功",$res);
		}
	}
}

