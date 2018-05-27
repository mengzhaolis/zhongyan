@include('Admin.common._meta')

<title>栏目设置</title>
</head>
<body>
<div class="page-container">
	<form action="javascript:void(0)" method="post" class="form form-horizontal" id="form-category-add">
    <input type="hidden" id="token" value="{{csrf_token()}}">    
       
    <div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span>下级权限</span>
				
				<span>一级权限</span>
			</div>
			<div class="tabCon">
				
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						上级权限：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="pid" name="sel_Sub">
							<option value="0">请选择顶级分类</option>
							
                            @foreach($data as $val)
                                <option value="{{$val['id']}}">{{$val['type_name']}}</option>
								@foreach($val['son'] as $value)
									<option value="{{$value['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;|--{{$value['type_name']}}</option>
								@endforeach
                            @endforeach
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						权限名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="juris" name="" >
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">权限url：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="juris_url" name="">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<div class="col-9 col-offset-3">
						<input class="btn btn-primary radius" id="ti" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
					</div>
				</div>
			</div>
			
				
			
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">权限名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" id="juries" value="" style="width:200px;" >
                        
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">权限路由：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" id="juris_urls" value="">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<div class="col-9 col-offset-3">
						<input class="btn btn-primary radius" id="tijiao" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
					</div>
				</div>
			</div>
		</div>
		
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){

	
	$("#tab-category").Huitab({
		index:0
	});

});
//权限提交
		
	$("#tijiao").click(function () {
		var type = $("#types").val();
		var token = $("#token").val();
		// alert(token); return;
		
			var juris = $('#juries').val();
		// alert(juris); return;
			var juris_url = $('#juris_urls').val();
			var data = { '_token': token, 'type_name': juris, 'juris_url': juris_url }
			var url = "/administrator/permission_add";
		
	$.post(url, data, function (msg) {
			// console.log(msg)
			if (msg != '') {
				layer.msg('添加成功!', { icon: 1, time: 2000 });
				window.location.reload();
			} else {
				layer.msg('添加失败!', { icon: 3, time: 2000 });
			}
		})

	});


	$("#ti").click(function () {
		var type = $("#type").val();
		var token = $("#token").val();
		
			var juris = $('#juris').val();
			var juris_url = $('#juris_url').val();
			var pid = $('#pid').val();
			var data = { '_token': token, 'type_name': juris, 'juris_url': juris_url, 'pid': pid }
			var url = "/administrator/permission_add";
		
	$.post(url, data, function (msg) {
			// console.log(msg)
			if (msg != '') {
				layer.msg('添加成功!', { icon: 1, time: 2000 });
				window.location.reload();
			} else {
				layer.msg('添加失败!', { icon: 3, time: 2000 });
			}
		})

	});


    
    
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>