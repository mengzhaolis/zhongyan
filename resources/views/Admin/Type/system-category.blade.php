@include('Admin.common._meta')
<title>中研世纪-分类列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	栏目管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="text-c">
		<input type="text" name="" id="" placeholder="栏目名称、id" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<!-- <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> -->
		<a class="btn btn-primary radius" onclick="system_category_add('添加资讯','{{url('/type/type_list_add')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加栏目</a>
		</span>
		<span class="r">共有数据：<strong>54</strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					
					<th>栏目名称</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $v)
					<tr class="text-c">
						<td><input type="checkbox" name="" value=""></td>
						<td>{{$v['id']}}</td>
						<input type="hidden" id="token" value="{{csrf_token()}}">
						<td class="text-l">{{$v['type_name']}}</td>
						<td class="f-14">
						
						<a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑',{{$v['id']}},'700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" href="javascript:;" onclick="system_category_del(this,{{$v['id']}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
					@foreach($v['son'] as $val)
						<tr class="text-c">
						<td><input type="checkbox" name="" value=""></td>
						<td>{{$val['id']}}</td>
						
						<td class="text-l">&nbsp;&nbsp;|--{{$val['type_name']}}</td>
						<td class="f-14">
						
						<a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑',{{$val['id']}},'700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" href="javascript:;" onclick="system_category_del(this,{{$val['id']}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr>
						@foreach($val['son'] as $value)
							<tr class="text-c">
							<td><input type="checkbox" name="" value=""></td>
							<td>{{$value['id']}}</td>
							
							<td class="text-l">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--{{$value['type_name']}}</td>
							<td class="f-14">
							
							<a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑',{{$value['id']}},'700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a title="删除" href="javascript:;" onclick="system_category_del(this,{{$value['id']}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
							</tr>
						@endforeach
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!--添加一级分类弹出层 开始-->
    <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius" style="width:426px;">
               
                <div class="modal-body row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder="分类名称" id="title1" name="username">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="queding">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>

<!--添加一级分类弹出层 结束-->
<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

/*系统-栏目-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-编辑*/

function system_category_edit(title,id,w,h){

	$("#modal-demo").modal("show");
	$("#queding").click(function(){
        var title1 = $.trim($("#title1").val());
        var token = $("#token").val();
        if(title1 =="")
        {
            alert('标题不能为空');
            return;
        }
        var url = '/type/type_list_update';
        var data ={'_token':token,'type_name':title1,'id':id};
        $.post(url,data,function(data){
            layer.msg(data.message,{icon:data.status});
            window.location.reload();
        });
    })
}
//弹窗提交
    

/*系统-栏目-删除*/
function system_category_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		var token = $("#token").val();
		$.ajax({
			type: 'POST',
			url: '/type/type_list_del',
			data:{'_token':token,'id':id},
			success: function(data){
				// console.log(data);
				// return;
				if(data !='')
				{
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
					window.location.reload();
				}else
				{
					layer.msg(data.message,{icon:data.status});
				}

			}
		});
	});
}
</script>
</body>
</html>