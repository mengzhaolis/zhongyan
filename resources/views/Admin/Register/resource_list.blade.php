@include('Admin.common._meta')
<title>注册管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<span class="select-box" style="margin-left:3px;width:200px;">
        <select class="select" id="sel_Sub" name="id">
            <option value="0">选择销售人员</option>
            @foreach($data as $v)
                <option value="{{$v->id}}">{{$v->name}}</option>
            @endforeach  
        </select>
    </span>
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
				<th width="50">操作</th>
			</tr>
		</thead>
		<tbody class="ti">
			
		</tbody>
	</table>
	</div>
	<!-- 分发资源选择对象开始 -->
	<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content radius">
			<div class="modal-header">
				<h3 class="modal-title">请选择分发人</h3>
				<input type="hidden" id="token" value="{{csrf_token()}}">
				<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
			</div>
			
			<div class="modal-footer">
				<button class="btn btn-primary" id="fen">确定</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
	<!-- 分发资源结束 -->
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
// $(function(){
// 	$('.table-sort').dataTable({
// 		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
// 		"bStateSave": true,//状态保存
// 		"aoColumnDefs": [
// 		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
// 		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
// 		]
// 	});
	
// });
/*查看对应销售的资源*/
$("#sel_Sub").change(function(){
    var token = $("#token").val();
    var id = $(this).val();
    var url ="/register/resource_list";
    var data ={'_token':token,'id':id};
    $.post(url,data,function(data){
        $('.table').html(data);
    })
})
/*用户-查看*/
function member_show(){
	$("#modal-demo").modal("show")
}
/*分发资源*/
function fen()
{
	
	$("#modal").modal("show")
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
/*用户-删除*/
function member_del(obj,id){
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