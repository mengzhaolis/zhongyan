@include('Admin.common._meta')

<title>新建网站角色 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="javascript:void(0)" method="post" class="form form-horizontal" id="form-admin-role-add">
		<input type="hidden" name="" id="token" value="{{csrf_token()}}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="role_name" name="role_name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="role_bei" name="">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限级别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1" checked value="0">
					<label for="sex-1">顶级</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value="1">
					<label for="sex-2">一级</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value="2">
					<label for="sex-2">二级</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">网站角色：</label>
			<div class="formControls col-xs-8 col-sm-9">
			@foreach($data as $v)	
			<dl class="permission-list">
				@if($v['pid']==0)
					<dt>
						<label>
							<input type="checkbox" value="{{$v['id']}}" name="check" id="user-Character-0">
							{{$v['type_name']}}</label>
					</dt>
				@endif
				
					<dd>
						<dl class="cl permission-list2">
							
						@foreach($v['son'] as $val)
							<dt>
								<label class="">
									<input type="checkbox" value="{{$val['id']}}" name="check" id="user-Character-0-0">
									{{$val['type_name']}}</label>
							</dt>
							@foreach($val['son'] as $value)
								<dd>
									<label class="">
										<input type="checkbox" value="{{$value['id']}}" name="check" id="user-Character-0-0-0"> {{$value['type_name']}}
									</label>
									
								</dd>
							@endforeach
						@endforeach
								
						</dl>
						
					</dd>
				
				</dl>
			@endforeach	
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;

		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});

});
//角色对应权限数据提交

$("button").click(function(){
	var array = new Array();
	var token = $("#token").val();
	var role_name = $.trim($("#role_name").val());
	var role_bei = $.trim($("#role_bei").val());
	var level = $("input[type='radio']:checked").val(); 
	// console.log(role_name.length);
	// return;
	if(role_name.length==0)
	{
		alert('角色名不能为空');
		return;
	}

	$('input[name="check"]:checked').each(function () {
		array.push($(this).val());//向数组中添加元素
		role_juris = array.join(',');
		
	});

	// alert(1);return;
	$.ajax({
			type: 'POST',
			url: '/administrator/role_add',
			data: {'_token':token,'role_name':role_name,'role_bei':role_bei,'role_juris':role_juris,'level':level},
			success: function(data){
				console.log(data)
				if(data!='')
				{
					// $(obj).remove();
					layer.msg('操作成功!',{icon: 6,time:3000});
					window.location.reload();
				}else
				{
					layer.msg('操作失败!',{icon: 3,time:3000});
				}
				
			}
		});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>