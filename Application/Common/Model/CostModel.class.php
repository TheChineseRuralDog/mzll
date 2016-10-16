<?php 


namespace Common\Model;

use Think\Model;
/**
* 
*/
class CostModel extends Model
{
	//表名
	private $_time="";
	private $config="";
	//表的字段
	protected  $id="id";
	protected  $time="time";
	protected  $priceRate="priceRate";


	function __construct()
	{
		$this->_time=M('time');
		$this->_ipCost=M('basics_config');
	}
	public function getTimeList()
	{
		$res=$this->_time->select();
		if(empty($res)){
			return revert(0,"获取失败");
		}
		else{
			return revert(1,"获取成功",$res);
		}
	}
	public function geiIpCost()
	{
		$res=$this->_ipCost->where("id=1")->find();
		if(empty($res)){
			return revert(0,"获取失败");
		}
		else{
			return revert(1,"获取成功",$res["decimal"]);
		}
	}
	public function addPvCate($data)
	{
		$res= $this->_time->add($data);
		if(empty($res)){
			return revert(0,"添加失败");
		}
		else{
			return revert(1,"添加成功");
		}
	}
	public function updatePvCost($list)
	{
		$k=false;
		foreach ($list as $key => $value) {
			$res=$this->_time->where("id=".$value["id"])->save($value);
			if(!empty($res)){
				$k=true;
			}
		}
		if($k){
			return revert(1,"pv附加费用更新成功");
		}
		else{
			return revert(0,"pv附加费用没有更新");
		}
	}
	public function upateIpCost($data)
	{
		$res=$this->_ipCost->where("id=1")->save($data);
		if(empty($res)){
			return  revert(0,"ip基础费用没有更新");
		}
		else{
			return  revert(1,"ip基础费用更新成功");
		}
	}
	public function del($where)
	{
		$res=$this->_time->where($where)->delete();
		if(empty($res)){
			return revert(0,"删除失败");
		}
		else{
			return revert(1,"删除成功",$res);
		}
	}
	public function advMark()
	{
		$res=$this->_ipCost->where("id=2")->find();
		if(empty($res)){
			return revert(0,"获取失败");
		}
		else{
			return revert(1,"获取成功",$res["mark"]);
		}
	}
	public function saveMark($mark)
	{
		$res=$this->_ipCost->where("id=2")->setField("mark",$mark);
		if(empty($res)){
			return revert(0,"更改失败，状态未变");
		}
		else{
			return revert(1,"更改成功");
		}
	}
}

