@include('Admin.common._meta')
<title>案例列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 案例管理 <span class="c-gray en">&gt;</span> 案例列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		
	 <!-- <span class="select-box inline"> -->
		<!-- <select name="" class="select">
			<option value="0">全部分类</option>
			<option value="1">分类一</option>
			<option value="2">分类二</option>
		</select> -->
		<!-- </span>  -->
		日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="" id="" placeholder=" 案例名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜案例</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="product_add('添加案例','{{url('/message/message_add')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="40">ID</th>
					<th>文章标题</th>
					<th width="80">作者</th>
					<th width="80">浏览量</th>
					<th width="120">添加时间</th>
					<th width="60">发布状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $val)
					<tr class="text-c">
						<input type="hidden" id="token" value="{{csrf_token()}}">
						<td><input type="checkbox" value="" name=""></td>
						<td>{{$val->id}}</td>
						<td class="text-l"><u style="cursor:pointer" class="text-primary">{{$val->case_name}}</u></td>
						<td>{{$val->case_driver}}</td>
						<td>{{$val->case_num}}</td>
						<td>{{date('Y-h-m H-i-s',$val->created_at)}}</td>
						<td class="td-status">
						@if($val->status ==1)
						<span class="label label-success radius">已发布</span>
						@elseif($val->status==0)
						<span class="label label-success radius">未发布</span>
						@endif
						</td>
						<td class="f-14 td-manage">
						<a style="text-decoration:none" onClick="member_start(this,'{{$val->id}}')" href="javascript:;" title="还原"><i class="Hui-iconfont">&#xe6e1;</i></a>
						<!-- @if($val->asc==0)
							<a style="text-decoration:none" onClick="article_start(this,'{{$val->id}}')" href="javascript:;" title="置顶"><i class="Hui-iconfont">&#xe6dc;</i></a> 
						@elseif($val->asc==1)
							<a style="text-decoration:none" onClick="article_stop(this,{{$val->id}})" href="javascript:;" title="取消置顶"><i class="Hui-iconfont">&#xe6de;</i></a>
						@endif -->
						<!-- <a style="text-decoration:none" class="ml-5" onClick="article_edit('案例编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>  -->
							<a style="text-decoration:none" class="ml-5" onClick="article_del(this,'{{$val->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

/*案例-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*案例-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*案例-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*案例-启用*/
function member_start(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要还原吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/case/case_recycle',
			data: {'_token':token,'id':id,'type':1},
			success: function(data){
				// console.log(data);
				// return;
				if(data=='')
				{
					layer.msg('操作失败!',{icon: 3,time:1500});
					return;
				}
				layer.msg('还原成功!',{icon: 1,time:1500});
				
				
				window.location.reload();
				
			},

		});	

	});
}

/*案例-取消置顶*/
function article_del(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/case/case_recycle',
			data: {'_token':token,'id':id,'type':2},
			success: function(data){
				// console.log(data);
				// return;
				if(data=='')
				{
					layer.msg('操作失败!',{icon: 3,time:1500});
					return;
				}
				layer.msg('删除成功!',{icon: 1,time:1500});
				
				window.location.reload();				
			},
		});	
	});
}
/*用户-停用*/
// function member_stop(obj,id){
// 	var token = $('#token').val();
// 	layer.confirm('确认要停用吗？',function(index){
// 		$.ajax({
// 			type: 'POST',
// 			url: '/message/message',
// 			data: {'_token':token,'id':id},
// 			success: function(data){
// 				// console.log(data);
// 				// return;
// 				if(data=='')
// 				{
// 					layer.msg('操作失败!',{icon: 3,time:1500});
// 					return;
// 				}
// 				// $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
// 				// $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
// 				$(obj).remove();
// 				layer.msg('操作成功!',{icon: 1,time:1500});
// 				window.location.reload();
				
// 			},
// 			// error:function(data) {
				
// 			// },
// 		});		
// 	});
// }

</script> 
</body>
</html>