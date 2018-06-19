@include('Admin.common._meta')
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 操作中心 <span class="c-gray en">&gt;</span> 课程管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="product_add('添加课程','{{url('/course/course_add')}}')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加课程</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
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
				<th width="100">课程名称</th>
				<th width="40">课程分类</th>
				<!-- <th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="">地址</th> -->
				<th width="130">开始时间</th>
				<th width="130">结束时间</th>
				<th width="70">是否需要注册</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $v)
				<tr class="text-c">
					<td><input type="checkbox" value="{{$v->id}}" name=""></td>
					<td>{{$v->id}}</td>
					<td>{{$v->course_title}}</td>
					<td>{{$v->course_type}}</td>
					<td>{{$v->created_at}}</td>
					<td>{{$v->updated_at}}</td>
					<td class="td-status">
					@if($v->sex==1)
						<span class="label label-success radius">是</span>
					@else if($v->sex==0)
						<span class="label label-success radius">否</span>
					@endif
					</td>
					<td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'{{$v->id}}')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="{{url('/course/course_update')}}?id={{$v->id}}" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>  
						@if($v->asc==0)
							<a style="text-decoration:none" onClick="article_stop(this,'{{$v->id}}',1)" href="javascript:;" title="置顶"><i class="Hui-iconfont">&#xe6dc;</i></a> 
						@elseif($v->asc==1)
							<a style="text-decoration:none" onClick="article_stop(this,{{$v->id}},0)" href="javascript:;" title="取消置顶"><i class="Hui-iconfont">&#xe6de;</i></a>
						@endif
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

/*专题-添加页面展示遮罩层暂时隐藏*/
function member_add(){
	$("#modal-demo").modal("show");
}
//添加课程-模板展示
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
$("#queding").click(function(){
	var title = $("#title").val();
	var title_url = $("#title_url").val();
	var token = $('#token').val();
	if(title.length==0)
	{
		alert('标题不能为空!!!');
		return;
	}
	if(title_url.length==0)
	{
		alert('标题链接不能为空!!!');
		return;
	}
	var url ="/zt/zt_list";
	var data ={'_token':token,'title':title,'title_url':title_url}
	$.post(url,data,function(msg){
		if(msg != '')
		{
			layer.msg('添加成功!',{icon:1,time:2000});
			window.location.reload();
		}else
		{
			layer.msg('添加失败!',{icon:3,time:2000});
		}
		
	})	
	// alert(title.length)
})
// /*用户-查看*/
// function member_show(title,url,id,w,h){
// 	layer_show(title,url,w,h);
// }

/*用户-停用*/
function member_stop(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/course/course_del',
			data: {'_token':token,'id':id},
			success: function(data){
				// console.log(data);
				// return;
				if(data=='')
				{
					layer.msg('操作失败!',{icon: 3,time:1500});
					return;
				}
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('操作成功!',{icon: 1,time:1500});
				window.location.reload();
				
			},
			// error:function(data) {
				
			// },
		});		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	// alert(id);return;
	var token = $('#token').val();
	var data ={'_token':token,'id':id}
	$.post(url,data,function(msg){
		// alert(msg)
		var json = eval("("+msg+")");
		// console.log(json.id)
		$("#titles").val(json.title);
		$("#title_urls").val(json.title_url);
		$("#modal").modal("show");
		// layer_show(data);
		$("#up_ti").click(function(){
			var url = '/zt/zt_up';
			var token = $("#token").val();
			var title = $("#titles").val();
			var title_url = $("#title_urls").val();
			var data ={'_token':token,'id':id,'title':title,'title_url':title_url}
			$.post(url,data,function(msg){
				// console.log(msg)
				if(msg != '')
				{
					layer.msg('修改成功!',{icon:1,time:2000});
					window.location.reload();
				}else
				{
					layer.msg('修改失败!',{icon:3,time:2000});
				}
			})
		})
	})
	
}

/*资讯-取消置顶*/
function article_stop(obj,id,type){
	var token = $('#token').val();
	layer.confirm('请确认操作？',function(index){
		$.ajax({
			type: 'POST',
			url: '/course/course_top',
			data: {'_token':token,'id':id,'type':type},
			success: function(data){
				// console.log(data);
				// return;
				if(data=='')
				{
					layer.msg('操作失败!',{icon: 3,time:1500});
					return;
				}
				layer.msg('操作成功!',{icon: 1,time:1500});
				
				window.location.reload();				
			},
		});	
	});
}
</script> 
</body>
</html>