<?php if (!defined('THINK_PATH')) exit();?><div id="list">
    <table id="list" class="table table-striped">
    <tr>
        <td><input type="checkbox" @click="checkAll"></td>
        <td>编号</td>
        <td>用户手机号</td>
        <td>ip</td>
        <td>pv/ip</td>
        <td>网站地址</td>
        <td>任务名称</td>
        <td>订单价格</td>
        <td>驻留时间</td>
        <td>下单时间</td>
        <td>操作</td>
    </tr>
    <tr v-for="i in list" data-id="{{i.id}}">
        <td><input type="checkbox" class="checkbox" v-model="checkbox" value="{{i.id}}"></td>
        <td>{{i.id}}</td>
        <td>{{i.phone}}</td>
        <td>{{i.ip}}</td>
        <td>{{i.pv}}</td>
        <td>{{i.url}}</td>
        <td>{{i.name}}</td>
        <td>{{i.price}}</td>
        <td>{{i.time}}</td>
        <td>{{i.date}}</td>
        <td data-id={{i.id}}>
            <!-- <a @click="update">查看详细信息</a> -->
            <a @click="confirm" >删除</a>
        </td>
    </tr>
    </table>
    <ul class="btn-group">
        <li class="btn btn-default" @click="delAll">批量删除</li>
    </ul>

</div>

<script>
    var list=new Vue({
        el:"#list",
        data:{
            checkbox:[],
            list:<?php echo ($list); ?>,
        },
        methods:{
            confirm:function(event){
                var uid=event.currentTarget.parentNode.dataset.id;
                dialog.confirm("是否删除","是","否",function(uid) {
                    list.del(uid);
                },function() {
                    
                },uid);
               
            },
            del:function(uid) {
                $.get("/index.php?m=Admin&c=user&a=del",{uid:uid},function(res) {
                    if(res.status==1){
                        $.get("/index.php?m=Admin&c=user&a=userListAjax",{},function(res) {
                            list.list=res.data;
                        },"json");
                        dialog.toconfirm(res.message);
                    }
                    else{
                        dialog.error(res.message);
                    }
                },"json");
            },
            update:function(event) {
                var id=event.currentTarget.parentNode.dataset.id;
                dialog.iframeBox("用户信息","/index.php?m=Admin&c=user&a=update&uid="+id,"80%","80%")
                
                // $.get("/index.php?m=Admin&c=List&a=update",{mid:mid},function(res) {
                //   $("#content").html(res);
                //   editor=KindEditor.create('textarea[name="content"]',{
                //       uploadJson : '/kindeditor/php/upload_json.php',
                //       fileManagerJson : '/kindeditor/php/file_manager_json.php',
                //       allowFileManager : true,
                //   });
                // });
            },
            checkAll:function(event) {
                if(event.currentTarget.checked){
                    for (var i = list.list.length - 1; i >= 0; i--) {
                        list.checkbox.push(list.list[i].id);
                    }
                }
                else{
                    list.checkbox=[];
                }
            },
            delAll:function() {
                var checked="";
                for (var i = list.checkbox.length - 1; i >= 0; i--) {
                    checked=checked+list.checkbox[i]+","
                }
                $.get("/index.php?m=Admin&c=user&a=delBatch",{uid:checked.substring(0,checked.length-1)},function(res) {
                    if(res.status==1){
                        $.get("/index.php?m=Admin&c=user&a=userListAjax",{},function(res) {
                            list.list=res.data;
                        },"json");
                        dialog.toconfirm(res.message);
                    }
                    else{
                        dialog.error(res.message);
                    }
                },"json");
            }
        }
    });

</script>