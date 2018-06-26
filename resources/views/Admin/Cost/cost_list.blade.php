@include('Admin.common._meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>图片列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 费用计算器 <span class="c-gray en">&gt;</span> 计算器 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="" id="" placeholder=" 图片名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜图片</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
    <a class="btn btn-primary radius" onclick="modaldemo()" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加计算类型</a>
    </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="40">ID</th>
					<th width="160">类型名称</th>
					<!-- <th width="180">封面</th> -->
					<!-- <th>图片名称</th> -->
					<th width="150">参考金额</th>
					<th width="150">添加时间</th>
					<!-- <th width="60">发布状态</th> -->
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
                @foreach($data as $val)
                    <tr class="text-c">
                        <td><input name="" type="checkbox" value=""></td>
                        <td>{{$val->id}}</td>
                        <td>{{$val->diaoyan_type}}</td>
                        <td>{{$val->money}}</td>
                        <td>{{date('Y-m-d H-i-s',$val->created_at)}}</td>
                       
                        <td class="td-manage">
						    <a style="text-decoration:none" onClick="picture_up(this,'{{$val->id}}')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a style="text-decoration:none" onClick="picture_del(this,'{{$val->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
    <!-- 计算器-调研类型添加 -->
    <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">添加调研类型</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                </div>
                <div class="modal-body">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">调研名称：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="diaoyan_type" name="img_type_name">
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                        </div>
                    </div>
					<div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">参考金额：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="money" name="img_type_name">
                            
                        </div>
                    </div>
					<div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">类型描述：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <textarea id="xiang" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空"></textarea>
                            <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="img_add">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 计算器-调研类型添加结束 -->
	<!-- 计算器-调研类型列表数据更改 -->
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">添加调研类型</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                </div>
                <div class="modal-body">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">调研名称：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="type" name="img_type_name">
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                            <input type="hidden" id="data_id">
                        </div>
                    </div>
					<div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">参考金额：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="moneys" name="img_type_name">
                            
                        </div>
                    </div>
					<div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">类型描述：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <textarea id="diaoyan_xiang" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空"></textarea>
                            <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="up_add">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 计算器-调研类型列表数据更改 -->
</div>

<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/laypage/1.2/laypage.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script type="text/javascript">
function modaldemo()
{
	$("#modal-demo").modal("show");
}


$("#img_add").click(function(){
    var token = $("#token").val();
    // var img_id = $("#face").val();
    var diaoyan_xiang = $("#xiang").val();
    // alert(diaoyan_xiang);return;
    var diaoyan_type = $.trim($("#diaoyan_type").val());
    if(diaoyan_type.length==0)
    {
        alert('调研类型不能为空！！！');
        return;
    }
    var url = "/cost/cost_add";
    var data = {'_token':token,'diaoyan_type':diaoyan_type,'diaoyan_xiang':diaoyan_xiang};
    $.post(url,data,function(data){
        if(data !='')
		{
			layer.msg('添加成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/cost/cost_list")}}'; 
		}else
		{
			layer.msg('添加失败!',{icon:1,time:3000});
		}
    });
    

})

$("#add").click(function(){
    var token = $("#token").val();
    var id = $("#id").val();
    var diaoyan_xiang = $("#xiang").val();
    var money = $("#money").val();
    // alert(diaoyan_xiang);return;
    var diaoyan_type = $.trim($("#diaoyan_type").val());
    if(diaoyan_type.length==0)
    {
        alert('调研类型不能为空！！！');
        return;
    }
    var url = "/cost/cost_add";
    var data = {'_token':token,'diaoyan_type':diaoyan_type,'diaoyan_xiang':diaoyan_xiang,'money':money};
    $.post(url,data,function(data){
        if(data !='')
		{
			layer.msg('添加成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/cost/cost_list")}}'; 
		}else
		{
			layer.msg('添加失败!',{icon:1,time:3000});
		}
    });
    

})


/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-查看*/
function picture_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}








/*数据-删除*/
function picture_del(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/cost/cost_del',
			data: {'_token':token,'id':id},
			success: function(data){
				// console.log(data);
				// return;
				if(data=='')
				{
					layer.msg('操作失败!',{icon: 3,time:1500});
					return;
				}
				
				$(obj).remove();
				layer.msg('操作成功!',{icon: 1,time:1500});
				window.location.reload();
				
			},
			// error:function(data) {
				
			// },
		});		
	});
    
}
function picture_up(obj,id){
	var token = $('#token').val();
	// layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/cost/cost_up',
			data: {'_token':token,'id':id},
			success: function(data){
				var data =  jQuery.parseJSON(data);
				// alert(data.diaoyan_type)
                $("#type").val(data.diaoyan_type);
                $("#data_id").val(data.id);
                $("#diaoyan_xiang").val(data.diaoyan_xiang);
                $("#moneys").val(data.money);
				$("#modal").modal("show");
				
			},
			// error:function(data) {
				
			// },
		});		

    
}
//计算机-调研类型数据编辑提交
$("#up_add").click(function(){
    var token = $("#token").val();
    var id = $("#data_id").val();
    var money = $("#moneys").val();
    var diaoyan_xiang = $("#diaoyan_xiang").val();
    // alert(diaoyan_xiang);return;
    var diaoyan_type = $.trim($("#type").val());
    if(diaoyan_type.length==0)
    {
        alert('调研类型不能为空！！！');
        return;
    }
    var url = "/cost/cost_update_add";
    var data = {'_token':token,'diaoyan_type':diaoyan_type,'diaoyan_xiang':diaoyan_xiang,'id':id,'money':money};
    $.post(url,data,function(data){
        if(data !='')
		{
			layer.msg('操作成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/cost/cost_list")}}'; 
		}else
		{
			layer.msg('操作失败!',{icon:1,time:3000});
		}
    });
    

})

</script>
</body>
</html>