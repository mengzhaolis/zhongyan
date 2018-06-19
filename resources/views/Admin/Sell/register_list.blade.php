@include('Admin.common._meta')
<title>注册管理</title>
</head>
<body>
	
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 注册管理中心 <span class="c-gray en">&gt;</span> 资源管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">

		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="{{url('/register/excel_go')}}" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe644;</i> 导出数据</a>
	
	</span>
    
						
     <span class="r">共有数据：<strong>88</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="100">用户名</th>
				<th width="90">手机</th>
				<th width="80">地域</th>
				<th width="150">注册来源</th>
				<!-- <th width="">地址</th> -->
				<th width="110">注册时间</th>
				<th width="140">调研类型</th>
                <th width="60">负责人</th>
                <th width="60">操作状态</th>
				<th width="50">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($array as $val)
			<tr class="text-c">
				<td><input type="checkbox" value="{{$val->id}}" name="check"></td>
				<td>{{$val->id}}</td>
				@if($val->status==3)
				<td><u style="cursor:pointer;color:green" class="text-primary">{{$val->user_name}}</u></td>
				@else
				<td><u style="cursor:pointer" class="text-primary">{{$val->user_name}}</u></td>
				@endif
				<td>{{$val->user_phone}}</td>
				<td>{{$val->user_address}}</td>
				<td>{{$val->reg_url}}</td>
				<!-- <td class="text-l">北京市 海淀区</td> -->
				<td>{{date("Y-m-d H:i:s",$val->created_at)}}</td>

				<td class="td-status"><span class="label label-success radius">{{$val->crcm_type}}</span></td>

				
				<td>{{$user_name}}</td>
				<td class="td-status"><span class="label label-success radius" style="background-color:#999999">未操作</span></td>
				<td class="td-manage">
				<!-- <a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>  -->
				<a title="注册详情" href="javascript:;" onclick="member_show(this,{{$val->id}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe637;</i></a>
				<input type="hidden" id="token" value="{{csrf_token()}}">
				 <!--产看注册详细信息开始  -->
				<div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content radius">
							<div class="modal-header">
								<h3 class="modal-title">注册详情</h3>
								<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
							</div>
							<div class="modal-body">
								<p class="xiang"></p>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary">确定</button>
								<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
							</div>
						</div>
					</div>
				</div>
				 <!--产看注册详细信息结束  -->
				
				<a title="线索反馈" href="javascript:;" onclick="member_change(this,'{{$val->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe692;</i></a></td>
				<!-- 销售人员标识用户数据是否有效及原因开始 -->
				<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content radius">
							<div class="modal-header">
								<h3 class="modal-title">资源状态详情</h3>
								<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
							</div>
							<div class="modal-body">
								<div class="row cl">
									<label class="form-label col-xs-4 col-sm-3"><span class="c-red" style="margin-left:15px;">*</span>&nbsp;&nbsp;数据状态:</label>
									<div class="formControls col-xs-8 col-sm-9 skin-minimal">
										<div class="radio-box">
											<input name="sex" type="radio" id="sex-1" value="1">
											<label for="sex-1">无效</label>
										</div>
										<div class="radio-box">
											<input type="radio" id="sex-2" name="sex" value="3">
											<label for="sex-2">有效</label>
										</div>
										<!-- <div class="radio-box">
											<input type="radio" id="sex-2" name="sex" value="2">
											<label for="sex-2">二级</label>
										</div> -->
									</div>
								</div>
								<div class="row cl" style="margin-top:10px;">
									<label class="form-label col-xs-4 col-sm-3"><span class="c-red" style="margin-left:15px;">*</span>&nbsp;&nbsp;状态描述:</label>
									<div class="formControls col-xs-8 col-sm-9">
										<textarea name="describe" cols="" rows="" class="textarea"  placeholder="请简要描述该数据状态"></textarea>
										<!-- <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p> -->
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary" id="que">确定</button>
								<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
							</div>
						</div>
					</div>
				</div>
				<!-- 销售人员标识用户数据是否有效及原因结束 -->
			</tr>
			@endforeach
		</tbody>
	</table>
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
<script type="text/javascript">


/*销售人员产看注册详情*/
function member_show(obj,id){
	var token = $("#token").val();
	
	var url ="/sell/sell_xiang";
    var data ={'_token':token,'id':id};
    $.post(url,data,function(data){
        $('.xiang').html(data);
    })
	$("#modal-demo").modal("show");
}



/*资源分发*/
var array = new Array();
$("#fen").click(function(){
	$('input[name="check"]:checked').each(function () {
		array.push($(this).val());//向数组中添加元素
	});
	var data = array.join(',');//将数组元素连接起来以构建一个字符串
	var user_id = $("#sex").val();
	var token = $("#token").val();
	var data = {'_token':token,'user_id':user_id,'data_id':data};
	var url ="/register/share";
	$.post(url,data,function(data){
		if(data !='')
		{
			layer.msg('操作成功!',{icon:1,time:1000});
			window.close(); 
			window.location.href='{{url("/register/register_list")}}'; 
		}else
		{
			layer.msg('操作失败!',{icon:5,time:3000});
		}
	});
	
});
/*销售人员操作数据*/
function member_change(obj,id){
	
	$("#modal").modal("show");
	$('#que').click(function(){
		var token = $("#token").val();
		var radio = $("input[name='sex']:checked").val();
		// alert(radio);return;
		if(radio==undefined)
		{
			alert('数据状态不能为空!!!');
			return;
		}
		var miaoshu = $.trim($(".textarea").val());
		if(miaoshu.length==0)
		{
			alert('状态描述不能为空!!!');
			return;
		}
		var url ="/sell/sell_add";
		data = {'_token':token,'id':id,'status':radio,'cause':miaoshu}
		$.post(url,data,function(data){
			if(data !='')
			{
				layer.msg('操作成功!',{icon:1,time:1000});
				window.close(); 
				// window.location.href='{{url("/sell/register_list")}}'; 
				$(".label").html('已操作');
			}else
			{
				layer.msg('操作失败!',{icon:5,time:3000});
			}
		})
	})
	
}
</script> 
</body>
</html>