var dialog={
	//错误弹出层
	error:function (message) {
		layer.open({
			content:message,
			icon:2,
			title:"错误提示",
		});
	},
	//成功弹出层
	success:function (message,url) {
		layer.open({
			content:message,
			icon:1,
			yes:function () {
				location.href=url;
			},
		});
	},
	//成功后刷新页面
	successRefresh:function (message) {
		layer.open({
			content:message,
			icon:1,
			yes:function () {
				location.href=window.location.href;
			},
		});
	},
	//自定义成功函数
	successFun:function (message,fun) {
		layer.open({
			content:message,
			icon:1,
			yes:function (index) {
				fun();
				layer.close(index);
			},
		});
	},
	//询问框
	confirm:function (message,btn1,btn2,fun1,fun2,param1) {
		layer.confirm(message, {
		  btn: [btn1,btn2] //按钮
		}, function(index){
			fun1(param1);
			layer.close(index);
		}, function(){
			fun2();
			layer.close(index);
		});
	},
	//无需跳转指定页面的弹出层
	toconfirm:function (message) {
		layer.open({
			content:message,
			icon:1,
			btn:['确定'],
		});
	},
	//iframe层
	iframe:function (title,url) {
		layer.open({
		  type: 2,
		  title: title,
		  shadeClose: true,
		  shade: 0.8,
		  area: ['800px', '600px'],
		  content: url //iframe的url
		}); 
	},
	iframeBox:function(title,url,width,height) {
		layer.open({
		  type: 2,
		  title: title,
		  shadeClose: true,
		  shade: 0.8,
		  area: [width, height],
		  content: url //iframe的url
		}); 
	},
}