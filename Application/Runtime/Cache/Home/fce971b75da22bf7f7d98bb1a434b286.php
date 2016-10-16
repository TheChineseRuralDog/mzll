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
    <label  class="col-sm-2 control-label">任务名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-sm-4" placeholder="任务名称" v-model="form.name">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">url:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="url" v-model="form.url">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">流量({{ipCost}}元/1000ip/日):</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="" v-model="form.flow">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">PV/IP:</label>
    <div class="col-sm-10">
      <select class="form-control" v-model="form.proportion">
        <option selected>1/1</option>
        <option>2/1</option>
        <option>3/1</option>
        <option>4/1</option>
        <option>5/1</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">PV停留时间:</label>
    <div class="col-sm-10">
      <select class="form-control" v-model="form.tid">
        <option selected value="0">请选择pv停留时间</option>
        <option v-for="i in pvTime" value="{{i.id}}">{{i.time}}</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">费用 :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="" v-model="price" disabled>
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
      <button type="button" class="btn btn-default" @click="submit">提交订单</button>
    </div>
  </div>
</form>
<!-- <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=786942729&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:786942729:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a> -->
<script type="text/javascript">
  var order=new Vue({
    el:"#form",
    data:{
      form:{
        name:"",
        url:"",
        flow:"",
        proportion:"",
        tid:"",
      },
      pvTime:<?php echo ($time); ?>,
      ipCost:<?php echo ($ipCost); ?>,
      price:0,
    },
    computed:{
      price:function() {
        var rate=1;
        if(this.form.tid==0){
          console.log(1);
          rate=1;
        }
        for (var i = this.pvTime.length - 1; i >= 0; i--) {
          if(this.pvTime[i]["id"]==this.form.tid){
            console.log(this.pvTime[i]);
            rate=this.pvTime[i]["pricerate"];
          }
        }
        return rate;
      }
    },
    methods:{
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
      },

    }
  })
</script>

</body>
</html>