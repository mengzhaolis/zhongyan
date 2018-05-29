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
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="picture_add('添加图片','{{url('/images/images_add')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加图片</a>
    <a class="btn btn-primary radius" onclick="modaldemo()" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加图片分类</a>
    </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="40">ID</th>
					<th width="160">分类</th>
					<th width="180">封面</th>
					<th>图片名称</th>
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
                        <td><a href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')"><img width="210" class="picture-thumb" src="{{$val->img_path}}"></a></td>
                        <td class="text-l"><a class="maincolor" href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">现代简约 白色 餐厅</a></td>
                        <!-- <td class="text-c">标签</td> -->
                        <td>{{date('Y-m-d H-i-s',$val->created_at)}}</td>
                        <!-- <td class="td-status"><span class="label label-success radius">已发布</span></td> -->
                        <td class="td-manage"><a style="text-decoration:none" onClick="picture_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_edit('图库编辑','picture-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
                        <label class="form-label col-xs-4 col-sm-2">分类名称：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="0" placeholder="" id="img_type_name" name="img_type_name">
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">封面图：</label>
                        <div style="width:80px;height:80px;float:left;">
                            <img src="" alt="" class="ing" style="width:80px;height:80px;margin-left:15px;">
                            
                                <input type="file" multiple id="fil" style="float:left;margin-left:100px;margin-top:-43px;">
                                <input type="hidden" id="face" name="face_img" value="">
                            
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
              url: "/images/images_add",  
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
$("#img_add").click(function(){
    var token = $("#token").val();
    var img_id = $("#face").val();
    // alert(img_id);return;
    var img_type_name = $.trim($("#img_type_name").val());
    if(img_type_name.length==0)
    {
        alert('分类不能为空');
        return;
    }
    var url = "/images/images_data_add";
    var data = {'_token':token,'img_type_name':img_type_name,'id':img_id};
    $.post(url,data,function(data){
        console.log(data);
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

/*图片-审核*/
function picture_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过'], 
		shade: false
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});	
}

/*图片-下架*/
function picture_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*图片-发布*/
function picture_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}

/*图片-申请上线*/
function picture_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*图片-编辑*/
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*图片-删除*/
function picture_del(obj,id){
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
</script>
</body>
</html>