@include('Home.common.head')
    <meta charset="UTF-8">
    <title>课程列表页</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/index/CourseListPage.css">

</head>
<body>
@include('Home.common._meat')
<!-- banner	 -->
<div class="banner">
	<img src="/Home/images/index/course_list/banner.png">
</div>
<!-- 主体 -->
<div class="main">
	<div class="mainInner">
		<div class="breadcrumb">
			<a href="" class="currentPosition">当前位置</a>
			<a href="index.html" class="index">首页</a>
		</div>
		<h3>开课时间</h3>
		<ul>
			@foreach($course_list as $course_list)
				@if($course_list['updated_at'] >time())
					<li>
						<div class="leftImg L"><img src="/Home/images/index/course_list/peopleBlue.png"></div>
						<div class="centerContent L">
							<h4><a href="{{url('/course')}}?id={{$course_list['id']}}">{{$course_list['course_title']}}</a></h4>
							<p><em>开始时间：{{$course_list['created_at']}}</em><i>结束时间:{{date('Y-m-d',$course_list['updated_at'])}}</i></p>
							<p><span>简介：{{$course_list['course_jian']}}</span></p>
						</div>
						<div class="rightLink R">
							<a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">线上咨询</a>
							<a href="">立即报名</a>
						</div>
						<div class="clear"></div>
					</li>
				@else
					<li>
						<div class="leftImg L"><img src="/Home/images/index/course_list/people.png"></div>
						<div class="centerContent L">
							<h4><a href="{{url('/course')}}?id={{$course_list['id']}}">{{$course_list['course_title']}}</a></h4>
							<p><em>开始时间：{{$course_list['created_at']}}</em><i>结束时间:{{date('Y-m-d',$course_list['updated_at'])}}</i></p>
							<p><span>简介：{{$course_list['course_jian']}}</span></p>
						</div>
						<div class="rightLink R">
							<a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">线上咨询</a>
							<a href="">立即报名</a>
						</div>
						<div class="clear"></div>
					</li>
				@endif
				
			@endforeach
			
			
			
			
		</ul>
		<!-- 分页 -->
		<div style="text-align:center">
            <div class="pager"></div>
        </div>
	</div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/index/CourseListPage.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>