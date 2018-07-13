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
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="demo()" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加类型</a>
    <a class="btn btn-primary radius" onclick="modaldemo()" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加行业</a>
    </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="40">ID</th>
					<th width="160">行业名称</th>
					<th width="180">是否有效</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
                @foreach($list as $val)
                    <tr class="text-c">
                        <td><input name="" type="checkbox" value=""></td>
                        <td>{{$val->id}}</td>
                        <td><a href="{{url('/need/type_list')}}?pid={{$val->id}}">{{$val->hang_name}}</a></td>
                       @if($val->status==1)
                        <td class="td-status">
                            <span class="label radius" style="background-color:green">有效</span>
                        </td>
                       @endif
                        
                        <td class="td-manage">
							
							
							<a style="text-decoration:none" onClick="picture_start(this,'{{$val->id}}')" href="javascript:;" title="置顶"><i class="Hui-iconfont">&#xe6dc;</i></a>
							
							 <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'{{$val->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
    <!-- 调研行业添加 -->
    <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">调研行业添加</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                </div>
                <div class="modal-body">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2" style="width:120px">行业名称：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="hang_name" name="img_type_name">
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="add">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 调研行业添加结束 -->
    <div id="demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">调研类型添加</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                </div>
                <div class="modal-body">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2" style="width:120px">类型名称：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="type_name" name="img_type_name">
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2" style="width:120px;margin-left:15px;" ><span class="c-red">*</span>分类类型：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <span class="select-box" style="width:420px">
                        <select name="" id="pid" class="select">
                            <option value="">请选择分类</option>
                        @foreach($data as $value)
                            <option value="{{$value->id}}">{{$value->hang_name}}</option>
                        @endforeach
                        </select>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="data_add">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
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
function modaldemo()
{
	$("#modal-demo").modal("show");
}
//展示类型
function demo()
{
	$("#demo").modal("show");
}

//行业添加
$("#add").click(function(){
    var token = $("#token").val();
    var hang_name = $("#hang_name").val();
    if(hang_name.length==0)
    {
        alert('分类不能为空');
        return;
    }
    var url = "/need/need_data_add";
    var data = {'_token':token,'hang_name':hang_name};
    $.post(url,data,function(data){
        if(data !='')
		{
			layer.msg('添加成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/need/need_list")}}'; 
		}else
		{
			layer.msg('添加失败!',{icon:1,time:3000});
		}
    });
    

})
//行业添加
$("#data_add").click(function(){
    var token = $("#token").val();
    var type_name = $("#type_name").val();
    var pid = $("#pid").val();
    if(type_name.length==0)
    {
        alert('分类不能为空');
        return;
    }
    var url = "/need/type_data_add";
    var data = {'_token':token,'type_name':type_name,'pid':pid};
    $.post(url,data,function(data){
        if(data !='')
		{
			layer.msg('添加成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/need/need_list")}}'; 
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



/*图片-下架*/
function picture_stop(obj,id){

	layer.confirm('确认要取消吗？',function(index){
		var url = "/images/images_top";
		var token = $("#token").val();
		var data = {'_token':token,'id':id,'type':1};
		$.post(url,data,function(msg){
			if(msg!='')
			{
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_start(this,{{$val->id}})" href="javascript:;" title="置顶"><i class="Hui-iconfont">&#xe6dc;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">未置顶</span>');
				$(obj).remove();
				layer.msg('操作成功!',{icon: 1,time:1000});
			}else
			{
				layer.msg('参数错误!',{icon: 5,time:1000});
			}

		})

	});
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




/*图片-删除*/
function picture_del(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/images/images_stop',
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
</script>
</body>
</html>