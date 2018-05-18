@include('Admin.common._meta')
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
	<!-- <a href="javascript:;" onclick="member_add()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加专题</a> -->
	</span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
	<div class="mt-20">
	<!-- 添加专题弹出框 -->
	<div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content radius">
			<div class="modal-header">
				<h3 class="modal-title">添加专题数据</h3>
				<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
			</div>
			<div class="modal-body">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2" style="width:100px">转题名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
					<input type="hidden" id="token" value="{{csrf_token()}}">
						<input type="text" name="title" id="title" placeholder="专题名称" value="" class="input-text">
					</div>
				</div>
				<div class="row cl" style="margin-top:10px">
					<label class="form-label col-xs-4 col-sm-2" style="width:100px">标题链接：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="title_url" id="title_url" placeholder="专题链接请以http://开头" value="" class="input-text">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="queding">确定</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
</div>
<!-- 添加专题弹出框结束 -->
<!-- 数据编辑表单弹出框开始 -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content radius">
			<div class="modal-header">
				<h3 class="modal-title">修改专题数据</h3>
				<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
			</div>
			<div class="modal-body">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2" style="width:100px">转题名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
					<input type="hidden" id="token" value="{{csrf_token()}}">
						<input type="text" name="title" id="titles" placeholder="专题名称" value="" class="input-text">
					</div>
				</div>
				<div class="row cl" style="margin-top:10px">
					<label class="form-label col-xs-4 col-sm-2" style="width:100px">标题链接：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="title_url" id="title_urls" placeholder="专题链接请以http://开头" value="" class="input-text">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="up_ti">确定</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
</div>
<!-- 数据修改表单弹出框结束 -->
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">专题名称</th>
				<th width="40">链接</th>
				<!-- <th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="">地址</th> -->
				<th width="130">加入时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $v)
				<tr class="text-c">
					<td><input type="checkbox" value="{{$v->id}}" name=""></td>
					<td>{{$v->id}}</td>
					<td>{{$v->title}}</td>
					<td><a href="{{$v->title_url}}" target="view_window">{{$v->title_url}}</a></td>
					<td>{{date('Y-m-d H-i-s',$v->created_at)}}</td>
					<td class="td-status">
					@if($v->status==1)
						<span class="label label-success radius">已启用</span>
					@else($v->status==0)
						<span class="label label-success radius">已停用</span>
					@endif
					</td>
					<td class="td-manage">
					<a style="text-decoration:none" onClick="member_start(this,'{{$v->id}}')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>
					 <!-- <a title="编辑" href="javascript:;" onclick="member_edit('编辑','{{'/zt/zt_update'}}','{{$v->id}}','600','210')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>   -->
						<a title="删除" href="javascript:;" onclick="member_del(this,'{{$v->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

/*用户-添加页面展示*/
function member_add(){
	$("#modal-demo").modal("show");
}
/*用户-添加*/
// $("#queding").click(function(){
// 	var title = $("#title").val();
// 	var title_url = $("#title_url").val();
// 	var token = $('#token').val();
// 	if(title.length==0)
// 	{
// 		alert('标题不能为空!!!');
// 		return;
// 	}
// 	if(title_url.length==0)
// 	{
// 		alert('标题链接不能为空!!!');
// 		return;
// 	}
// 	var url ="/zt/zt_list";
// 	var data ={'_token':token,'title':title,'title_url':title_url}
// 	$.post(url,data,function(msg){
// 		if(msg != '')
// 		{
// 			layer.msg('添加成功!',{icon:1,time:2000});
// 			window.location.reload();
// 		}else
// 		{
// 			layer.msg('添加失败!',{icon:3,time:2000});
// 		}
		
// 	})	
// 	// alert(title.length)
// })
// /*用户-查看*/
// function member_show(title,url,id,w,h){
// 	layer_show(title,url,w,h);
// }

/*用户-停用*/
// function member_stop(obj,id){
// 	var token = $('#token').val();
// 	layer.confirm('确认要停用吗？',function(index){
// 		$.ajax({
// 			type: 'POST',
// 			url: '/zt/zt_del',
// 			data: {'_token':token,'id':id},
// 			success: function(data){
// 				// console.log(data);
// 				// return;
// 				if(data=='')
// 				{
// 					layer.msg('操作失败!',{icon: 3,time:1500});
// 					return;
// 				}
// 				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
// 				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
// 				$(obj).remove();
// 				layer.msg('操作成功!',{icon: 1,time:1500});
// 				window.location.reload();
				
// 			},
// 			// error:function(data) {
				
// 			// },
// 		});		
// 	});
// }

/*用户-启用*/
function member_start(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/zt/zt_recycle',
			data: {'_token':token,'id':id,'type':1},
			success: function(data){
				if(data!='')
				{
					$(obj).remove();
					layer.msg('已启用!',{icon: 6,time:3000});
					window.location.reload();
				}else
				{
					layer.msg('启用失败!',{icon: 3,time:3000});
				}
				
			}
		});
	});
}
/*用户-编辑*/
// function member_edit(title,url,id,w,h){
// 	// alert(id);return;
// 	var token = $('#token').val();
// 	var data ={'_token':token,'id':id}
// 	$.post(url,data,function(msg){
// 		// alert(msg)
// 		var json = eval("("+msg+")");
// 		// console.log(json.id)
// 		$("#titles").val(json.title);
// 		$("#title_urls").val(json.title_url);
// 		$("#modal").modal("show");
// 		// layer_show(data);
// 		$("#up_ti").click(function(){
// 			var url = '/zt/zt_up';
// 			var token = $("#token").val();
// 			var title = $("#titles").val();
// 			var title_url = $("#title_urls").val();
// 			var data ={'_token':token,'id':id,'title':title,'title_url':title_url}
// 			$.post(url,data,function(msg){
// 				// console.log(msg)
// 				if(msg != '')
// 				{
// 					layer.msg('修改成功!',{icon:1,time:2000});
// 					window.location.reload();
// 				}else
// 				{
// 					layer.msg('修改失败!',{icon:3,time:2000});
// 				}
// 			})
// 		})
// 	})
	
// }

/*用户-删除*/
function member_del(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/zt/zt_recycle',
			data: {'_token':token,'id':id,'type':2},
			success: function(data){
				if(data!='')
				{
					$(obj).remove();
					layer.msg('已删除!',{icon: 1,time:2000});
					window.location.reload();
				}else
				{
					layer.msg('删除失败!',{icon: 3,time:2000});
				}
				
			}
		});
	});
}
</script> 
</body>
</html>