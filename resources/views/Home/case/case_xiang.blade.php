@include('Home.common.head')
    <meta charset="UTF-8">
    <title>文章详情页</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/zx_details/ArticleDetailsPage.css">
</head>
<body>
@include('Home.common._meat')
<!-- 主体 -->
<div class="main">
	<div class="mainInner">
		<div class="breadcrumb">
			<a href="" class="currentPosition">当前位置</a>
			<a href="index.html" class="index">资讯详情页</a>
		</div>
		<div class="sarticle">
			<div class="sarticleLeft L">
				<div class="sarticleLeftInner">
					<!-- 文章详情 -->
					<div class="detailPage">
						<h3>{{$data->case_name}}</h3>
						<p>
							<span>作者:{{$data->case_driver}}</span>
							<span>浏览量：{{$data->case_num}}</span>
							<span class="noMargin">发表时间：{{date('Y-m-d',$data->created_at)}}</span>
						</p>
						<div>
							 {!! html_entity_decode($data->editorValue) !!}
						</div>
		            </div>
		            <!-- 阅读推荐 -->
		            <div class="recommend">
		            	<div class="recommendInner">
			            	<h4>阅读推荐</h4>
			            	<div class="recommendContent">
                            @foreach($tuijian as $tuijian)
			            		<div class="L">
			            			<ul>
			            				<li>
			            					<em></em><a href="{{url('/case_xiang')}}?id={{$tuijian->id}}">{{$tuijian->case_name}}</a>
			            				</li>
			            			</ul>
			            		</div>
			            	@endforeach
			            		
			            		<div class="clear"></div>
			            	</div>
		            	</div>
		            </div>
		            <!-- 调研流程 -->
		            <div class="flow">
		            	<div class="flowImg">
		            	    <img src="/Home/images/zx_details/flow.png">
		            	</div>
		                <div class="flowContent">
		                	<span class="leftArrow"><img src="/Home/images/zx_details/right.png"></span>
		                	<span class="rightArrow"><img src="/Home/images/zx_details/right.png"></span>
		                	<div class="demandList">
		                        <div class="demandLine">
		                            <ul>
		                                <li class="listOne">
		                                    <em class="TopLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandTopPoin sixWords">项目需求输入</div>
		                                </li>
		                                <li class="listTwo">
		                                    <em class="BomLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandBomPoin marginLeft20 tenWords">项目建议书撰写和修改</div>
		                                </li>
		                                <li class="listThire">
		                                    <em class="TopLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandTopPoin sixWords">项目立项沟通</div>
		                                </li>
		                                <li class="listFour">
		                                    <em class="BomLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandBomPoin demontLeft20 fourWords">项目启动</div>
		                                </li>
		                                <li class="listFive">
		                                    <em class="TopLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandTopPoin marginLeftTheer fourWords">项目准备</div>
		                                </li>
		                                <li class="listSix">
		                                   <em class="BomLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandBomPoin demontLeft20 fourWords">访问执行</div>
		                                </li>
		                                 <li class="listSeven listNone">
		                                    <em class="TopLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandTopPoin fourWords">阶段讨论</div>
		                                </li>
		                                <li class="listEight listNone">
		                                    <em class="BomLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandBomPoin marginLeft20 fourWords">报告撰写</div>
		                                </li>
		                                <li class="listNine listNone">
		                                    <em class="TopLine"><img src="/Home/images/zx_details/connect.png"></em>
		                                    <div class="demandTopPoin fourWords">成果汇报</div>
		                                </li>
		                            </ul>
		                        </div>
		                	</div>
		                	<div class="demandContent">
		                        <ul>
		                            <li class="first">
		                                
		                                    项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入
		                                    
		                            </li>
		                            <li>
		                                项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目需求输入项目需求输入
		                            
		                            </li>
		                            <li>
		                                项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修项目需求输入
		                            
		                            </li>
		                            <li>
		                                项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改
		                            
		                            </li>
		                            <li>
		                                项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目需求输入项目需求输入项目需求输入
		                            
		                            </li>
		                            <li>
		                                项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改
		                            
		                            </li>
		                              <li>
		                                项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目项目需求输入
		                            
		                            </li>
		                            <li>
		                                项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改项目建议书撰写和修改
		                            
		                            </li>
		                              <li>
		                                
		                                    项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入项目需求输入
		                                
		                            </li>
		                        </ul>
		                    </div>
		                    <div class="bottom">
			                    <span class="lasts"><a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">了解更多&gt&gt</a></span>
			                    <span class="last"><a href="">参考报价&gt&gt</a></span>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
			<div class="mainInnerRight R">
				<div class="mainInnerRightType">
					<h3>开启专业调研通道</h3>
					<form>
						<div><em><img src="/Home/images/zx_details/name.png"></em><input type="text" name="" placeholder="您的姓名"></div>
						<div><em><img src="/Home/images/zx_details/tel.png"></em><input type="text" name="" placeholder="您的电话"></div>
						<select class="province">
							<option>-&nbsp;省&nbsp;-</option>
						</select>
						<select class="downtown">
							<option>-&nbsp;市区&nbsp;-</option>
						</select>
						<textarea class="genre" placeholder="调研类型"></textarea>
						<textarea class="need"  placeholder="调研需求"></textarea>
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
				<!-- 客观评价 -->
				<div class="evaluate">
                    <h3>客观评价</h3>
					<img src="/Home/images/zx_details/evaluate.png">
					<a href="">查看更多&gt&gt</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
    </div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/zx_details/ArticleDetailsPage.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>