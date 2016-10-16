<?php
namespace Admin\Controller;
use Think\Controller;
class CostController extends Controller {
    public function cost(){
        $res=D("Cost")->getTimeList();
        $this->assign("pvCost",json_encode($res["data"]));
    	$this->display();
    }
    public function addPvCate()
    {
        $this->display();
    }
    public function doAddPvCate()
    {
        $time=I("post.form");
        $res=D("Cost")->addPvCate($time);
        show($res["status"],$res["message"],$res["data"]);
    }
    public function ajaxGetPvCate()
    {
        $res=D("Cost")->getTimeList();
        show($res["status"],$res["message"],$res["data"]);
    }
    public function del()
    {
        $id=I("get.id");
        $res=D("Cost")->del( array('id' =>$id , ));
        show($res["status"],$res["message"],$res["data"]);
    }
    public function update()
    {
        $message="";
        $pvCost=I("post.pvCost");
        $res=D("Cost")->updatePvCost($pvCost);
        $message=$message.$res["message"];
        if($res["status"]==0&&$res1["status"]==0){
            show(0,$message);
        }
        else{
            show(1,$message);
        }
    }
}