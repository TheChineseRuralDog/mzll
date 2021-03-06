<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>点百度</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/manage.css">
    <script src="/Public/js/jquery-3.0.0.min.js"></script>
    <script src="/Public/js/vue.min.js"></script>
    <script src="/Public/js/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
</head>
<script type="text/javascript">
    var init=new Vue({
        data:{
            user:<?php echo ($user); ?>,
        }
    })
</script>
<body>

<div class="warp">
    <!-- 头部导航栏-->
    <div class="header">
        <div class="content">
            <div class="top">
                <div class="email right"><img src="/Public/images/email.png"><span>272833200@qq.com</span></div>
                <div class="tel right"><img src="/Public/images/tel.png"><span>+4008888888</span></div>
            </div>      
            <div class="bottom clear">

                <ul class="head_nav right">
                    <li>HMOE<br>首页</li>
                    <li>INTRODUCTION<br>流量介绍</li>
                    <li>HELP<br>问题帮助</li>
                    <li>ABOUT US<br>关于我们</li>
                    <li>REGISTERED<br>免费注册</li>
                </ul><div class="logo right"></div>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
    <!-- 头部导航栏结束-->
    <div class=" section section1">
        <div class="section1_con">
            <div class="userinfo" id="userInfo">
                <p>
                    欢迎您，<span class=" red u_email">{{user.phone}} 用户</span>
                    <a class="creat" href="/index.php?m=home&c=Task">新建任务</a>
                    <span>账户余额：<span class=" red u_money">{{user.balance}}</span><span>点</span>|<a class="red">充值</a></span>
                    <!-- <span>会员等级：<span class=" red u_type">普通用户</span></span> -->
                    <span>|<a class="red" @click="exit">退出登录</a></span>
                </p>
            <script type="text/javascript">
                var user=new Vue({
                    el:"#userInfo",
                    data:{
                        user:init.user,
                    },
                    methods:{
                        exit:function() {
                            $.get("/index.php?m=home&c=index&a=userExit",{},function(res) {
                                if(res.status==1){
                                    dialog.successFun(res.message,function() {
                                        window.location.href="/index.php?m=home&c=index";
                                    });
                                }
                            },"json")
                        },
                        add:function() {
                            
                        }
                    }
                })
            </script>
            </div>
            <table>
                <tr class="title">
                    <td class="tab_no">序号</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">来源数量</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt">操作</td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
                <tr>
                    <td class="tab_no">1</td>
                    <td class="tab_name">模版名称</td>
                    <td class="tab_type">模版类型</td>
                    <td class="tab_num">1条</td>
                    <td class="tab_time">更新时间</td>
                    <td class="tab_opt"><a class="btn delete">修改</a><a class="btn update">删除</a></td>
                </tr>
            </table>
            <div class="page_flow">
                <select>
                    <option value="0">每页显示10条</option>
                    <option value="1">每页显示20条</option>
                    <option value="2">每页显示30条</option>
                </select>
                <a>第一页</a>
                <a>上一页</a>
                <a>下一页</a>
                <a>最后一页</a>
                <a>共<span>1</span>页</a>
                <span>到<input class="page_num" type="text" value="1">页</span>
                <a class="go_page">跳转</a>
            </div>
        </div>
    </div>
    <div id="register" class="section section2">

    </div>
</div>
<script type="application/javascript" src="/Public/js/position.js"></script>

</body>
</html>