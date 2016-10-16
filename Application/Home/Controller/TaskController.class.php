<?php
namespace Home\Controller;
use Think\Controller;
class TaskController extends Controller {
    public function index()
    {
    	layout("Layout/layout");
    	$res=D("Cost")->getTimeList();
    	$this->assign("time",json_encode($res["data"]));
    	$res=D("Cost")->geiIpCost();
    	$this->assign("ipCost",json_encode($res["data"]));
        $this->display();
    }
    public function add()
    {
        // $form=
    }
}