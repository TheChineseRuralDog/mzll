<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/css/adminAdmin.css" rel="stylesheet">
    <script src="/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/Public/js/vue.min.js"></script>
    <script src="/Public/js/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/ajaxfileupload.js"> </script>
    <script src="/kindeditor/kindeditor-all-min.js"> </script>
    <script>
        var init=new Vue({
            data:{
                user:<?php echo ($user); ?>,
                picItem:"",
            }
        });
    </script>
</head>
<body>
<div class="container">
    <aside class="col-md-2">
        <div id="user">
            <h1>{{user.name}}</h1>
            <a><span class="glyphicon glyphicon-cog"></span></a>
            <a v-on:click="exit"><span class="glyphicon glyphicon-off"></span></a>
        </div>
        <script>
            var user=new Vue({
                el:"#user",
                data:{
                    user:""
                },
                computed:{
                    user:function(){
                        return init.user;
                    }
                },
                methods:{
                    exit:function(event){
                        $.get("/index.php?m=Admin&c=Admin&a=userExit",{},function(res){
                            if(res.status==1){
                                dialog.successFun(res.message,'window.location.href="/index.php?m=Admin&c=Admin&a=Login"');
                            }
                            else{
                                dialog.error("注销失败");
                            }
                        },"json")
                    }
                }
            });

        </script>

        <ul id="left_nav">
            <li class="list-unstyled" id="cate">
                <span class="glyphicon glyphicon-align-justify"></span><p>功能管理</p>
                <a class="get" id="cateList"  v-on:click="basics">基本设置</a>
                <a class="get" id="cateList"  v-on:click="cateList">财务列表</a>
                <a class="get" id="cateList"  v-on:click="userList">用户列表</a>
                <a class="get" id="cateList"  v-on:click="orderList">任务列表</a>
                <a class="get" id="cateList"  v-on:click="cost">费用设置</a>
                <a class="get" id="cateList"  v-on:click="advertise">首页广告位</a>
            </li>
            <li class="list-unstyled" id="content_management">
                <span class="glyphicon glyphicon-th-large"></span><p>消息设置</p>
                <a class="get" id="alone" v-on:click="messageSend" >发送消息</a>
                <a class="get" id="alone" @click="messageList">消息列表</a>
            </li>
           <!--  <li class="list-unstyled" id="content_management">
                <span class="glyphicon glyphicon-th-large"></span><p>留言管理</p>
                <a class="get" id="alone" @click="Comments">留言查看</a>
            </li> -->
            <script>
                var nav=new Vue({
                    el:"#left_nav",
                    data:{},
                    methods:{
                        basics:function() {
                            $.get("/index.php?m=Admin&c=admin&a=basics",{},function(res) {
                                $("#content").html(res);
                            })
                        },
                        userList:function() {
                            $.get("/index.php?m=Admin&c=user&a=userList",{},function(res) {
                                $("#content").html(res);
                            })
                        },
                        orderList:function() {
                            $.get("/index.php?m=Admin&c=order&a=orderList",{},function(res) {
                                $("#content").html(res);
                            })
                        },
                        cost:function() {
                            $.get("/index.php?m=Admin&c=cost&a=cost",{},function(res) {
                                $("#content").html(res);
                            })
                        },
                        advertise:function() {
                            $.get("/index.php?m=Admin&c=admin&a=advertise",{},function(res) {
                                $("#content").html(res);
                            })
                        },
                        messageSend:function() {
                            $.get("/index.php?m=Admin&c=message&a=addMessage",{},function(res) {
                                $("#content").html(res);
                                editor=KindEditor.create('textarea[name="content"]',{
                                    uploadJson : '/kindeditor/php/upload_json.php',
                                    fileManagerJson : '/kindeditor/php/file_manager_json.php',
                                    allowFileManager : true,
                                });
                            })
                        },
                        messageList:function() {
                            $.get("/index.php?m=Admin&c=message&a=messageList",{},function(res) {
                                $("#content").html(res);
                            })
                        },
                    }
                });
            </script>
        </ul>
    </aside>
    <style type="text/css">
        #content{
            padding: 20px 30px;

        }
    </style>
    <div class="content col-md-10">
        <header>
            <p>后台管理系统</p>
        </header>
        <div id="content">

        </div >
    </div>
</div>
<script type="text/javascript">
    nav.basics();
</script>
</body>
</html>