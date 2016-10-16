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
        <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
<form class="form-horizontal" id="form">
  <div class="form-group">
    <label  class="col-sm-2 control-label">手机号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-sm-4" placeholder="手机号" v-model="form.phone">
      <input type="button" id="btn" class="btn btn-primary" @click="sendCode" value="发送验证码">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">验证码：</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="验证码" v-model="form.code">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" placeholder="Password" v-model="form.pwd">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <!-- <input type="checkbox"> Remember me -->
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-default" @click="submit">注册</button>
    </div>
  </div>
</form>
<!-- <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=786942729&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:786942729:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a> -->
<script type="text/javascript">
  var resgin=new Vue({
    el:"#form",
    data:{
      form:{
        phone:"",
        code:"",
        pwd:"",
        parent:<?php echo ($parent); ?>
      }
    },
    methods:{
      sendCode:function() {
        if(!(/^1[3|4|5|7|8]\d{9}$/.test(resgin.form.phone))){
            alert("手机号码有误，请重填");
            return false; 
        } 
        $.get("/index.php?c=home&c=index&a=sendCode",{phone:resgin.form.phone},function(res) {
            if(res.status==1){
              $("#btn").val("已发送，请注意查收");
              $("#btn").removeClass("btn-primary");
              $("#btn").removeClass("btn-warning");
              $("#btn").addClass("btn-success");
            }
            else{
              // $("#btn").val(res.message);
              // $("#btn").removeClass("btn-primary");
              // $("#btn").addClass("btn-warning");
              dialog.error(res.message);
            }
        },"json")
      },
      submit:function() {
        $.post("/index.php?c=home&c=index&a=doRegin",{form:resgin.form},function(res) {
            if(res.status==1){
              dialog.successFun(res.message,function() {
                window.location.href="/index.php?m=Home";
              })
            }
            else{
              dialog.error(res.message);              
            }
        },"json")
      }
    }
  })
</script>

</body>
</html>