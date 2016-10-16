<?php 


namespace Common\Model;

use Think\Model;
/**
* 
*/
class UserModel extends Model
{
	//表名
	private $_db="";
	//表的字段
	protected  $id="id";
	protected  $name="phone";
	protected  $pwd="pwd";
	protected  $balance="balance";
	protected  $parent="parent";

	// protected $_validate =array(
 //        array('name','require','用户名必须'),
 //        array('name','','用户名已存在!',0,'unique',1),
 //        array('email','email','email格式错误'),
 //    );
	function __construct()
	{
		$this->_db=M('user');
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
	public function userList($where,$page=1,$num=10)
	{
		return $this->_db->where($where)->page($page,$num)->select();
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
	//获取用户信息
	public function getUser($where){
		$res=$this->_db->where($where)->find();
		return $res;
	}
	//添加用户(无上级)
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

