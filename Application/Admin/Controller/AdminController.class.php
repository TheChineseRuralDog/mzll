<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function Login(){
    	$this->display();
    }
    public function doLogin()
    {
    	$name=I("post.name");
    	$pwd=I("post.pwd");
    	$autoLogin=I("post.autoLogin");
        $res=D("Admin")->login($name,$pwd);
        if($res["status"]==1){
            unset($res["data"]["pwd"]);
            session("admin",$res["data"]);
        }
        if($res["status"]==1&&$autoLogin==true){
            cookie('admin',$admin,7*24*3600);
        }
        show($res["status"],$res["message"]);
    }
    public function Index()
    {
    	if(empty(session("admin"))){
    		header("Content-type: text/html; charset=".C('DEFAULT_CHARSET'));
			$this->redirect("Admin/Login", array(),1,'请先登录');
    	}

    	$this->assign("user",json_encode(session("admin")));
		$this->display();    	
    }
    public function userExit()
    {
    	session("admin",null);
    	cookie("admin",null);
    	show(1,"注销成功");
    }
    public function advertise()
    {
        $res=D('Cost')->advMark();
        $this->assign("status",$res["data"]);
        $this->display();
    }
    public function doAdvertiseUpate()
    {
        $status=I("get.status");
        $res=D('Cost')->saveMark($status);
        show($res["status"],$res["message"],$res["data"]);
        
    }
    public function basics()
    {
        $res=D("Config")->getConfig();
        $this->assign("first",json_encode($res["data"]["2"]["decimal"]));
        $this->assign("second",json_encode($res["data"]["3"]["decimal"]));
        $this->assign("ipcost",json_encode($res["data"]["0"]["decimal"]));
        $this->assign("adver",json_encode($res["data"]["1"]["mark"]));
        $this->display();
    }
    public function updateBasics()
    {
        $form=I("post.form");
        $config[0]["id"]="1";
        $config[0]["decimal"]=$form["ipcost"];
        $config[1]["id"]="2";
        $config[1]["mark"]=$form["adver"];
        $config[2]["id"]="3";
        $config[2]["decimal"]=$form["first"];
        $config[3]["id"]="4";
        $config[3]["decimal"]=$form["second"];
        $mark=0;
        foreach ($config as $key => $value) {
            $res=D("Config")->update($value);
            if(!empty($res)){
                $mark=1;
            }
        }
        if($mark){
            show(1,"更新成功");
        }
        else{
            show(0,"更新失败，没有任何更新项");
        }
    }
}