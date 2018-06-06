@include('Admin.common._meta')

<title>图片展示</title>
<link href="/H-ui.admin/lib/lightbox2/2.8.1/css/lightbox.css" rel="stylesheet" type="text/css" >
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片管理 <span class="c-gray en">&gt;</span> 图片展示 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="edit()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe6df;</i> 编辑</a> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="portfolio-content">
		<ul class="cl portfolio-area">
            <input type="hidden" id="token" value="{{csrf_token()}}">
			@foreach($data as $val)
                <li class="item">
                    <div class="portfoliobox">
                        <input class="checkbox" name="" type="checkbox" value="">
                        <div class="picbox"><a href="{{$val->img_path}}" data-lightbox="gallery" data-title="{{$val->img_name}}"><img src="{{$val->img_path}}"></a></div>
                        <div class="textbox"> <a href="{{$val->img_url}}">{{$val->img_name}}</a>
                        <span style="float:right">  
                            
                            <a style="text-decoration:none" onClick="picture_del(this,'{{$val->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe609;</i></a>
                        </span>
                        </div>
                    </div>
                </li>
			@endforeach
		</ul>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
@include('Admin.common._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/H-ui.admin/lib/lightbox2/2.8.1/js/lightbox.min.js"></script> 
<script type="text/javascript">
$(function(){
	$(".portfolio-area li").Huihover();
});
/*图片-删除*/
function picture_del(obj,id){
	var token = $('#token').val();
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/images/images_stop',
			data: {'_token':token,'id':id},
			success: function(data){
				// console.log(data);
				// return;
				if(data=='')
				{
					layer.msg('操作失败!',{icon: 3,time:1500});
					return;
				}
				
				$(obj).remove();
				layer.msg('操作成功!',{icon: 1,time:1500});
				window.location.reload();
				
			},
			// error:function(data) {
				
			// },
		});		
	});
}
</script>
</body>
</html>