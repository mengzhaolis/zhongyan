@include('Admin.common._meta')
<title>栏目设置</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-category-add">
        {{csrf_field()}}
		<div id="tab-category" class="HuiTab">
			<!-- <div class="tabBar cl">
				<span>基本设置</span>
				<span>模版设置</span>
				<span>SEO</span>
			</div> -->
			<div class="tabCon">
				
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						上级栏目：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="pid">
                            <option value="">选择上级分类</option>
                            @foreach($tree as $v)
							    <option value="{{$v['id']}}">{{$v['type_name']}}</option>
                                @foreach($v['son'] as $val)
                                    <option value="{{$val['id']}}">&nbsp;&nbsp;&nbsp;|--{{$val['type_name']}}</option>
                                @endforeach
							@endforeach
						</select>
						</span>
					</div>

				</div>
				<div class="row cl" style="margin-top:40%">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						分类名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="type_name">
					</div>
					<div class="col-3">
					</div>
				</div>
				
				
				
				
			</div>
			
		<div class="row cl" style="margin-top:25px">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#tab-category").Huitab({
		index:0
	});
	$("#form-category-add").validate({
		rules:{
			type_name:{
                required: true,
            },
            pid:
            {
                required: true,
            },
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
                'type' : 'post',
                'url':'/type/type_insert',
                'success':function(data)
                {
                    layer.msg(data.message,{icon:data.status});
                    window.location.href ='/type/type_list';
                }
            })
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>