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
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="modaldemo()" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加seo</a>
    
    </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="40">ID</th>
					<th width="180">seo分类</th>
					<!-- <th width="180"></th> -->
					<th>SEO关键字</th>
					<!-- <th width="150">Tags</th> -->
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
                        <td>{{$val->title}}</td>
                        
                        <!-- <td class="text-l"><a class="maincolor" href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">现代简约 白色 餐厅</a></td> -->
                        <td class="text-c">{{$val->seo_keyword}}</td>
                        <td>{{date('Y-m-d H-i-s',$val->created_at)}}</td>
                        <!-- <td class="td-status"><span class="label label-success radius">已发布</span></td> -->
                        <td class="td-manage">
							
							<a style="text-decoration:none" onClick="picture_start(this,'{{$val->id}}')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							
							 <a style="text-decoration:none" class="ml-5" onClick="seo_type_del(this,'{{$val->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
    <!-- seo分类添加 -->
    <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">SEO添加</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                </div>
                <div class="modal-body">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2" style="width:100px;">seo标题：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="" placeholder="" id="title" name="img_type_name">
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                        </div>
                    </div>
					<div class="row cl" style="margin-top:10px">
						<label class="form-label col-xs-4 col-sm-2" style="width:104px"><span class="c-red">*</span>seo类型：</label>
						<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
							<select name="pid" id="pid" class="select">
								<option value="0">请选择分类</option>
								@foreach($type as $v)
									<option value="{{$v->id}}">{{$v->title}}</option>
										
								@endforeach
							</select>
							</span> </div>
                	</div>
					<div class="row cl"  style="margin-top:10px">
                        <label class="form-label col-xs-4 col-sm-2" style="width:100px;">seo_url：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="" placeholder="" id="seo_url" name="img_type_name">
                            
                        </div>
                    </div>
					
					<div class="row cl"  style="margin-top:10px">
                        <label class="form-label col-xs-4 col-sm-2" style="width:100px;">seo关键字：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="" placeholder="多个关键字用逗号分隔" id="seo_keyword" name="img_type_name">
                            
                        </div>
                    </div>
					
					<div class="row cl" style="margin-top:10px">
						<label class="form-label col-xs-4 col-sm-2">SEO摘要：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<textarea name="seo_case" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"></textarea>
							<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
						</div>
					</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="data_add">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <!-- seo数据添加结束 -->
	<!-- seo数据编辑开始 -->
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">SEO添加</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                </div>
                <div class="modal-body">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2" style="width:100px;">seo标题：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="" placeholder="" id="titles" name="img_type_name">
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                            <input type="hidden" id="ids" value="">
                        </div>
                    </div>
					
					<div class="row cl"  style="margin-top:10px">
                        <label class="form-label col-xs-4 col-sm-2" style="width:100px;">seo_url：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="" placeholder="" id="seo_urls" name="img_type_name">
                            
                        </div>
                    </div>
					
					<div class="row cl"  style="margin-top:10px">
                        <label class="form-label col-xs-4 col-sm-2" style="width:100px;">seo关键字：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="" placeholder="多个关键字用逗号分隔" id="seo_keywords" name="img_type_name">
                            
                        </div>
                    </div>
					
					<div class="row cl" style="margin-top:10px">
						<label class="form-label col-xs-4 col-sm-2">SEO摘要：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<textarea name="seo_case" cols="" rows="" class="textareas"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"></textarea>
							<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
						</div>
					</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="seo_add">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <!-- seo分类编辑结束 -->
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

//添加seo分类
$("#data_add").click(function(){
    var token = $("#token").val();

    var title = $.trim($("#title").val());
    var pid = $.trim($("#pid").val());
    var seo_url = $.trim($("#seo_url").val());
    var seo_keyword = $.trim($("#seo_keyword").val());
    var textarea = $.trim($(".textarea").val());

    if(title.length==0)
    {
        alert('分类不能为空');
        return;
    }
    var url = "/seo/seo_data_add";
    var data = {'_token':token,'title':title,'pid':pid,'seo_url':seo_url,'seo_keyword':seo_keyword,'seo_case':textarea};
    $.post(url,data,function(data){
        if(data !='')
		{
			layer.msg('添加成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/seo/seo_list")}}'; 
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


/*seo编辑*/
function picture_start(obj,id){
	
		var url = "/seo/seo_up";
		var token = $("#token").val();
		var data = {'_token':token,'id':id};
		$.post(url,data,function(msg){
			
			if(msg!='')
			{
				$('#titles').val(msg['title']);
				$('#ids').val(msg['id']);
				$('#seo_urls').val(msg['seo_url']);
				$('#seo_keywords').val(msg['seo_keyword']);
				$('.textareas').append(msg['seo_case']);
				$("#modal").modal("show");
			}else
			{
				layer.msg('参数错误!',{icon: 5,time:1000});
			}

		});
		
	
}
//编辑数据提交
$("#seo_add").click(function(){
    var token = $("#token").val();
	var id = $("#ids").val();
    var title = $.trim($("#titles").val());


    var seo_url = $.trim($("#seo_urls").val());
    var seo_keyword = $.trim($("#seo_keywords").val());
    var textarea = $.trim($(".textareas").val());
    if(title.length==0)
    {
        alert('分类不能为空');
        return;
    }
    var url = "/seo/seo_update";
    var data = {'_token':token,'title':title,'seo_url':seo_url,'seo_keyword':seo_keyword,'seo_case':textarea,'id':id};
    $.post(url,data,function(data){
        if(data !='')
		{

			layer.msg('添加成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/seo/seo_list")}}'; 
		}else
		{
			layer.msg('添加失败!',{icon:1,time:3000});
		}
    });
    

})



/*seo分类数据-删除*/
function seo_type_del(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/seo/seo_type_del',
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