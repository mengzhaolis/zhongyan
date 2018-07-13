@include('Home.common.head')
    <meta charset="UTF-8">
    <title>计算器</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/public/publicChannelPage.css">
</head>
<body>
@include('Home.common._meat')
<!-- 主体 -->
<div class="main">
     <!-- 轮播图 -->
    <div class="slider">
      <ul class="slider-main">
            <li class="slider-panel"> <a><img src="/Home/images/public/banner.png"></a> </li>
            <li class="slider-panel"> <a><img src="/Home/images/public/banner.png"></a> </li>
            <li class="slider-panel"> <a><img src="/Home/images/public/banner.png"></a> </li>
            <li class="slider-panel"> <a><img src="/Home/images/public/banner.png"></a> </li>
            <li class="slider-panel"> <a><img src="/Home/images/public/banner.png"></a> </li>
      </ul>
      <div class="slider-extra">
         <ul class="slider-nav">
          <li class="slider-item"></li>
          <li class="slider-item"></li>
          <li class="slider-item"></li>
          <li class="slider-item"></li>
          <li class="slider-item"></li>
        </ul>
        <div class="slider-page"> <a class="slider-pre" href="javascript:;;"> &lt;</a> <a class="slider-next" href="javascript:;;">&gt;</a> </div>
      </div>
    </div> 
    <!-- 行业背景以及面临问题 -->
    <div class="industryBgProblem">
        <div class="industryBgProblem_inner inner">
            <h3>行业背景以及面临问题</h3>
            <div class="industryBgProblem_left L">
                <h4><span>中研实力</span></h4>
                <p>
                    中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力中研实力
                </p>
            </div>
            <div class="industryBgProblem_right R">
                <h4><span>行业动态</span><a href="">更多&gt;&gt;</a></h4>               
                <ul>
                    <li class="listFirst"><a href=""><img src="/Home/images/public/trendsBackground.png"><span>热门专题热门专题热门专题热门专题热门专题热门专题热门专题热门专题热门专题热门专题热门专题热门专题</span></a></li>
                    @foreach($message as $message)
                        <li><a href="{{url('/zx_details')}}?id={{$message->id}}">{{$message->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!-- 中研栏目 -->
   <div class="column">
        <div class="inner">
            <h3>中研栏目</h3>
            <ul>
                @foreach($type as $type)
                    <li class="noMarginLeft">
                        <div>                            
                            <em>{{$type->type_name}}</em>
                            <h4>{{$type->type_name}}</h4>
                            <p>中研优势&nbsp;:</p>
                            <p>调研周期&nbsp;:</p>
                            <a href="">查看详情</a>                            
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
    </div>
     <!-- 为什么选择我们 -->
    <div class="guarantee">
        <div class="inner">
            <h3>为什么选择我们</h3>
            <div class="guarantee_inner"> 
                <div class="guaranteeRight L">
                    <h4>快速注册通道</h4>
                    <img src="/Home/images/public/kite.png" class="kite">
                    <form>
                        <label for="name"><em>*</em>您的姓名：</label><input type="text" id="name" placeholder="请填写您的姓名"/><br/>
                        <label for="tel"><em>*</em>您的电话：</label><input type="text" id="tel" placeholder="请填写您的电话"/><br/>
                        <label for="city">&nbsp;所在城市：</label>
                        <select class="first city">
                            <option>-省-</option>
                            @foreach($province as $province)
                                <option value="{{$province->id}}">{{$province->province_name}}</option>
                            @endforeach
                        </select>
                        <select class="second">
                            <option>-市区-</option>
                        </select>
                        <p>本公司将严格遵守相关法律法规，绝不泄露用户信息</p>
                        <input type="submit" value="提交" class="btn"/>
                    </form>
                </div>
                 <div class="guaranteeLeft R">
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
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!-- 优势服务 -->
    <div class="advantage">
        <div class="inner">
            <h3>优势服务</h3>
            <ul>
                <li>
                    <a href="">
                        <div class="downmost"></div>
                        <div class="middle"></div>
                        <div class="topside">
                            <img src="/Home/images/public/vs.png">
                            <p>竞争企业调研</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="downmost"></div>
                        <div class="middle"></div>
                        <div class="topside">
                            <img src="/Home/images/public/industryBg.png">
                            <p>行业调研</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="downmost"></div>
                        <div class="middle"></div>
                        <div class="topside">
                            <img src="/Home/images/public/channelBg.png">
                            <p>渠道调研</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="downmost"></div>
                        <div class="middle"></div>
                        <div class="topside">
                            <img src="/Home/images/public/satisfiedBg.png">
                            <p>满意度调研</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="downmost"></div>
                        <div class="middle"></div>
                        <div class="topside">
                            <img src="/Home/images/public/marketingBg.png">
                            <p>营销咨询</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="downmost"></div>
                        <div class="middle"></div>
                        <div class="topside">
                            <img src="/Home/images/public/marketBg.png">
                            <p>市场战略规划</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="downmost"></div>
                        <div class="middle"></div>
                        <div class="topside">
                            <img src="/Home/images/public/consultingBg.png">
                            <p>业务咨询</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="downmost"></div>
                        <div class="middle"></div>
                        <div class="topside">
                            <img src="/Home/images/public/businessBg.png">
                            <p>商业模式设计</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- 专业团队 -->
    <div class="team">
        <div class="inner">
            <h3>专业团队</h3>
            <ul>
                <li class="video"><img src="/Home/images/public/presidentvideo.png"></li>
                <li>
                    <img src="/Home/images/public/president.png">
                    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="consult">在线咨询</a>
                    <a href="" class="message">给我留言</a>
                </li>
                <li>
                    <img src="/Home/images/public/president.png">
                    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="consult">在线咨询</a>
                    <a href="" class="message">给我留言</a>
                </li>
                <li>
                    <img src="/Home/images/public/president.png">
                    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="consult">在线咨询</a>
                    <a href="" class="message">给我留言</a>
                </li>
                <li>
                    <img src="/Home/images/public/president.png">
                    <a href="http://p.qiao.baidu.com/cps/chat?siteId=4348149&userId=7029897" class="consult">在线咨询</a>
                    <a href="" class="message">给我留言</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- 成功案例 -->
    <div class="case publicWidth">
        <div class="inner">
            <div class="public_top textLeft">
                <h3>成功案例
                <a href="">更多&gt;&gt;</a></h3>
            </div>
            <div class="clear"></div>
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
        </div>
    </div>
    <!-- 中研流程图 -->
    <div class="flowChart">
    <div class="inner">
        <h3>中研流程图</h3>

        <div class="flowChart_inner_border">
            <div class="flowChart_inner_left"><img src="/Home/images/public/flowLeft.png"></div>
            <div class="flowChart_inner_right">
                <div class="flowContent">
                    <span class="leftArrow"><img src="/Home/images/public/right.png"></span>
                    <span class="rightArrow"><img src="/Home/images/public/right.png"></span>
                    <div class="demandList">
                        <div class="demandLine">
                            <ul>
                                <li class="listOne">
                                    <em class="TopLine"><img src="/Home/images/public/connect.png"></em>
                                    <div class="demandTopPoin sixWords">项目需求输入</div>
                                </li>
                                <li class="listTwo">
                                    <em class="BomLine"><img src="/Home/images/public/connect.png"></em>
                                    <div class="demandBomPoin marginLeft20 tenWords">项目建议书撰写和修改</div>
                                </li>
                                <li class="listThire">
                                    <em class="TopLine"><img src="/Home/images/public/connect.png"></em>
                                    <div class="demandTopPoin sixWords">项目立项沟通</div>
                                </li>
                                <li class="listFour">
                                    <em class="BomLine"><img src="/Home/images/public/connect.png"></em>
                                    <div class="demandBomPoin demontLeft20 fourWords">项目启动</div>
                                </li>
                                <li class="listFive">
                                    <em class="TopLine"><img src="/Home/images/public/connect.png"></em>
                                    <div class="demandTopPoin marginLeftTheer fourWords">项目准备</div>
                                </li>
                                <li class="listSix">
                                   <em class="BomLine"><img src="/Home/images/public/connect.png"></em>
                                    <div class="demandBomPoin demontLeft20 fourWords">访问执行</div>
                                </li>
                                 <li class="listSeven listNone">
                                    <em class="TopLine"><img src="/Home/images/public/connect.png"></em>
                                    <div class="demandTopPoin fourWords">阶段讨论</div>
                                </li>
                                <li class="listEight listNone">
                                    <em class="BomLine"><img src="/Home/images/public/connect.png"></em>
                                    <div class="demandBomPoin marginLeft20 fourWords">报告撰写</div>
                                </li>
                                <li class="listNine listNone">
                                    <em class="TopLine"><img src="/Home/images/public/connect.png"></em>
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
<script src="/Home/js/public/publicChannelPage.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>