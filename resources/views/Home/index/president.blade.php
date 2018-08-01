@include('Home.common.head')
    <meta charset="UTF-8">
    <title>总裁专题页</title>

    <link rel="stylesheet" type="text/css" href="/Home/css/index/president/president.css">
    
</head>
<body>
@include('Home.common._meat')

<div class="main">
	<!-- banner	 -->
	<div class="banner">
		<img src="/Home/images/index/president/prestidentbanner.jpg">
	</div>
	<!-- 总裁履历 -->
	<div class="record">
		<div class="recordInner">
			<div class="recordInnerLeft L"></div>
			<div class="recordInnerRight R">
				<h4>总裁履历</h4>
				<p>总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历总裁履历</p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- 总裁专栏 -->
	<div class="column">
		<div class="columnInner">
		    <h3><img src="/Home/images/index/president/column.png"></h3>
			 <!--开课时间-->
		    <div class="ClassBegins L">
		         <p>
		            <span class="L"><a href="#"><img src="/Home/images/index/president/ClassBegins.png" alt=""></a></span>
		            <span class="ClassBegins_more R"><a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">更多&gt&gt</a></span>
		        </p>
		        <div class="clear"></div>
		        <ul>
                    @foreach($course as $course)
		                <li class="ClassBeginsFire"><a href="{{url('/course')}}?id={{$course->id}}">{{$course->course_title}}</a></li>
		            @endforeach
		        </ul>
		    </div>
		    <!--总裁动态-->
		    <div class="dynamic R">
		        <p>
		            <span class="L"><a href="#"><img src="/Home/images/index/president/dynamic.png" alt=""></a></span>
		            <span class="dynamic_more R"><a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">更多&gt&gt</a></span>
		        </p>
		        <div class="clear"></div>
		        <div class="dynamic_content R">
		            <ul>
                        @foreach($supremo as $supremo)
                            <li class="noLineHeight" id="list">
                                <a href="{{url('/zx_details')}}?id={{$supremo->id}}" target="_blank">
                                    <div class="consult_img_first consult_img dynamic_img_first">
                                        <img src="{{$supremo->img_path}}">
                                    </div>
                                    <p><em></em>{{$supremo->title}}</p>
                                </a>
                            </li>
		                @endforeach
		            </ul>
		        </div>
		    </div>
		</div>
		<div class="clear"></div>
	</div>
<!-- 没有内容 -->
    <div class="empty">
    	<div class="emptyInner"></div>
    </div>
    <!-- 调研大讲堂 -->
    <div class="auditorium">
    	<div class="auditoriumInner">
    		<h3><img src="/Home/images/index/president/auditorium.png"></h3>
    		<ul>
    			<li><a href=""><img src="/Home/images/index/president/rival.png"></a><p>工业市场调研工业市场调研工业市场调研工业市场调研工业市场调研</p></li>
    			<li><a href=""><img src="/Home/images/index/president/rival.png"></a><p>工业市场调研工业市场调研工业市场调研工业市场调研工业市场调研</p></li>
    			<li><a href=""><img src="/Home/images/index/president/rival.png"></a><p>工业市场调研工业市场调研工业市场调研工业市场调研工业市场调研</p></li>
    			<li><a href=""><img src="/Home/images/index/president/rival.png"></a><p>工业市场调研工业市场调研工业市场调研工业市场调研工业市场调研</p></li>
    			<li><a href=""><img src="/Home/images/index/president/rival.png"></a><p>工业市场调研工业市场调研工业市场调研工业市场调研工业市场调研</p></li>
    		</ul>
    	</div>
    </div>
    <!-- 总裁一对一沟通 -->
    <div class="only">
    	<div class="onlyInner">
    		<h4>中研总裁一对一沟通，每天只限&nbsp;<span>1</span>&nbsp;个名额，速来抢占！</h4>
    		<form>
    			<label for="name"><span>*</span>您的姓名&nbsp;:</label>
    			<input type="text" name="" id="name" placeholder="请填写您的姓名">
    			<label for="tel"><span>*</span>您的电话&nbsp;:</label>
    			<input type="text" name="" id="tel" placeholder="请填写您的电话"><br/>
    			<input type="submit" name="" class="btn" value="立即注册">
    			<a href="">总裁留言</a>
    		</form>
    		<p>您成功提交表单即表示已报名成功，活动期间，我们将每天抽取一个名额与行业专家一对一沟通详细问题及时间安排可联系中研世纪</p>
    		<p>400-803-2262。所有参与人员均可获得中研世纪总裁与专家沟通研究方案的专享录制视频一份。</p>
    		<img src="/Home/images/index/president/line.png">
    		<span>注：中研世纪对此活动享有最终解释权。</span>
    	</div>
    </div>

	<!-- 客户评价 -->
	<div class="evaluate">
	    <div class="evaluate_inner amplifyImg">
	        <h3><img src="/Home/images/index/president/evaluate .png"></h3>
	        <ul>
	            <li>
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li>
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li>
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li>
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li class="noMarginR">
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li>
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li>
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li>
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li>
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            </li>
	            <li class="noMarginR">
	                <img src="./images/president/estimate.png" class="pimg"/>

	                <p>公司名称加项目名称</p>
	                <span>2018-8-10</span>
	            
	            </li>
	        </ul>
	        <div class="clear"></div>
	        <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">查看更多&gt&gt</a>
	    </div>
	</div>
</div>
@include('Home.common.footer')
 <script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/index/president/president.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>