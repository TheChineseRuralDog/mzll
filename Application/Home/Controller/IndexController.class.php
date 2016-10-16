<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	layout("Layout/layout");
        $this->display();
    }
    private function layoutInit()
    {
    	// $this->assign("topNav",json_encode(D("Cate")->topNav()));
    	// $this->assign("nav",json_encode(D("Cate")->nav()));
    }
    public function manage()
    {
        $res=$this->checkLogin();
        if($res["status"]==0){
            $this->error($res["message"],"/index.php?m=home&c=index");
        }
        $this->assign("user",json_encode(session("user")));
        $this->display();
    }
    public function resgin()
    {
        layout("Layout/layout");
        $this->assign("parent",json_encode(0));
        $this->display();
    }
    public function extensionRegin()
    {
        $id=I("get.id");
        layout("Layout/layout");
        $this->assign("parent",json_encode($id));
        $this->display("resgin");
    }
    public function userExit()
    {
        session("user",null);
        cookie("user",null);
        show(1,"注销成功");
    }
    public function login()
    {
        layout("Layout/layout");
        $this->display();
    }
    public function doLogin()
    {
        $form=I("post.form");
        $phone=$form["phone"];
        $pwd=$form["pwd"];
        $code=$form["code"];
        $res=D("User")->login($phone,md5($pwd),$code);
        if($res["status"]==1){
            unset($res["data"]["pwd"]);
            session("user",$res["data"]);
        }
        show($res["status"],$res["message"],$res["data"]);
    }
    public function doRegin()
    {
        $form=I("post.form");

        $res=D("UserAdmin")->resgin($form);
        show($res["status"],$res["message"]);
        
    }
    public function sendCode()
    {
        $phone=I("get.phone");
        $res=D("UserAdmin")->userUniqid(array('phone' =>$phone , ));
        if($res["status"]==0){
            show(0,$res["message"]);
        }
        $res=D("UserAdmin")->sendCode($phone);
        show($res["status"],$res["message"]);
    }
     /** 
     *  
     * 验证码生成 
     */  
    public function verify_c(){  
        $Verify = new \Think\Verify();  
        $Verify->fontSize = 18;  
        $Verify->length   = 4;  
        $Verify->useNoise = false;  
        $Verify->codeSet = '0123456789';  
        $Verify->imageW = 130;  
        $Verify->imageH = 50;  
        //$Verify->expire = 600;  
        $Verify->entry();  
    } 
    private function verifycode($phone,$code)
    {
        $AppKey = 'c0aa27ceaba75e21223ccb6baddf646b';
        $AppSecret = '8093bca76393';
        $p = new \Org\Util\ServerAPI($AppKey,$AppSecret,'curl');      //php curl库
        $res=$p->verifycode($phone,$code);
        if($res["code"]=="200"){
            return revert(1,"验证成功");
        }
        else{
            return revert(0,"验证失败");
        }
    }
    /*
     *验证是否登录
    */
    private function checkLogin()
    {
        if(empty(session("user"))){
            return revert(0,"请先登录");
        }
        else{
            return revert(1,"已登录",session("user"));
        }
    }

}