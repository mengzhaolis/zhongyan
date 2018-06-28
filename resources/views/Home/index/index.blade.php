@include('Home.common.head')
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/index/public.css">
    <link rel="stylesheet" type="text/css" href="/Home/css/index/wrap.css">
    <link rel="stylesheet" type="text/css" href="/Home/css/index/index.css">

</head>
<body>
    @include('Home.common._meat')jieguo

<!--轮播图-->
<div class="slider">
  <ul class="slider-main">
    <li class="slider-panel"> <a><img src="./images/index/hospital.png"></a> </li>
    <li class="slider-panel"> <a><img src="./images/index/banner.png"></a> </li>
    <li class="slider-panel"> <a><img src="./images/index/real_state.png"></a> </li>
    <li class="slider-panel"> <a><img src="./images/index/industry.png"></a> </li>
  </ul>
  <div class="slider-extra">
    <ul class="slider-nav">
      <li class="slider-item"></li>
      <li class="slider-item"></li>
      <li class="slider-item"></li>
      <li class="slider-item"></li>
    </ul>
    <div class="slider-page"> <a class="slider-pre" href="javascript:;;"> &lt;</a> <a class="slider-next" href="javascript:;;">&gt;</a> </div>
  </div>
</div>
<!-- 主体 -->
<div class="main">
    <!--内容-->
    <div class="content publicWidth">
        <div class="inner">
            <!--开课时间-->
            <div class="special L">
                <div class="specialTop">
                    <h4 class="L"><span>开课时间</span></h4>
                    <a href="#" class="contentMore R">更多&gt&gt</a>
                </div>
                <div class="clear"></div>
                <ul>
                    @foreach($course as $course)
                        <li>
                            <a href="">
                                <div class="specialLeft L">
                                    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">预约</a>
                                    <p>{{$course->created_at}}</p>
                                </div>
                                <div class="specialRight L">
                                    <h5>{{$course->course_title}}</h5>
                                    <p>{{$course->course_jian}}<a href="{{$course->id}}">【详情】</a></p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--最新资讯-->
            <div class="consult R">
                <div class="consultTop">
                    <h4 class="L"><span>最新资讯</span></h4>
                    <a href="#" class="contentMore R">更多&gt&gt</a>
                </div>
                <div class="clear"></div>
                
                <div class="consult_content R">
                    <ul>
                        @foreach($message as $message)
                            <li class="noLineHeight" id="list">
                                <a href="{{$message->id}}">
                                    <div class="consult_img_first consult_img">
                                        <img src="{{$message->img_path}}">
                                    </div>
                                    <p><em></em>{{$message->title}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!--了解中研-->
    <div class="knowZY publicWidth">
        <div class="inner">
            <div class="public_top"><h3>了解中研</h3></div>
            <p class="TitleP">权威调研咨询机构&nbsp让调研无忧</p>
            <ul>
                <li>
                    <a href="">
                    <div class="knowZY_details_title">
                        <em>26年</em><br/>
                        <i>品牌积淀</i>
                    </div>
                    <div class="knowZY_details_explain">
                        <p>中国唯一一家提供<em>工业应用</em>和生产流程<em>技术调研</em>的市场研究 <em>专业机构</em>。</p>
                    </div></a>
                </li>
                <li><a href="">
                    <div class="knowZY_details_title">
                        <em>600个</em><br/>
                        <i>覆盖全国城市</i>
                    </div>
                    <div class="knowZY_details_explain">
                        <p><em>一站式</em>服务业务覆盖全国<em>600多个城市</em>，满足客户<em>跨地域</em>的调研需求。</p>
                    </div></a>
                </li>
                <li><a href="">
                    <div class="knowZY_details_title">
                        <em>3000+</em><br/>
                        <i>成功案例</i>
                    </div>
                    <div class="knowZY_details_explain">
                        <p>工业、医疗·医药、地产、竞争等不同行业，<em>超过3000+成功案例</em>，调研行业<em>权威品牌</em>。</p>
                    </div></a>
                </li>
                <li><a href="">
                    <div class="knowZY_details_title">
                        <em>100名</em><br/>
                        <i>行业研究专家</i>
                    </div>
                    <div class="knowZY_details_explain">
                        <p><em>60名硕士</em>以上学历研究人员<em>实力团队</em>，确保一手数据<em>真实可靠</em>。</p>
                    </div></a>
                </li>
                <li><a href="">
                    <div class="knowZY_details_title">
                        <em>需求服务</em><br/>
                        <i>客户专属</i>
                    </div>
                    <div class="knowZY_details_explain">
                        <p>提供<em>专项调研</em>与<em>定制式调研</em>服务需求，<em>专业调研机构</em>保障客户调研<em>成功率</em>。</p>
                    </div></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <!-- 中研行业 -->
    <div class="industry publicWidth">
        <div class="inner">
             <div class="public_top textLeft">
                 <h3>中研行业</h3>
                 <a href="">换一批&gt;&gt;</a>
             </div>
             <div class="clear"></div>
             <p class="TitleP">工业<span>/</span>商业地产<span>/</span>竞争对手<span>/</span>医药&nbsp;·&nbsp;医疗<span>/</span>营销咨询<span>/</span>科技园区<span>/</span>互联网大数据</p>
             <ul>
                 <li>
                     <h4>我是标题我是标题我是标题</h4>
                     <em></em>
                     <p>我是内容我是内容我是内容我是内容我是内容我是内容</p>
                     <div>
                         <a href="">参考报价</a>
                         <a href="">需求评估</a>
                     </div>
                 </li>
                   <li>
                     <h4>我是标题我是标题我是标题</h4>
                     <em></em>
                     <p>我是内容我是内容我是内容我是内容我是内容我是内容</p>
                     <div>
                         <a href="">参考报价</a>
                         <a href="">需求评估</a>
                     </div>
                 </li>
                   <li>
                     <h4>我是标题我是标题我是标题</h4>
                     <em></em>
                     <p>我是内容我是内容我是内容我是内容我是内容我是内容</p>
                     <div>
                         <a href="">参考报价</a>
                         <a href="">需求评估</a>
                     </div>
                 </li>
                   <li>
                     <h4>我是标题我是标题我是标题</h4>
                     <em></em>
                     <p>我是内容我是内容我是内容我是内容我是内容我是内容</p>
                     <div>
                         <a href="">参考报价</a>
                         <a href="">需求评估</a>
                     </div>
                 </li>
             </ul>
    	</div>
    </div>
    <!-- 服务体系 -->
    <div class="service publicWidth">
    	<div class="inner">
            <div class="public_top textLeft"><h3>服务体系</h3></div>
            <div class="clear"></div>
            <p class="TitleP">浏览产品了解中研能为你做什么</p>
            <div class="service_inner_list">
            	<ul>
                <li class="flip_wrap">
                    <div class="flip">
                        <div class="show">
                            <img src="/Home/images/index/vs.png">
                            <h4>竞争企业调研</h4>
                        </div>
                        <div class="back"><a href="">
                            <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研</p>
                            <h4>竞争企业调研</h4></a>
                        </div>
                    </div>
                 </li>  
                <li class="flip_wrap">
                    <div class="flip">
                        <div class="show">
                            <img src="/Home/images/index/industryBg.png">
                            <h4>行业调研</h4>
                        </div>
                        <div class="back"><a href="">
                            <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研</p>
                            <h4>行业调研</h4></a>
                        </div>
                    </div>
                 </li> 
                <li class="flip_wrap">
                    <div class="flip">
                        <div class="show">
                            <img src="/Home/images/index/channelBg.png">
                            <h4>渠道调研</h4>
                        </div>
                        <div class="back"><a href="">
                            <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞</p>
                            <h4>渠道调研</h4></a>
                        </div>
                    </div>
                 </li>
                 <li class="flip_wrap">
                    <div class="flip">
                        <div class="show">
                            <img src="/Home/images/index/satisfiedBg.png">
                            <h4>满意度调研</h4>
                        </div>
                        <div class="back"><a href="">
                            <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研</p>
                            <h4>满意度调研</h4></a>
                        </div>
                    </div>
                 </li>
                 <li class="flip_wrap">
                    <div class="flip">
                        <div class="show">
                            <img src="/Home/images/index/marketingBg.png">
                            <h4>营销咨询</h4>
                        </div>
                        <div class="back"><a href="">
                            <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研</p>
                            <h4>营销咨询</h4></a>
                        </div>
                    </div>
                 </li>
                 <li class="flip_wrap">
                    <div class="flip">
                        <div class="show">
                            <img src="/Home/images/index/marketBg.png">
                            <h4>市场战略规划</h4>
                        </div>
                        <div class="back"><a href="">
                            <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研</p>
                            <h4>市场战略规划</h4></a>
                        </div>
                    </div>
                 </li>
                 <li class="flip_wrap">
                    <div class="flip">
                        <div class="show">
                            <img src="/Home/images/index/consultingBg.png">
                            <h4>业务咨询</h4>
                        </div>
                        <div class="back"><a href="">
                            <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞</p>
                            <h4>业务咨询</h4></a>
                        </div>
                    </div>
                 </li>
                 <li class="flip_wrap noBorderRight">
                    <div class="flip">
                        <div class="show">
                            <img src="/Home/images/index/businessBg.png">
                            <h4>商业模式设计</h4>
                        </div>
                        <div class="back"><a href="">
                            <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞</p>
                            <h4>商业模式设计</h4></a>
                        </div>
                    </div>
                 </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- 总裁专栏 -->
    <div class="president publicWidth">
    	<div class="inner">
    		<div class="public_top"><h3>总裁专栏</h3></div>
            <p class="TitleP">26载风雨磨炼始终如一的专业领袖</p>
            <div class="presidentContent">
                <div class="presidentLeft L">
                    <div class="presidentLeftTitle"><h5 class="L">总裁简介</h5><a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="R">更多&gt;&gt;</a></div>
                    <div class="clear"></div>
                    <div class="presidentLeftContent">
                        <div class="L leftImg"><img src="./images/index/president.png"/></div>
                        <div class="L leftContent">
                            <h5>侯佩剑</h5>
                            <ul>
                                <li>北京中研世纪咨询有限公司&nbsp;创始人&nbsp;总裁</li>
                                <li>设计&nbsp;B&nbsp;TO&nbsp;B&nbsp;研究框架第一人</li>
                                <li>资深工业经济市场研究专家</li>
                                <li>资深&nbsp;B&nbsp;TO&nbsp;B&nbsp;领域市场研究培训专家</li>
                                <li>中国顶尖商业模式设计专家</li>
                                <li>企业战略规划落地实操专家</li>
                                <li>企业运营、品牌管理咨询专家</li>
                                <li>世界500强企业资深运营顾问</li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="presidentRight R">
                    <div class="presidentLeftTitle"><h5 class="L">零距离</h5><a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="R">更多&gt;&gt;</a></div>
                    <div class="clear"></div>
                    <div class="presidentRightRideo"><a href=""><img src="./images/index/video.png"></a></div>
                </div>
            </div>
    	</div>
    </div>
    <div class="clear"></div>
    <!-- 专业团队 -->
    <div class="team publicWidth">
    	<div class="inner">
            <div class="public_top"><h3>专业团队</h3></div>
            <p class="TitleP">精英团队为您提供专业的方案</p>
            <div class="team_inner_list">
            	<ul>
            		<li>
            		    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897"  class="onlineConsultant">在线咨询</a>
                        <a href=""  class="contactMe">给我留言</a>    
            		</li>
            		<li>
            		    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897"  class="onlineConsultant">在线咨询</a>
                        <a href=""  class="contactMe">给我留言</a> 
            		</li>
            		<li>
            		    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897"  class="onlineConsultant">在线咨询</a>
                        <a href=""  class="contactMe">给我留言</a> 
            		</li>
            		<li>
            		    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897"  class="onlineConsultant">在线咨询</a>
                        <a href=""  class="contactMe">给我留言</a> 
            		</li>
            		<li>
            		    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897"  class="onlineConsultant">在线咨询</a>
                        <a href=""  class="contactMe">给我留言</a> 
            		</li>
            		<li>
                        <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897"  class="onlineConsultant">在线咨询</a>
                        <a href=""  class="contactMe">给我留言</a> 
            		</li>
            	</ul>
            </div>
    	</div>
    </div>
    <!-- 调研大讲堂 -->
    <div class="classroom publicWidth">
        <div class="inner">
            <div class="public_top textLeft">
                 <h3>调研大讲堂</h3>
                 <a href="">更多&gt;&gt;</a>
            </div>
            <div class="clear"></div>
            <p class="TitleP">精英团队为您提供专业的方案</p>
            <div>
                <div class="classroomVideo L"><a href="">
                    <img src="./images/index/abc.png">
                    <p><span>01</span><i>工业市场调研工业市场调研工业市场调研</i>
                        <em>2018-05-25</em></p></a>
                </div>
                 <div class="classroomVideo L"><a href="">
                    <img src="./images/index/abc.png">
                    <p><span>02</span><i>工业市场调研工业市场调研工业市场调研</i>
                        <em>2018-05-25</em></p></a>
                </div>
                <div class="classroomList L">
                    <ul>
                        <li><a href=""><span>03</span><p><i>工业市场调研工业市场调研工业市场调研</i><em>2018-05-25</em></p><div class="clear"></div></a></li>
                        <li><a href=""><span>04</span><p><i>工业市场调研工业市场调研工业市场调研</i><em>2018-05-25</em></p><div class="clear"></div></a></li>
                        <li><a href=""><span>05</span><p><i>工业市场调研工业市场调研工业市场调研</i><em>2018-05-25</em></p><div class="clear"></div></a></li>
                        <li><a href=""><span>06</span><p><i>工业市场调研工业市场调研工业市场调研</i><em>2018-05-25</em></p><div class="clear"></div></a></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div> 
    </div>
    <!-- 成功案例 -->
    <div class="case publicWidth">
        <div class="inner">
            <div class="public_top textLeft">
                <h3>成功案例</h3>
                <a href="">更多&gt;&gt;</a>
            </div>
            <div class="clear"></div>
            <p class="TitleP">不忘初心&nbsp以诚为本</p>
            <div id="demo">
                <div id="indemo">
                    <div id="demo1">
                        <ul>
                            <li>
                                <div class="diaplayShow">
                                    <p><img src="./images/index/industrial.png"/></p>
                                    <div class="arrowHeight">
                                        <p class="arrow"></p>
                                        <p>工业研究</p>
                                    </div>
                                </div>
                                <div class="diaplayHide">
                                    <p class="IndustrialResearch">工业研究</p>
                                    <p class="IndustrialResearchText">三的卡萨啊；是鲁大师是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的的</p>
                                    <p class="ForDetails"><a href="">了解详情</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="diaplayShow">
                                    <p><img src="./images/index/business.png"/></p>
                                    <div class="arrowHeight">
                                        <p class="arrow"></p>
                                        <p>商业地产</p>
                                    </div>
                                </div>
                                <div class="diaplayHide">
                                    <p class="IndustrialResearch">工业研究</p>
                                    <p class="IndustrialResearchText">三的卡萨啊；是鲁大师是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的的</p>
                                    <p class="ForDetails"><a href="">了解详情</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="diaplayShow">
                                    <p><img src="./images/index/competitor.png"/></p>
                                    <div class="arrowHeight">
                                        <p class="arrow"></p>
                                        <p>竞争对手</p>
                                    </div>
                                </div>
                                <div class="diaplayHide">
                                    <p class="IndustrialResearch">工业研究</p>
                                    <p class="IndustrialResearchText">三的卡萨啊；是鲁大师是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的的</p>
                                    <p class="ForDetails"><a href="">了解详情</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="diaplayShow">
                                    <p><img src="./images/index/hospital2.png"/></p>
                                    <div class="arrowHeight">
                                        <p class="arrow"></p>
                                        <p>医疗·医药</p>
                                    </div>
                                </div>
                                <div class="diaplayHide">
                                    <p class="IndustrialResearch">工业研究</p>
                                    <p class="IndustrialResearchText">三的卡萨啊；是鲁大师是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的的</p>
                                    <p class="ForDetails"><a href="">了解详情</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="diaplayShow">
                                    <p class="diaplayShow"><img src="./images/index/marketing.png"/></p>
                                    <div class="arrowHeight">
                                        <p class="arrow"></p>
                                        <p>营销咨询</p>
                                    </div>
                                </div>
                                <div class="diaplayHide">
                                    <p class="IndustrialResearch">工业研究</p>
                                    <p class="IndustrialResearchText">三的卡萨啊；是鲁大师是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的是鲁大师的的</p>
                                    <p class="ForDetails"><a href="">了解详情</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="demo2"></div>
                </div>
            </div>
            <div class="case_inner_more"><a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">了解更多&nbsp&nbsp&gt&gt</a></div>
        </div>
    </div>
    <!-- 注册 -->
    <div class="register publicWidth">
    	<div class="register_inner">
    		<div class="register_inner_left">
    			<div class="register_inner_left_top">
    				<div class="advertisementL L"></div>
    				<div class="advertisementR L">
    					<h4>我是标题</h4>
    					<p class="advertisementR_conent">我是内容我是我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容</p>
    				</div>
    			</div>
    			<div class="register_inner_left_bottom">
    				<div class="advertisementL L"></div>
    				<div class="advertisementR L">
    					<h4>我是标题</h4>
    					<p class="advertisementR_conent">我是内容我是我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容我是内容</p>
    				</div>
    			</div>
    		</div>
    		<div class="register_inner_right">
    			<h3>开启专业调研通道</h3>
    			<form>
    				<label for="name"><em>*</em>您的姓名：</label><input type="text" id="name" placeholder="请输入您的姓名" /><br/>
    				<label for="tel"><em>*</em>您的电话：</label><input type="text" id="tel" placeholder="请输入您的电话"><br/>
    				<label for="city">所在城市：</label>
                    <select class="first">
    					<option>-省-</option>
    				</select>
    				<select class="second">
    					<option>-市区-</option>
    				</select><br/>
    				<label for="mold">调研类型：</label><input type="text" id="mold"/><br/>
    				<label for="need">调研需求：</label><input type="text" id="need"/><br/>
                    <p>本公司将严格遵守相关法律法规，绝不泄露用户信息</p>
    				<input type="submit" value="提交" class="btn"/>
    			</form>
    		</div>
    	</div>
    </div>
    <div class="clear"></div>
</div>
@include('Home.common.footer')
 <script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/index/index.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>






