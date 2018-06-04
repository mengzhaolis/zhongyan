@include('Admin.common._meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>新增图片</title>
<!-- <link href="lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" /> -->
</head>
<body>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图片名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="img_name" name="img_name">
			</div>
		</div>
		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">简略标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="">
			</div>
		</div> -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="" id="pid" class="select">\
                @foreach($data as $value)
					<option value="{{$value->id}}">{{$value->img_type_name}}</option>
				@endforeach
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="0" placeholder="数据越小排序越靠前" id="" name="asc">
			</div>
		</div>
		
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">图片上传：</label>
            <div style="width:80px;height:80px;float:left;">
                <img src="" alt="" class="ing" style="width:80px;height:80px;margin-left:15px;">
                
                    <input type="file" multiple id="fil" style="float:left;margin-left:100px;margin-top:-43px;">
                    <input type="hidden" id="face" name="face_img" value="">
                
            </div>
        </div>
        
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图片链接：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="图片对应跳转链接以http://开头" id="img_url" name="img_url">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				
				<button class="btn btn-secondary radius" id="img_add" type="button"><i class="Hui-iconfont" >&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>


<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')
 <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
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
function article_save(){
	alert("刷新父级的时候会自动关闭弹层。")
	window.parent.location.reload();
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
              url: "/images/images_add_img",  
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
    // alert(123123)
    var token = $("#token").val();
    var img_id = $("#face").val();
    var pid = $("#pid").val();
    var img_url = $("#img_url").val();
    // alert(img_id);return;
    var img_name = $.trim($("#img_name").val());
    if(img_name.length==0)
    {
        alert('分类不能为空');
        return;
    }
    var url = "/images/images_data_update";
    var data = {'_token':token,'img_name':img_name,'id':img_id,'pid':pid,'img_url':img_url};
    // alert(123)
    $.post(url,data,function(data){
        if(data=='')
        {   
            layer.msg('执行失败!',{icon:5,time:1000});
            window.close(); 
            window.location.href='{{url("/images/images_list")}}';
        }else
        {
            layer.msg('执行成功!',{icon:1,time:1000});
            window.close(); 
            window.location.href='{{url("/images/images_list")}}';
        }
        
    });
    

})

</script>
</body>
</html>