<?php 


namespace Common\Model;

use Think\Model;
/**
* 
*/
class AdminModel extends Model
{
	//表名
	private $_db="";
	//表的字段
	protected $id="id";
	protected $name="name";
	protected $pwd="pwd";

	function __construct()
	{
		$this->_db=M('admin');
	}
	/*
	 *$name 用户名 
	 *$pwd 密码 
	*/
	public function login($name,$pwd)
	{
		$where = array($this->name => $name, );
		$res=$this->getUser($where);
		if(empty($res)){
			return revert(0,"用户名不存在");
		}
		else{
			if($res[$this->pwd]==$pwd){
				return revert(1,"登录成功",$res);
			}
			else{
				return revert(0,"密码错误");
			}
		}
		
	}
	//获取用户信息
	public function getUser($where){
		$res=$this->_db->where($where)->find();
		return $res;
	}

	//添加用户
	public function addUser($user)
	{
		return $this->_db->add($user);
	}
	//根据id获取用户信息
	public function getPostInfoByUid($id)		
	{
		$postInfo["count"]=M("post")->where("uid=".$id)->count();
		return $postInfo;
	}
	//修改用户信息
	public function doEditorUserInfo($id,$post)
	{
		return $this->_db->where("id=".$id)->setField($post);
	}
	//保存用户头像
	public function saveHeadImg($headImg,$id)
	{
		return $this->_db->where("id=".$id)->setField(array('headImg' => $headImg, ));
	}
	//验证用户名是否唯一
	public function UserUnique($name)
	{
		if($this->_db->where("name=".$name)->find()){
			return false;
		}
		else{
			return true;
		}
	}
}

