@include('Home.common.head')
    <meta charset="UTF-8">
    <title>课程详情页</title>

    <link rel="stylesheet" type="text/css" href="/Home/css/course_xiang/courseDetailsPage.css">
</head>
<body>
@include('Home.common._meat')
<!-- 主体 -->
<div class="main">
    <div class="banner"><img src="/Home/images/course_xiang/banner.png"></div>   
	<div class="mainInner">
		<div class="breadcrumb">
            <a href="" class="currentPosition">当前位置</a>
            <a href="index.html" class="index">课程详情页</a>
        </div>
        <div class="sarticle">
            <div class="sarticleLeft L">
                <div class="sarticleLeftInner">
                    <!-- 文章详情 -->
                    <div class="detailPage">
                        <h3>{{$course->course_title}}</h3>
                        <p><span>课程类型:{{$course->course_type}}</span>
                            <span>开始时间：{{$course->created_at}}</span>
                            
                            <span class="noMargin">结束时间：{{$course->updated_at}}</span>
                        </p>
                        {{$course->course_jian}}
                        <div>
                            {!! html_entity_decode($course->editorValue) !!}
                        </div>
                    </div>
                    <!-- 客户评价 -->
                    <div class="evaluate">
                        <div class="evaluate_inner amplifyImg">
                            <div class="evaluateTitle">
                                <h3>客户评价</h3>
                                <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">查看更多&gt&gt</a>
                            </div>
                            <div class="clear"></div>
                            <ul>
                                <li>
                                    <img src="/Home/images/course_xiang/estimate.png" class="pimg"/>

                                    <p>公司名称加项目名称</p>
                                </li>
                                <li>
                                    <img src="/Home/images/course_xiang/estimate.png" class="pimg"/>

                                    <p>公司名称加项目名称</p>
                                </li>
                                <li>
                                    <img src="/Home/images/course_xiang/estimate.png" class="pimg"/>

                                    <p>公司名称加项目名称</p>
                                </li>
                                <li class="noMarginR">
                                    <img src="/Home/images/course_xiang/estimate.png" class="pimg"/>

                                    <p>公司名称加项目名称</p>
                                </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mainInnerRight R">
                <!-- 开课时间 -->
                <div class="ClassBegins">
                    <p>
                        <h3 class="L">开课时间</h3>
                    </p>
                    <div class="clear"></div>
                    <ul>
                        <li class="ClassBeginsFire"><a href="#">2018-8-10&nbsp;开课时间开课时间开课时间开课时间开课时间</a></li>
                        <li class="ClassBeginsFire"><a href="#">2018-8-10&nbsp;开课时间开课时间开课时间开课时间开课时间</a></li>
                        <li><a href="#">2018-8-10&nbsp;开课时间开课时间开课时间开课时间开课时间</a></li>
                        <li><a href="#">2018-8-10&nbsp;开课时间开课时间开课时间开课时间开课时间</a></li>
                        <li><a href="#">2018-8-10&nbsp;开课时间开课时间开课时间开课时间开课时间</a></li>
                    </ul>
                </div>
                <div class="apply"><img src="/Home/images/course_xiang/apply.gif"></div>
                <div class="mainInnerRightType">
                    <h3>急速注册</h3>
                    <form>
                        <div><em><img src="/Home/images/course_xiang/name.png"></em><input type="text" name="" placeholder="您的姓名"></div>
                        <div><em><img src="/Home/images/course_xiang/tel.png"></em><input type="text" name="" placeholder="您的电话"></div>
                        <select class="province">
                            <option>-&nbsp;省&nbsp;-</option>
                        </select>
                        <select class="downtown">
                            <option>-&nbsp;市区&nbsp;-</option>
                        </select>
                        <p><span>课程类型：</span>
                                <input type="radio" name="radios" class="openClass" id="openClass" checked="checked">
                                <label for="openClass">公开课</label>
                                <input type="radio" name="radios" class="innerClass" id="innerClass">
                                <label for="innerClass">企业内训课</label>
                        </p>
                        <select class="signClass">
                            <option>-&nbsp;报名课程&nbsp;-</option>
                        </select>
                        <input type="submit" name="" class="btn" value="立即提交">
                    </form>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>

<script src="/Home/js/course_xiang/courseDetailsPage.js"></script>
</body>
</html>