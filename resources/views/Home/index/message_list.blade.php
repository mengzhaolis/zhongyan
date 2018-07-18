@include('Home.common.head')
    <meta charset="UTF-8">
    <title>数据列表页</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/message/DataListPage.css">
</head>
<body>
@include('Home.common._meat')
<!-- banner	 -->
<div class="banner">
	<img src="/Home/images/index/message/banner.png">
</div>
<!-- 主体 -->
<div class="main">
	<div class="mainInner">
		<div class="breadcrumb">
			<a href="" class="currentPosition">当前位置</a>
			<a href="index.html" class="index">首页</a>
		</div>
		<div class="mainInnerLeft L">
			<ul>
                @foreach($message as $message)
                    <li>
                        <div class="mainInnerLeftImg L"><a href=""><img src="{{$message['img_path']}}" alt=""></a></div>
                        <div class="mainInnerLeftContent L">
                            <h4><a href="{{url('/zx_details')}}?id={{$message['id']}}">{{$message['title']}}</a><em>{{date('Y-m-d',$message['created_at'])}}</em><div class="clear"></div></h4>
                            <p><span>描述&nbsp;:</span>
                            {{$message['describe']}}</p>
                        </div>
                        <div class="clear"></div>
                    </li>
                @endforeach
			</ul>
		</div>
		<div class="mainInnerRight R">
			<div class="mainInnerRightType">
				<h3>开启专业调研通道</h3>
				<form>
					<div><em><img src="/Home/images/index/message/name.png"></em><input type="text" name="" placeholder="您的姓名"></div>
					<div><em><img src="/Home/images/index/message/tel.png"></em><input type="text" name="" placeholder="您的电话"></div>
					<select class="province">
						<option>-&nbsp;省&nbsp;-</option>
					</select>
					<select class="downtown">
						<option>-&nbsp;市区&nbsp;-</option>
					</select>
					<textarea class="genre">调研类型</textarea>
					<textarea class="need">调研需求</textarea>
					<input type="submit" name="" class="btn" value="立即提交">
				</form>
			</div>
			<div class="mainInnerRightVideo">
				<h3>精彩视频</h3>
				<ul>
					<li>
						<a href=""><span>我是标题我是标题我是标题</span></a>
					</li>
					<li>
						<a href=""><span>我是标题我是标题我是标题</span></a>
					</li>
					<li>
						<a href=""><span>我是标题我是标题我是标题</span></a>
					</li>
				</ul>
			</div>
			<div class="empty"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/index/DataListPage.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>