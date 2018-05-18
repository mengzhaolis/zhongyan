@include('Admin.common._meta')

<title>中研世纪-分类添加</title>
<meta name="keywords" content="中研世纪-分类添加">
<meta name="description" content="中研世纪-分类添加">
</head>
<body>
<article class="page-container">
<button class="btn radius btn-primary size-L" onClick="modaldemo()">添加一级类</button>
<input class="btn btn-primary size-L radius" id="two" type="button" value="添加下级类">
<!--添加一级分类弹出层 开始-->
    <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius" style="width:426px;">
                <div class="modal-header">
                    <h3 class="modal-title">添加一级分类</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                    <input type="hidden" id="token" value="{{csrf_token()}}">
                    <input type="hidden" id="pid" value='0'>
                </div>
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
<form action="" method="post" class="form form-horizontal" style="margin-right:15%;display:none" id="form-member-add">
{{csrf_field()}}
    <div class="row cl" style="margin-right: 23%;margin-top: 5%;">
        <label class="form-label col-xs-4 col-sm-3">先择上级：</label>
        <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
            <select class="select" size="1" name="pid">
                <option value="" selected>请选择上一级</option>
                @foreach($tree as $v)
                    <option value="{{$v['id']}}">{{$v['type_name']}}</option>
                    @foreach($v['son'] as $val)
                        <option value="{{$val['id']}}">&nbsp;&nbsp;|--{{$val['type_name']}}</option>
                    @endforeach
                @endforeach
            </select>
            </span> </div>
    </div>
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
</article>

@include('Admin.common._footer')
<!--/请在下方写此页面业务相关的脚本-->
<script>
    //显示添加一级分类的弹窗
    function modaldemo(){
	$("#modal-demo").modal("show")}
    //弹窗提交
    $("#queding").click(function(){
        var title1 = $.trim($("#title1").val());
        var token = $("#token").val();
        var pid = $("#pid").val();
        if(title1 =="")
        {
            alert('标题不能为空');
            return;
        }
        var url = '/type/type_insert';
        var data ={'_token':token,'type_name':title1,'pid':pid};
        $.post(url,data,function(data){
            layer.msg(data.message,{icon:data.status});
            window.location.href="/type/type_list";
        });
    })
    //添加下级分类
    $("#two").click(function(){
        $('#form-member-add').css('display','inline');
    });
    //下级分类提交
    $("#form-member-add").validate({
        rules:{
            type_id:{
                required: true,
            },
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
                'url':'/type/type_insert',
                'success':function(data)
                {
                    layer.msg(data.message,{icon:data.status});
                    window.location.href ='/type/type_list';
                }
            })
            
        }
    })
</script>
</body>
</html>