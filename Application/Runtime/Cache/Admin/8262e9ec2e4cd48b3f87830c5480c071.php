<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
	/*#cost{
		text-align: left;
		font-weight: bold;
		font-size: 14px;
	}*/
</style>
<div class="container" id="cost">
	<form class="form-horizontal" style="padding:25px;" >
	  	<div class="form-group">
	    	<h3 class="col-sm-10 col-sm-offset-2 control-label" style="text-align: left;">pv附加费<span style="font-weight: normal;font-size: 14px;">(基于ip基本费用的倍率)</span></h3>
	  	</div>

	  	<div class="form-group" v-for="i in list">
			<!-- <label class="col-sm-2  col-sm-offset-2 control-label">{{i.time}}</label> -->
			<div class="col-sm-3 col-sm-offset-2">
				<input data-index="{{ $index }}" type="email" class="form-control" id="inputEmail3" value="{{i.time}}" v-on:blur="updateCate">
		    </div>
		    <div class="col-sm-2">
		      <input data-index="{{ $index }}" type="email" class="form-control" id="inputEmail3" value="{{i.pricerate}}" v-on:blur="updatePrice">
		    </div>
	    	<label class="col-sm-1 control-label"><a data-id="{{i.id}}" @click="del">删除</a></label>
	  	</div>

	  	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-2">
	      <button type="button" class="btn btn-default" @click="sub">保存</button>
	    </div>
	    <div class="col-sm-4">
	      <button type="button" class="btn btn-default" @click="addPvCate">添加pv附加费用项</button>
	    </div>
	 </div>
	</form>
</div>
<script type="text/javascript">
	var list=new Vue({
		el:"#cost",
		data:{
			list:<?php echo ($pvCost); ?>
		},
		methods:{
			addPvCate:function() {
				dialog.iframeBox("添加pv附加费用项","/index.php?m=admin&c=cost&a=addPvCate","80%","80%");
			},
			updatePvCate:function(){
				$.get("/index.php?m=admin&c=cost&a=ajaxGetPvCate",{},function(res) {
					list.list=res.data;
				},"json")
			},
			del:function(event) {
				var id=event.currentTarget.dataset.id;
				$.get("/index.php?m=admin&c=cost&a=del",{id:id},function(res) {
					if(res.status==1){
						list.updatePvCate();
						dialog.successFun(res.message,function() {
							return;
						});
					}
					else{
						dialog.error(res.message);
					}
				},"json")
			},
			sub:function() {
				$.post("/index.php?m=admin&c=cost&a=update",{ipCost:list.ipCost,pvCost:list.list},function(res) {
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
			},
			updatePrice:function(event){
				var index=event.currentTarget.dataset.index;
				var val=event.currentTarget.value;
				list.list[index].pricerate=val;
			},
			updateCate:function(event) {
				var index=event.currentTarget.dataset.index;
				var val=event.currentTarget.value;
				list.list[index].time=val;
			}
		}
	})
</script>