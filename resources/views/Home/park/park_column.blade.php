@include('Home.common.head')
    <meta charset="UTF-8">
    <title>汽车栏目页</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/park/car.css">
</head>
<body>
@include('Home.common._meat')
<div class="main">
	<!-- banner	 -->
	<div class="banner">
		<img src="/Home/images/park/park_column/banner.png">
	</div>
    <!-- 中研栏目 -->
    <div class="column">
    	<div class="inner">
    		<h3><img src="/Home/images/park/park_column/column.png"></h3>
    		<ul>
                @foreach($data as $data)
                    <li class="noMarginLeft">
                        <div>
                            <em>{{$data['name']}}</em>
                            <h4>{{$data['type_name']}}</h4>
                            <p>中研优势&nbsp;:定制+高效+专业</p>
                            <p>调研周期&nbsp;:6-10工作周</p>
                            <span class="marginRight">需求评估</span>
                            <span>在线咨询</span>
                        </div>
                        <div class="pre-click">
                            <a href="" class="details">项目详情</a><br/>
                            <a href="{{url('/online/need')}}" class="marginRight">需求评估</a>
                            <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">在线咨询</a>
                        </div>
                    </li>
    			@endforeach
    		</ul>
    	</div>
    </div>
    <!-- 中研保障 -->
    <div class="guarantee">
    	<div class="inner">
    		<div class="guaranteeLeft L">
    			<ul>
    				<li>
    					<div class="empty L"></div>
    					<div class="content R">
    						<h4>中研优势</h4>
    						<p>雄厚企业资源支撑、政府背景、行业及行业专家保持良好的合作关系、实时更新的企业数据率、严格的之心过程、信息的多方验证，全称督导，确保数据的真实可靠！</p>
    					</div>
    					<div class="clear"></div>
    				</li>
    				<li>
    					<div class="empty L"></div>
    					<div class="content R">
    						<h4>中研实力</h4>
    						<p>100名行业研究专家，60名硕士以上学历研究人员实力团队，世界500强企业资深顾问专家支持，高效执行力，多对一的服务体制，满足客户调研需求！</p>
    					</div>
    					<div class="clear"></div>
    				</li>
    				<li>
    					<div class="empty L"></div>
    					<div class="content R">
    						<h4>行业经验</h4>
    						<p>中研世纪专业从事调研26年，是目前中国市场唯一一家提供与工业应用技术和生产流程技术有关的市场研究专业机构，并在房产、医药医疗等行业调研领域处于领先优势！</p>
    					</div>
    					<div class="clear"></div>
    				</li>
    			</ul>
    		</div>
    		<div class="guaranteeRight R">
    			<h4>快速注册通道</h4>
    			<form>
    				<input type="text" name="" placeholder="请填写您的姓名">
    				<input type="text" name="" placeholder="请填写您的电话">
    				<p>抢占先机，马上连线行业研究专家！</p>
    				<input type="submit" name="" class="btn" value="提交">
    			</form>
    		</div>
    	</div>
    	<div class="clear"></div>
    </div>
    <!-- 服务体系 -->
    <div class="service">
		<div class="inner">
			<h3><img src="/Home/images/park/park_column/system.png"></h3>
	        <div class="service_inner_list">
	        	<ul>
	        		<li> 
	        		    <a href="#">
	        		        <img src="/Home/images/park/park_column/com.png">
	        			    <span>竞争企业调研</span>
	        			    <p>竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研竞争企业调研</p>
	        		    </a>
	        		</li>
	        		<li> 
	        		    <a href="#">
	        		        <img src="/Home/images/park/park_column/industryBg.png">
	        			    <span>行业调研</span>
	        			    <p>行业调研行业调研行业调研行业调研行业调研行业调研行业调研行业调研行业调研</p>
	        		    </a>
	        		</li>
	        		<li> 
	        		    <a href="#">
	        		        <img src="/Home/images/park/park_column/channelBg.png">
	        			    <span>渠道调研</span>
	        			    <p>渠道调研渠道调研渠道调研渠道调研渠道调研渠道调研渠道调研渠道调研渠道调研</p>
	        		    </a>
	        		</li>
	        		<li class="noMarginRight"> 
	        		    <a href="#">
	        		        <img src="/Home/images/park/park_column/satisfiedBg.png">
	        			    <span>满意度调研</span>
	        			    <p>满意度调研满意度调研满意度调研满意度调研满意度调研满意度调研满意度调研</p>
	        		    </a>
	        		</li>
	        		<li> 
	        		    <a href="#">
	        		        <img src="/Home/images/park/park_column/marketingBg.png">
	        			    <span>营销咨询</span>
	        			    <p>营销咨询营销咨询营销咨询营销咨询营销咨询营销咨询营销咨询营销咨询营销咨询</p>
	        		    </a>
	        		</li>
	        		<li> 
	        		    <a href="#">
	        		        <img src="/Home/images/park/park_column/marketBg.png">
	        			    <span>市场战略规则</span>
	        			    <p>市场战略规则市场战略规则市场战略规则市场战略规则市场战略规则市场战略规则</p>
	        		    </a>
	        		</li>
	        		<li> 
	        		    <a href="#">
	        		        <img src="/Home/images/park/park_column/consultingBg.png">
	        			    <span>业务咨询</span>
	        			    <p>业务咨询业务咨询业务咨询业务咨询业务咨询业务咨询业务咨询业务咨询业务咨询</p>
	        		    </a>
	        		</li>
	        		<li class="noMarginRight"> 
	        		    <a href="#">
	        		        <img src="/Home/images/park/park_column/businessBg.png">
	        			    <span>商业模式设计</span>
	        			    <p>商业模式设计商业模式设计商业模式设计商业模式设计商业模式设计商业模式设计</p>
	        		    </a>
	        		</li>
	        	</ul>
	        </div>
	    </div>
    </div>
    <!-- 专业团队 -->
    <div class="team">
		<div class="inner">
			<h3><img src="/Home/images/park/park_column/team.png"></h3>
	        <div class="team_inner_list">
	        	<ul>
	        		<li>
        		        <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="onlineConsultant">
        		        	<img src="/Home/images/park/park_column/online.png">在线咨询</a>
        		        <a href="" class="contactMe"><img src="/Home/images/park/park_column/messages.png">给我留言</a>
	        		</li>
	        		<li>
        		        <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="onlineConsultant">
        		        	<img src="/Home/images/park/park_column/online.png">在线咨询</a>
        		        <a href="" class="contactMe"><img src="/Home/images/park/park_column/messages.png">给我留言</a>
	        		</li>
	        		<li>
        		        <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="onlineConsultant">
        		        	<img src="/Home/images/park/park_column/online.png">在线咨询</a>
        		        <a href="" class="contactMe"><img src="/Home/images/park/park_column/messages.png">给我留言</a>
	        		</li>
	        		<li>
        		        <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="onlineConsultant">
        		        	<img src="/Home/images/park/park_column/online.png">在线咨询</a>
        		        <a href="" class="contactMe"><img src="/Home/images/park/park_column/messages.png">给我留言</a>
	        		    </a>
	        		</li>
	        		<li>
        		        <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="onlineConsultant">
        		        	<img src="/Home/images/park/park_column/online.png">在线咨询</a>
        		        <a href="" class="contactMe"><img src="/Home/images/park/park_column/messages.png">给我留言</a>
	        		</li>
	        		<li>
        		        <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="onlineConsultant">
        		        	<img src="/Home/images/park/park_column/online.png">在线咨询</a>
        		        <a href="" class="contactMe"><img src="/Home/images/park/park_column/messages.png">给我留言</a>
	        		</li>
	        	</ul>
	        </div>
		</div>
    </div>
    <!-- 成功案例 -->
	<div class="case">
	    <div class="inner">
	        <h3><img src="/Home/images/park/park_column/case.png"></h3>
	        <div id="demo">
	            <div id="indemo">
	                <div id="demo1">
	                    <ul>
							@foreach($case as $case)
								<li>
									<div class="diaplayShow">
										<p><img src="{{$case->img_path}}"/></p>
										<div class="arrowHeight">
											<p class="arrow"></p>
											<p>{{$case->case_name}}</p>
										</div>
									</div>
									<div class="diaplayHide">
										<p class="IndustrialResearch">{{$case->case_name}}</p>
										<p class="IndustrialResearchText">{{$case->case_miaoshu}}</p>
										<p class="ForDetails"><a href="">了解详情</a></p>
									</div>
								</li>
	                        @endforeach
	                    </ul>
	                </div>
	                <div id="demo2"></div>
	            </div>
	        </div>
	        <div class="case_inner_more"><a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">了解更多&nbsp&nbsp&gt&gt</a></div>
	    </div>
	</div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/park/car.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>