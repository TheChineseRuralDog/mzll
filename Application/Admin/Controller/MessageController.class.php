<?php
namespace Admin\Controller;
use Think\Controller;
class MessageController extends Controller {
    public function addMessage()
    {
        $this->display();
    }
    public function doAddMessage()
    {
        $form=I("post.form");
        $form["date"]=time();
        $res=D("Message")->add($form);
        show($res["status"],$res["message"],$res["data"]);
    }
    public function messageList()
    {
        $res=D("Message")->getMessage();
        $this->assign("list",json_encode($res["data"]));
        $this->display();
    }
    public function ajaxMessageList()
    {
        $res=D("Message")->getMessage();
        show(1,"更新成功",$res["data"]);
    }
    public function del()
    {
        $id=I("get.id");
        $res=D("Message")->del( array('id' =>$id , ));
        show($res["status"],$res["message"],$res[0]["data"]);
    }
    public function update()
    {
        $id=I("get.id");
        $res=D("Message")->getMessage(array('id' =>$id , ));
        $this->assign("message",json_encode($res["data"][0]));
        $this->display();
    }
    public function doUpdateMessage()
    {
        $form=I("post.form");
        $res=D("Message")->update(array('id' => $form["id"], ),$form);
        show($res["status"],$res["message"],$res[0]["data"]);   
    }
}