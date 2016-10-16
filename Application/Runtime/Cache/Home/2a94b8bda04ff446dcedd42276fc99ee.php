<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>点百度</title>

    <script src="/Public/js/jquery-3.0.0.min.js"></script>
    <script src="/Public/js/vue.min.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/css/reset.css">
    
</head>
<body>
         <link rel="stylesheet" type="text/css" href="/Public/css/main.css">

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
                        <li>REGISTERED<br><a href="/index.php?m=home&c=index&a=resgin" style="color:#000;">免费注册</a></li>
                    </ul><div class="logo right"></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <!-- 头部导航栏结束-->
        <div class="section section1">
            <div class="btn_1st clear">
                <div class="btn btn1 ">
                    <div class="side face"><img src="/Public/images/btn1.png"></div>
                    <div class="side back">
                        <img src="/Public/images/btn_back.png">
                        <p><a href="#register">快速<br>登录</a></p>
                    </div>
                </div>
                <div class="btn btn2">
                    <div class="side face"><img src="/Public/images/btn2.png"></div>
                    <div class="side back">
                        <img src="/Public/images/btn_back2.png">
                        <p><a>流量<br>介绍</a></p>
                    </div>
                </div>
                <div class="btn btn3">
                    <div class="side face"><img src="/Public/images/btn3.png"></div>
                    <div class="side back">
                        <img src="/Public/images/btn_back3.png">
                        <p><a>问题<br>帮助</a></p>
                    </div>
                </div>
                <div class="btn btn4">
                    <div class="side face"><img src="/Public/images/btn4.png"></div>
                    <div class="side back">
                        <img src="/Public/images/btn_back4.png">
                        <p><a>关于<br>我们</a></p>
                    </div>
                </div>
                <div class="btn btn5">
                    <div class="side face"><img src="/Public/images/btn5.png"></div>
                    <div class="side back">
                        <img src="/Public/images/btn_back5.png">
                        <p><a>免费<br>注册</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section2">
            <div class="section2_title">
                <span>我们助您跨出财富</span><br>
                <span style="font-weight: 600">第一步</span>
            </div>
            <div class="section2_text">
                <span>点百度流量平台是最方便的提升网站流量，提升店铺PC流量+无线流量，提升IP、PV和UV的平台，价格实在，质量保证。通过此平台，可快速提高网站的流量和访问量，网店的人气，网站的广告收入。操作简单，功能强大，收费低廉、定制灵活，控制精准等多个特点。</span>
            </div>
        </div>
        <div class="section section3">
            <div class="section3_text1">
                <p style="color: #76a717;font: 24px 'Microsoft YaHei';line-height: 40px">刷手机淘宝无线流量的设置方法</p>
                <p style="text-indent: 2em">
                    首先在 刷电商宝贝人气 板块下创建一个新任务。获得淘宝无限流量宝贝链接的方法：点击手机淘宝链接<a href="https://m.taobao.com" style="cursor:pointer;;color: #ff0000">https://m.taobao.com</a> 进入你的手机端店铺里，（要在电脑上打开，不能使用手机操作，否则不能获得无线淘宝链接），找到要刷流量的宝贝，然后在浏览器里复制这个宝贝链接粘贴到刷电商宝贝人气的任务设置的宝贝链接一栏中，就可以刷到无线流量了，生意参谋可以查看到无线数据。
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如果你有不懂的地方，请你联系网站客服QQ咨询，谢谢！
                    <br><span style="color: #ff0000">充值买点刷流量，1点最多可刷1000ip流量，充值折扣+等级赠送，详情咨询客服。</span></p>
            </div>
            <div class="section3_text2">
                <p>点百度流量平台是最方便的快速提
                    升网站流量，提升店铺流量+无线
                    流量,提升网站IP、PV和UV的平台，
                    适用于各大网站、淘宝天猫和京东
                    等各大电商平台提高流量和人气。
                    价格实在，质量保证.</p>
                <p style="font: 14px 'SimHei';line-height: 26px;color: #ff0000">
                    （第一次使用请先注册会员，然后创建新任务刷流量）
                    <br>1元钱=1000流量ip（访客量）+ 充值折扣+等级赠送，
                     <br>1万ip流量最低4.3元；
                </p>
            </div>

        </div>
        <div id="register" class="section section4">
            <div class="login">
                <div class="top"><a href="" style="line-height: 65px;color: #ff0000;text-decoration: underline">免费注册</a></div>
                <input type="text" class="uid" v-model="form.phone">
                <input type="password" class="pwd" v-model="form.pwd">
                <input type="text" class="checkcode" v-model="form.code">
                <img id="code" src="<?php echo U('Home/Index/verify_c',array());?>">
                <div class="bottom">
                    <input id="checkbox" type="checkbox">
                    <label style="cursor:pointer;" for="checkbox">记住登录状态</label>
                    <span>|</span>
                    <a style="cursor: pointer;color: #99cc01;text-decoration: underline">忘记密码？</a>
                </div>
                <div class="login_btn" @click="submit" id="submit">
                    登录账户
                </div>
            </div>
            <script type="text/javascript">
                var login=new Vue({
                    el:"#register",
                    data:{
                        form:{
                            phone:"",
                            pwd:"",
                            code:"",
                        }
                    },
                    methods:{
                        submit:function(res) {
                            $.post("/index.php?m=home&c=index&a=doLogin",{form:login.form},function(res) {
                                if(res.status==1){
                                    dialog.successFun(res.message,function() {
                                        window.location.href="/index.php?m=home&c=index&a=manage";
                                        return;
                                    })
                                }
                                else{
                                    dialog.error(res.message);
                                    $("#code").click();
                                    login.form.code="";
                                }
                            },"json")
                        }  
                    }
                })
            </script>
        </div>
    </div>
<script type="application/javascript">
        $(document).ready(function(){
            var change_fun=function(){
                var b_width=$(window).width();
                if(1067<=b_width&&b_width<=1920){
                    var b_change="-"+((1903-b_width)/2).toString()+"px";
                    //alert(b_change);
                    $(".warp").css("left",b_change);
                    document.body.style.overflowX="hidden";
                    //$.body.style.overflowX="hidden";
                }
                else if(b_width<1067){
                    //alert("太小了");
                    $(".warp").css("left","-418px");
                    document.body.style.overflowX="visible";
                }

            }
            change_fun();
            $(window).resize(function(){
                change_fun();
            });
            $("#code").click(function() {
                $(this).attr("src", $(this).attr("src")+'&random='+Math.random());
            });

        });

</script>


</body>
</html>