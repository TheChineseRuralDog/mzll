<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function userList(){
    	$this->assign("list",json_encode(D("User")->userList("")));
    	$this->display();
    }
    public function del()
    {
    	$uid=I("get.uid");
    	$res=D("User")->del(array('id' =>$uid , ));
    	show($res["status"],$res["message"],$res["data"]);
    }
    public function userListAjax()
    {
    	$res=D("User")->userList("");
    	if(!empty($res)){
			show(1,"获取成功",$res);
    	}
    	
    }
    public function update()
    {
    	$id=I("get.uid");
    	$res=D("User")->userList(array('id' =>$id , ));
    	$this->assign("user",json_encode($res[0]));
    	$this->display();
    }
    public function delBatch()
    {
    	$uid=I("get.uid");
    	$res=D("User")->del("id in (".$uid.")");
    	show($res["status"],$res["message"],$res["data"]);
    }
}