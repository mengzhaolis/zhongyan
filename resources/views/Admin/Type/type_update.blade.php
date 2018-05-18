<!--_meta 作为公共模版分离出去-->
@include('Admin.common._meta')
<!--/meta 作为公共模版分离出去-->

<title>栏目设置</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" style="margin-right:15%;" id="form-member-add">
{{csrf_field()}}
    
    <div class="row cl" style="margin-top:8%;margin-right: 23%;">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="" placeholder="" id="type_name" name="type_name">
        </div>
    </div>
    
    
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
</form>
</div>

<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer') <!--/_footer 作为公共模版分离出去-->

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
	$("#form-member-add").validate({
        rules:{
            
            type_name:{
                required: true,
            },
        },
        onkeyup:false,
		focusCleanup:true,
		success:"valid",
        submitHandler:function(form)
        {
            $(form).ajaxSubmit({
                'type' : 'post',
                'url':'/type/type_list_update',
                'success':function(data)
                {
                    layer.msg(data.message,{icon:data.status});
                    window.location.href ='/type/type_list';
                }
            })
            
        }
    })
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>