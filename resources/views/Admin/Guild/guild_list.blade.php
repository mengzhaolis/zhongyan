@include('Admin.common._meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>行业列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 行业管理 <span class="c-gray en">&gt;</span> 行业列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="" id="" placeholder=" 图片名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜图片</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
    <a class="btn btn-primary radius" onclick="modaldemo()" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加行业</a>
    </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="40">ID</th>
					<th width="160">行业名称</th>
					<th width="180">封面</th>
					<th>对应url</th>
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
                        <td>{{$val->guild_title}}</td>
                        <td><a href="{{url('/images/images_show')}}?id={{$val->id}}"><img width="100" class="picture-thumb" src="{{$val->img_path}}"></a></td>
                        <!-- <td class="text-l"><a class="maincolor" href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">现代简约 白色 餐厅</a></td> -->
                        <!-- <td class="text-c">标签</td> -->
                        <td><a href="{{$val->guild_url}}" target="view_window">{{$val->guild_url}}</a></td>
                        <td>{{date('Y-m-d H-i-s',$val->created_at)}}</td>
                        <!-- <td class="td-status"><span class="label label-success radius">已发布</span></td> -->
                        <td class="td-manage">
							
							<a style="text-decoration:none" onClick="picture_stop(this,'{{$val->id}}')" href="javascript:;" title="取消置顶"><i class="Hui-iconfont">&#xe6de;</i></a> 
						
							<a style="text-decoration:none" onClick="picture_start(this,'{{$val->id}}')" href="javascript:;" title="置顶"><i class="Hui-iconfont">&#xe6dc;</i></a>
						
							 <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'{{$val->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
    <!-- 图片分类添加 -->
    <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">图片分类添加</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                </div>
                <div class="modal-body">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">行业标题：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="guild_title" name="guild_title">
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                        </div>
                    </div>
					<div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">对应url：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="guild_url" name="guild_url">
                            
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">封面图：</label>
                        <div style="width:80px;height:80px;float:left;">
                            <img src="" alt="" class="ing" style="width:80px;height:80px;margin-left:15px;">
                            
                                <input type="file" multiple id="fil" style="float:left;margin-left:100px;margin-top:-43px;">
                                <input type="hidden" id="face" name="guild_img" value="">
                            
                        </div>
                    </div>
                   <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">行业描述：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea name="guild_miao" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" ></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="add">确定</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 图片分类添加结束 -->
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

//封面图-添加
var img_url = $('.ing').attr('src');
	//  alert(img_url)
	if(img_url ==false)
	{
		$(".ing").attr({'src':'/avatar.jpg','width':80+'px','heigth':80+'px'});
	}
	var fil=$("#fil");  
     $("<img>").insertBefore("#fil");  
     fil.bind('change',function(){ 
         var fordate=new FormData();  //得到一个FormData对象：
         var fils=$("#fil").get(0).files[0];  //得到file对象
        //  console.log(fils);
		// var id = $("#a_id").val();
         fordate.append('image',fils);  //用append方法添加键值对
        //  fordate.append('id',id);  //用append方法添加键值对
		 
        var srcc=window.URL.createObjectURL(fils);
		$(".ing").attr({'src':srcc,'width':80+'px','heigth':80+'px'});  
         $.ajax({  //发送ajax请求
              url: "/guild/images_add",  
              type: "post",  
              data: fordate, 
              processData : false,  
              contentType : false,   
              success: function(data){  
				console.log(data)
				$("#face").val(data);
                // layer.msg(data.message,{icon:data.status});
				
              },
			  'error':function(data)
			  {
				var result = JSON.parse(data.responseText);
                // 非200请求，获取错误消息
                layer.msg(data.message,{icon:data.status});
			  }
            });  

     });
$("#add").click(function(){
    var token = $("#token").val();
    var img_id = $("#face").val();
    var guild_url = $("#guild_url").val();
    // alert(img_id);return;
    var guild_title = $.trim($("#guild_title").val());
    if(guild_title.length==0)
    {
        alert('行业标题不能为空');
        return;
    }
    var url = "/guild/guild_add";
    var data = {'_token':token,'guild_title':guild_title,'guild_img':img_id,'guild_url':guild_url};
    $.post(url,data,function(data){
        if(data !='')
		{
			layer.msg('添加成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/guild/guild_list")}}'; 
		}else
		{
			layer.msg('添加失败!',{icon:1,time:3000});
		}
    });
    

})

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