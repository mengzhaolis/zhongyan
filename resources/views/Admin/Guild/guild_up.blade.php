<!--_meta 作为公共模版分离出去-->
@include('Admin.common._meta')
<!--/meta 作为公共模版分离出去-->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="/H-ui.admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form action="javascript:void(0)" method="post" class="form form-horizontal" id="form-article-add">
    {{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>行业标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->guild_title}}" placeholder="" id="" name="guild_title">
                <input type="hidden" name="id" value="{{$data->id}}">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">对应url：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->guild_url}}" placeholder="" id="" name="guild_url">
			</div>
		</div>

        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">封面图：</label>
			<div style="width:80px;height:80px;float:left;">
                <img src="{{$img_path}}" alt="" class="ing" style="width:80px;height:80px;margin-left:15px;">
                
                    <input type="file" multiple id="fil" style="float:left;margin-left:100px;margin-top:-43px;">
                    <input type="hidden" id="face" name="guild_img" value="{{$data->guild_img}}">
                
            </div>
		</div>
		
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="guild_miao" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" >{{$data->guild_miao}}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<!-- <button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button> -->
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/H-ui.admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>


<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script type="text/javascript">
//封面图
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
              url: "/case/img_add",  
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
//表单提交
$("#form-article-add").validate({
    rules:
    {
        guile_title:{
            required: true,
        }

    },
    onkeyup:false,
    focusCleanup:true,
    success:"valid",
    submitHandler:function(form)
    {
        $(form).ajaxSubmit({
            'type':'post',
            'url' :'/guild/guild_update',
            'success':function(data)
            {
                // console.log(data)
                if(data !='')
                {
                    layer.msg('执行成功!',{icon:1,time:1000});
                    // parent.location.reload()
                    // window.close();
					window.location.href='{{url("/guild/guild_list")}}'; 
                }else
                {
                    layer.msg('执行失败!',{icon:5,time:3000});
                }
            }
        });
    }
});


</script>
</body>
</html>