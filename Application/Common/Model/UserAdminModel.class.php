<?php 


namespace Common\Model;

use Think\Model;

/*
 *用户的注册和登录
*/
class UserAdminModel extends Model
{
	private $_admin="";
	private $_user="";
	private $_appKey="";
	private $_appSecret="";

	function __construct()
	{
		$this->_admin=M('admin');
		$this->_user=M('user');
		$this->_appKey='c0aa27ceaba75e21223ccb6baddf646b';
		$this->_appSecret='8093bca76393';
	}
	/*
	 *一般登录方法
	 *$name $Pwd $code数组
	*/
	public function login($name,$pwd,$code)
	{
		if(!check_verify($code)){
			return revert(0,"验证码错误");
        }
		$res=$this->getUser($where);
		if(empty($res)){
			return revert(0,"用户名不存在");
		}
		else{
			$key=array_keys($pwd)[0];
			if($res[$key]==$pwd[$key]){
				return revert(1,"登录成功",$res);
			}
			else{
				return revert(0,"密码错误");
			}
		}
		
	}
	/*
	 *一般验证码注册
	*/
	public function resgin($form)
	{
		$phone=$form["phone"];
        $code=$form["code"];
        $pwd=$form["pwd"];
        $parent=$form["parent"];
        $res=$this->userUniqid($phone);
        if($res["status"]==0){
        	return revert(0,"用户已存在");
        }
		$res=$this->verifycode($phone,$code);
		if($res["status"]==1){
            $extension=md5(uniqid());
            if($parent!=0){
				$parentUser=$this->getUser(array('extensionid' =>$parent , ));
				$user["parent"]=$parentUser["id"];
            }
            else{
            	$user["parent"]=0;
            }
            
            $user["phone"]=$phone;
            $user["pwd"]=md5($pwd);
            $user["extensionid"]=$extension;
            $user["extensionlink"]=$_SERVER['HTTP_HOST']."/index.php?a=Home&c=index&a=extensionRegin&id=".$extension;
            $res=$this->addUser($user);
            if($res>0){
                return revert(1,"注册成功");
            }
            else{
                return revert(0,"注册失败，数据库繁忙");
            }
        }
        else{
            return revert(0,"验证码错误");
        }
	}
	/*
	 *发送验证码
	*/
	public function sendCode($phone)
    {
        if(preg_match("/^1[34578]\d{9}$/", $phone)==0){
            show(0,"发送失败,手机号码错误");
        }
        $AppKey = $this->_appKey;
        $AppSecret = $this->_appSecret;
        $p = new \Org\Util\ServerAPI($AppKey,$AppSecret,'curl');      //php curl库
        $res=$p->sendSmsCode($phone,'');
        if($res["code"]=="200"){
            show(1,"发送成功");
        }
        else{
            show(0,"发送失败");
        }
    }
	/*
	 *用户的唯一性
	*/
	public function userUniqid($where)
	{
		$res=$this->getUser($where);
		if(empty($res)){
			return revert(1,"用户唯一");
		}
		else{
			return revert(0,"用户已存在",$res);
		}
	}
	//获取用户信息
	public function getUser($where){
		$res=$this->_user->where($where)->find();
		return $res;
	}
	//获取管理员信息
	public function getAdmin($where){
		$res=$this->_admin->where($where)->find();
		return $res;
	}
	//添加用户(无上级)
	public function addUser($user)
	{
		return $this->_user->add($user);
	}

	private function verifycode($phone,$code)
    {
        $AppKey = $this->_appKey;
        $AppSecret = $this->_appSecret;
        $p = new \Org\Util\ServerAPI($AppKey,$AppSecret,'curl');      //php curl库
        $res=$p->verifycode($phone,$code);
        if($res["code"]=="200"){
            return revert(1,"验证成功");
        }
        else{
            return revert(0,"验证失败");
        }
    }
    private function extensionLink()
    {
        return md5(uniqid());
        // return $_SERVER['HTTP_HOST']."/index.php?a=Home&c=index&a=extensionRegin&id=".$res;
    }
}

