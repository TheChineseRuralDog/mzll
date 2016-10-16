<?php 


namespace Common\Model;

use Think\Model;
/**
* 
*/
class MessageModel extends Model
{
	//表名
	private $_db="";
	//表的字段

	function __construct()
	{
		$this->_db=M('message');
	}
	public function add($message)
	{
		$res=$this->_db->add($message);
		if(empty($res)){
			return revert(0,"添加失败");
		}
		else{
			return revert(1,"添加成功",$res);
		}
	}
	public function getMessage($where="")
	{
		$res= $this->_db->where($where)->select();
		if(empty($res)){
			return revert(0,"获取失败");
		}
		else{
			return revert(1,"获取成功",$res);
		}
	}
	public function del($where)
	{
		$res=$this->_db->where($where)->delete();
		if(empty($res)){
			return revert(0,"删除失败");
		}
		else{
			return revert(1,"删除成功",$res);
		}
	}
	public function update($where,$message)
	{
		$res=$this->_db->where($where)->save($message);
		if(empty($res)){
			return revert(0,"修改失败");
		}
		else{
			return revert(1,"修改成功",$res);
		}
	}
}

