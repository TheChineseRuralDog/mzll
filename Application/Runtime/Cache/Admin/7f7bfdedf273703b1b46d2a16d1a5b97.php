<?php if (!defined('THINK_PATH')) exit();?><h3 style="margin-bottom:30px;">基本设置</h3>
<form id="form">
  <div class="form-group">
    <label>一级分销提成</label>
    <input type="text" class="form-control" v-model="form.first" placeholder="一级分销提成设置">
  </div>
  <div class="form-group">
    <label>二级分销提成</label>
    <input type="text" class="form-control" v-model="form.second" placeholder="二级分销提成设置">
  </div>
  <div class="form-group">
    <label>ip基本费用(元/1000ip/日)</label>
    <input type="text" class="form-control" v-model="form.ipcost" placeholder="ip基本费用">
  </div>
  <div class="form-group">
    <label>广告开启和关闭 </label>
  </div>
  <div class="radio">
    <label>
      <input type="radio" v-model="form.adver" value="1">
      开启
    </label>
  </div>
  <div class="radio">
    <label>
      <input type="radio" v-model="form.adver" value="0" >
      关闭
    </label>
  </div>
  <button type="button" @click="submit" class="btn btn-default">保存</button>
</form>

<script type="text/javascript">
  var form=new Vue({
    el:"#form",
    data:{
      form:{
        first:<?php echo ($first); ?>,
        second:<?php echo ($second); ?>,
        ipcost:<?php echo ($ipcost); ?>,
        adver:<?php echo ($adver); ?>,
      }
    },
    methods:{
      submit:function() {
        $.post("/index.php?m=admin&c=admin&a=updateBasics",{form:form.form},function(res) {
          if(res.status==1){
            dialog.successFun(res.message,function() {
              return;
            })
          }
          else{
            dialog.error(res.message,function() {
              return;
            })
          }
        },"json");
      }
    }
  })
</script>