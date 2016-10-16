<?php 


namespace Common\Model;

use Think\Model;
/**
* 
*/
class OrderModel extends Model
{
	//表名
	private $_db="";
	private $_order="orders";
	private $_time="time";
	private $_user="user";
	//表的字段
	protected  $id="id";
	protected  $uid="uid";
	protected  $ip="ip";
	protected  $pv="pv";
	protected  $url="url";
	protected  $name="name";
	protected  $price="price";
	protected  $tid="tid";


	function __construct()
	{
		$this->_db=M('Orders');
	}
	public function userList($where,$page=1,$num=10)
	{
		$t1=$this->_user;
		$t2=$this->_time;
		$res= $this->_db->alias("o")->field("o.id,o.ip,o.pv,o.url,o.name,t.time,u.phone,o.date,o.price")->join($t1." u on u.id=o.uid")->join($t2." t on t.id=o.tid")->where($where)->page($page,$num)->select();
		foreach ($res as $key => $value) {
			$res[$key]["date"]=date('Y-m-d H:i',$value["date"]);
		}
		return $res;
	}
	public function del($where)			
	{
		$res=$this->_db->where($where)->delete();
		if(empty($res)){
			return revert(0,"删除失败");
		}
		else{
			return revert(1,"删除成功");
		}
	}
}

