@include('Admin.common._meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>图片列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片管理 <span class="c-gray en">&gt;</span> 图片列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="" id="" placeholder=" 图片名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜图片</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
    
    </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="40">ID</th>
					<th width="160">分类</th>
					<th width="180">封面</th>
					<!-- <th>图片名称</th> -->
					<!-- <th width="150">Tags</th> -->
					<th width="150">更新时间</th>
					<!-- <th width="60">发布状态</th> -->
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
                @foreach($data as $val)
                    <tr class="text-c">
                        <td><input name="" type="checkbox" value=""></td>
                        <td>{{$val->id}}</td>
                        <td>{{$val->img_type_name}}</td>
                        <td><a href="{{url('/images/images_show')}}?id={{$val->id}}"><img width="100" class="picture-thumb" src="{{$val->img_path}}"></a></td>
                        <!-- <td class="text-l"><a class="maincolor" href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">现代简约 白色 餐厅</a></td> -->
                        <!-- <td class="text-c">标签</td> -->
                        <td>{{date('Y-m-d H-i-s',$val->created_at)}}</td>
                        <!-- <td class="td-status"><span class="label label-success radius">已发布</span></td> -->
                        <td class="td-manage">
							<a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'{{$val->id}}')" href="javascript:;" title="还原"><i class="Hui-iconfont">&#xe6e1;</i></a>
							<a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'{{$val->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
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
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script type="text/javascript">



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



/*图片-发布*/
function picture_start(obj,id){
	layer.confirm('确认要置顶吗？',function(index){
		var url = "/images/images_top";
		var token = $("#token").val();
		var data = {'_token':token,'id':id,'type':2};
		$.post(url,data,function(msg){
			if(msg!='')
			{
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_stop(this,{{$val->id}})" href="javascript:;" title="取消置顶"><i class="Hui-iconfont">&#xe6de;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已置顶</span>');
				$(obj).remove();
				layer.msg('操作成功!',{icon: 6,time:1000});
			}else
			{
				layer.msg('参数错误!',{icon: 5,time:1000});
			}

		});
		
	});
}


</script>
</body>
</html>