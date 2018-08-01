@include('Home.common.head')
    <meta charset="UTF-8">
    <title>工业频道页</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/park/industry.css">
</head>
<body>
    @include('Home.common._meat')
<!-- 主体 -->
<div class="main">
    <!-- 轮播图 -->
<div class="slider">
  <ul class="slider-main">
    <li class="slider-panel"> <a><img src="/Home/images/park/industry.png"></a> </li>
    <li class="slider-panel"> <a><img src="/Home/images/park/industry.png"></a> </li>
    <li class="slider-panel"> <a><img src="/Home/images/park/industry.png"></a> </li>
  </ul>
  <div class="slider-extra">
    <ul class="slider-nav">
      <li class="slider-item"></li>
      <li class="slider-item"></li>
      <li class="slider-item"></li>
    </ul>
    <div class="slider-page"> <a class="slider-pre" href="javascript:;;"> &lt;</a> <a class="slider-next" href="javascript:;;">&gt;</a> </div>
  </div>
</div>
<!-- 中研实力+行业动态 -->
<div class="industryBgProblem">
    <div class="industryBgProblem_inner">
        <div class="industryBgProblem_left L">
            <h4>中研实力</h4>
            <div class="content">
                <p>工业品市场细分领域众多，因此研发、制造、销售工业品企业也应运而生，在大的宏观经济条件下，中国工业市场发展趋势稳步提升。然而面临新的市场环境，企业竞争烈度不断加大，市场环境变化加快，企业成长期缩短，需要企业做好市场战略工作，以迎接新的市场机遇和市场挑战。
                </p>
                <p>北京中研世纪咨询有限公司（简称CMRC中研世纪）。CMRC中研世纪前身是1992年国家统计局批准成立的，1992-2003年为国家各部委和主管单位提供中国工业制造业产业研究服务，积累了丰富经验。2003年正式成立北京中研世纪咨询有限公司，正式以公司身份面向社会提供市场研究、咨询服务。是目前中国市场唯一一家提供与工业应用技术和生产流程技术有关的市场研究专业机构。在水处理、新能源、新能源汽车、新技术材料、配电设备、工控设备、建筑产品、矿山设备、轨道交通、等领域皆具有突出的研究经验。</p>
            </div>
        </div>
        <div class="industryBgProblem_right R">
            <h4>行业动态</h4>
            <p><a href="">更多&gt;&gt;</a></p>
            <ul>
             @foreach($first as $first)
                    <li class="listFirst"><a href="{{url('/zx_details')}}?id={{$first->z_id}}" target="_blank"><img src="{{$first->img_path}}" style="width:470px;height:158px"><span>{{$first->title}}</span></a></li>
                @endforeach
                
                @foreach($dongtai as $dongtai)
                    <li><a href="{{url('/zx_details')}}?id={{$dongtai->id}}" target="_blank">{{$dongtai->title}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- 工业体系 -->
<div class="industrialSystem">
    <h3>工业体系</h3>
    <ul>
        <li class="industrialSystem_first noMarginLeft">
            <p class="title"><em>能源</em></p>
            <span><a href="{{url('/park_column')}}?pid=9" target="_blank"><img src="/Home/images/park/consulting.png"/>项目详情</a></span>
            <span><a href=""><img src="/Home/images/park/assess.png"/>需求评估</a></span>
        </li>
        <li class="industrialSystem_second">
            <p class="title"><em>环保</em></p>
            <span><a href="{{url('/park_column')}}?pid=23" target="_blank"><img src="/Home/images/park/consulting.png"/>项目详情</a></span>
            <span><a href=""><img src="/Home/images/park/assess.png"/>需求评估</a></span>
        </li>
        <li class="industrialSystem_third">
            <p class="title"><em>汽车</em></p>
            <span><a href="{{url('/park_column')}}?pid=24" target="_blank"><img src="/Home/images/park/consulting.png"/>项目详情</a></span>
            <span><a href=""><img src="/Home/images/park/assess.png"/>需求评估</a></span>
        </li>
        <li class="industrialSystem_fourth">
            <p class="title"><em>机械设备</em></p>
            <span><a href="{{url('/park_column')}}?pid=10" target="_blank"><img src="/Home/images/park/consulting.png"/>项目详情</a></span>
            <span><a href=""><img src="/Home/images/park/assess.png"/>需求评估</a></span>
        </li>
        <li class="industrialSystem_fifth noMarginLeft marginBottom">
            <p class="title"><em>建筑</em></p>
            <span><a href="{{url('/park_column')}}?pid=" target="_blank"><img src="/Home/images/park/consulting.png"/>项目详情</a></span>
            <span><a href=""><img src="/Home/images/park/assess.png"/>需求评估</a></span>
        </li>
        <li class="industrialSystem_sixth marginBottom">
            <p class="title"><em>新材料</em></p>
            <span><a href="" target="_blank"><img src="/Home/images/park/consulting.png">项目详情</a></span>
            <span><a href=""><img src="/Home/images/park/assess.png">需求评估</a></span>
        </li>
        <li class="industrialSystem_seventh marginBottom">
            <p class="title"><em>轨道交通</em></p>
            <span><a href="" target="_blank"><img src="/Home/images/park/consulting.png"/>项目详情</a></span>
            <span><a href=""><img src="/Home/images/park/assess.png"/>需求评估</a></span>
        </li>
        <li class="industrialSystem_eighth marginBottom">
            <p class="title six"><em>高端消费制造</em></p>
            <span><a href="{{url('/park_column')}}?pid=44" target="_blank"><img src="/Home/images/park/consulting.png"/>项目详情</a></span>
            <span><a href=""><img src="/Home/images/park/assess.png"/>需求评估</a></span>
        </li>
    </ul>
</div>
<!-- 为什么选择我们 -->
<div class="why">
    <div class="why_inner">
        <h3>为什么选择我们</h3>
        <ul>
            <li>
                <div class="why_details_title">
                    <a href="">
                    <em>26年</em><br/>
                    <i>品牌积淀</i></a>
                </div>
                <div class="why_details_explain">
                    <p>中国唯一一家提供<em>工业应用</em>和生产流程<em>技术调研</em>的市场研究 <em>专业机构</em>。</p>
                </div>
            </li>
            <li>
                <div class="why_details_title">
                    <a href=""><em>600个</em><br/>
                    <i>数据保障</i></a>
                </div>
                <div class="why_details_explain">
                    <p>雄厚企业资源支撑、<em>政府背景</em>、行业及<em>行业专家</em>保持良好的合作关系、实时更新的<em>企业数据库</em>、严格的之心过程、信息的多方验证，全程督导，<em>确保数据的真实可靠！</em>
                    </p>
                </div>
            </li>
            <li>
                <div class="why_details_title">
                    <a href=""><em>1000+</em><br/>
                    <i>成功案例</i></a>
                </div>
                <div class="why_details_explain">
                    <p><em>1000+</em>竞争调研案例经验，行业涵盖工业、房产、医药医疗等，<em>服务世界五百强企业</em>，高质量的调研结果，获得企业一致好评！</p>
                </div>
            </li>
            <li>
                <div class="why_details_title">
                    <a href=""><em>100名</em><br/>
                    <i>实力团队</i></a>
                </div>
                <div class="why_details_explain">
                    <p><em>100</em>名行业研究专家，<em>60</em>名硕士以上学历研究人员实力团队，世界<em>500强</em>企业资深顾问专家支持，高效执行力，<em>多对一</em>的服务体制，满足客户调研需求！
                    </p>
                </div>
            </li>
            <li>
                <div class="why_details_title">
                    <a href=""><em>需求服务</em><br/>
                    <i>品牌积淀</i></a>
                </div>
                <div class="why_details_explain">
                    <p>中研世纪专业从事调研<em>26年</em>，是目前中国市场唯一一家提供与<em>工业应用技术</em>和<em>生产流程技术</em>有关的市场研究专业机构。并在房产、医院医疗等行业调研领域处于领先优势！
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- 产品服务 -->
<div class="service">
    <div class="service_inner">
        <h3>产品服务</h3>

        <div class="service_inner_list">
            <ul>
                <li class="noMarginL">
                    <a href="{{url('/eight#page2')}}">
                        <img src="/Home/images/park/com.png"/>
                        <div>
                            <span>竞争企业调研</span>
                            <p class="empty"></p>
                            <p class="text">通过竞争对手调研能让企业快速跨越经验积累，直接进入市场。</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/eight#page3')}}">
                        <img src="/Home/images/park/industryBg.png">
                        <div>
                            <span>行业调研</span>
                            <p class="empty"></p>
                            <p class="text">全面研究行业市场以及重点企业的发展现状，以供决策参考。</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/eight#page4')}}">
                        <img src="/Home/images/park/channelBg.png"/>
                        <div>
                            <span>渠道调研</span>
                            <p class="empty"></p>
                            <p class="text">渠道调研可以帮助客户选择最合理的渠道资源，快速启动市场。</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/eight#page5')}}">
                        <img src="/Home/images/park/satisfiedBg.png"/>
                        <div>
                            <span>满意度研究</span>
                            <p class="empty"></p>
                            <p class="text">满意度是决策人最快时间检查公司全面职能工作最快效率的方法。</p>
                        </div>
                    </a>
                </li>
                <li class="noMarginL">
                    <a href="{{url('/eight#page6')}}">
                        <img src="/Home/images/park/marketingBg.png"/>
                        <div>
                            <span>营销咨询</span>
                            <p class="empty"></p>
                            <p class="text">营销咨询是企业职业化专业化管理的战略思维，长期制胜之道。
</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/eight#page7')}}">
                        <img src="/Home/images/park/marketBg.png"/>
                        <div>
                            <span>市场战略咨询</span>
                            <p class="empty"></p>
                            <p class="text">当下市场环境中，助力规模企业避免市场风险，实现市场战略突破。</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/eight#page8')}}">
                        <img src="/Home/images/park/consultingBg.png"/>
                        <div>
                            <span>客户研究</span>
                            <p class="empty"></p>
                            <p class="text">客户研究帮助企业精准定位目标客户群体，把握客户群体市场需求。</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/eight#page9')}}">
                        <img src="/Home/images/park/businessBg.png"/>
                        <div>
                            <span>商业模式设计</span>
                            <p class="empty"></p>
                            <p class="text">打造核心竞争力，优化企业内部的资源配置，明确企业盈利模式。</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="clear"></div>
<!-- 经典案例 -->
<div class="classicCase">
    <div class="classicCase_inner">
        <h3>经典案例 <a href="">更多&gt;&gt;</a></h3>
        <ul>
            @foreach($case as $case)
                <a href="{{url('/case_xiang')}}?id={{$case->id}}">
                    <li>
                        <span></span><img src="{{$case->img_path}}"/>
                        <p>{{$case->case_name}}</p>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
</div>
<div class="clear"></div>
<!-- 中研流程图 -->
<div class="flowChart">
    <div class="flowChart_inner">
        <h3>中研流程图</h3>

        <div class="flowChart_inner_border">
            <div class="flowChart_inner_left"><img src="/Home/images/park/flowLeft.png"></div>
            <div class="flowChart_inner_right">
                <div class="flowContent">
                    <span class="leftArrow"><img src="/Home/images/park/right.png"></span>
                    <span class="rightArrow"><img src="/Home/images/park/right.png"></span>
                    <div class="demandList">
                        <div class="demandLine">
                            <ul>
                                <li class="listOne">
                                    <em class="TopLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandTopPoin sixWords">项目需求输入</div>
                                </li>
                                <li class="listTwo">
                                    <em class="BomLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandBomPoin marginLeft20 tenWords">项目建议书撰写和修改</div>
                                </li>
                                <li class="listThire">
                                    <em class="TopLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandTopPoin sixWords">项目立项沟通</div>
                                </li>
                                <li class="listFour">
                                    <em class="BomLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandBomPoin demontLeft20 fourWords">项目启动</div>
                                </li>
                                <li class="listFive">
                                    <em class="TopLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandTopPoin marginLeftTheer fourWords">项目准备</div>
                                </li>
                                <li class="listSix">
                                   <em class="BomLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandBomPoin demontLeft20 fourWords">访问执行</div>
                                </li>
                                 <li class="listSeven listNone">
                                    <em class="TopLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandTopPoin fourWords">阶段讨论</div>
                                </li>
                                <li class="listEight listNone">
                                    <em class="BomLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandBomPoin marginLeft20 fourWords">报告撰写</div>
                                </li>
                                <li class="listNine listNone">
                                    <em class="TopLine"><img src="/Home/images/park/connect.png"></em>
                                    <div class="demandTopPoin fourWords">成果汇报</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="demandContent">
                        <ul>
                            <li class="first">
                                客户提出项目需求或项目需要解决的问题。
                            </li>
                            <li>
                                根据客户实际情况及需要解决的问题，制作讲解项目建议书。
                            </li>
                            <li>
                                双方签订保密协议和服务合同，召开项目启动会议，双方对于解决方案进行讨论，确保解决方案的针对性、可实施性并转化成客户内部版本并实施。
                            </li>
                            <li>
                                组建项目团队、召开项目启动会，项目经理及研究总监对项目进行讲解，确定研究重点。
                            </li>
                            <li>
                                制定项目执行时间表、案头研究、撰写访问提纲、确认访问路径。
                            </li>
                            <li>
                                访问员培训、深访展开、整理访问记录，及时修正研究深度和方向。每周2次研究讨论会，将研究内容进一步细化和结构化；每周提交周小结，汇总研究成果和问题。
                            </li>
                            <li>
                                每周2次研究讨论会，将研究内容进一步细化和结构化；每周提交周小结，汇总研究成果和问题。
                            </li>
                            <li>
                                撰写报告提纲、汇总访问记录、进行报告撰写、内部报告验收。
                            </li>
                            <li>
                                为委托方进行报告讲解。
                            </li>
                        </ul>
                    </div></div>
                <div class="bottom">
                    <span class="lasts"><a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897">了解更多&gt&gt</a></span>
                    <span class="last"><a href="">参考报价&gt&gt</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/park/industry.js"></script>
<script src="/Home/js/footer.js"></script> 
</body>
</html>