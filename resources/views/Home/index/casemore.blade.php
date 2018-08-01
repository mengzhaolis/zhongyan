@include('Home.common.head') 
    <title>中研世纪经典案例</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/index/casemore/case.css">
</head>
<body>
@include('Home.common._meat')
<div class="main">        
    <div class="inner">
        <h3>中研世纪经典案例</h3>
      <!-- 中研世纪经典案例头部 -->
        <form>
            <div class="caseTitle">
                <div class="fiveCase">
                    <h4>五大案例：</h4>
                    <div class="caseContent">
                        <h5 class="L">工业研究</h5>
                        <div class="neirong">
                        @foreach($gong as $gong)        
                            <p class="L">
                                <em>
                                    <input type="hidden" class="id" value="{{$gong->id}}">
                                    {{$gong->type_name}}
                                </em>
                            </p>
                        @endforeach    
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="caseContent">
                        <h5 class="L">商业地产研究</h5>
                        <div class="neirong">
                        @foreach($shang as $shang)        
                            <p class="L">
                                <em>
                                    <input type="hidden" class="id" value="{{$shang->id}}">
                                    {{$shang->type_name}}
                                </em>
                            </p>
                        @endforeach    
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="caseContent">
                            <h5 class="L">医药医疗研究</h5>
                            <div class="neirong">
                            @foreach($yi as $yi)        
                                <p class="L">
                                    <em>
                                        <input type="hidden" class="id" value="{{$yi->id}}">
                                        {{$yi->type_name}}
                                    </em>
                                </p>
                            @endforeach    
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="caseContent">
                            <h5 class="L">营销咨询研究</h5>
                            <div class="neirong">
                            @foreach($ying as $ying)        
                                <p class="L">
                                    <em>
                                        <input type="hidden" class="id" value="{{$ying->id}}">
                                        {{$ying->type_name}}
                                    </em>
                                </p>
                            @endforeach    
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="caseContent">
                            <h5 class="L">满意度研究</h5>
                            <div class="neirong">
                            @foreach($man as $man)        
                                <p class="L">
                                    <em>
                                        <input type="hidden" class="id" value="{{$man->id}}">
                                        {{$man->type_name}}
                                    </em>
                                </p>
                            @endforeach    
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="eightService">
                    <h4 class="L">八大服务：</h4>
                    <div class="firstEM L"><em><b class="twoWords first marginTop">全部</b></em></div>
                    <dl class="L">
                        <dd  class="first">
                            <em>竞争企业调研</em>
                            <em>行业调研</em>
                            <em>渠道调研</em>
                            <em>满意度调研</em>
                            <em>营销咨询</em>
                            <em>市场战略规划</em>
                        </dd>
                    </dl>
                </div>
                <div class="clear"></div>
                <input type="button" name="" value="确定" class="btn">
            </div>
        </form>
        <!-- 工业品市场研究 -->
        <div class="content">
            <div class="contentTop">
                 <div class="left L">
                    <div class="leftInner">
                        <img src="/Home/images/index/casemore/industry.png">
                        <p>中研世纪成功案例</p>
                    </div>
                </div>
                 <div class="right L">
                      <div class="list">
                          <div class="listLeft L">竞争企业调研</div>
                          <div class="listRight L">
                                <ul>
                                @foreach($jing as $jing)
                                    <li>
                                        <div class="topList"><img src="{{$jing->img_path}}"></div>
                                        <div class="bottomList">
                                            <h5>{{$jing->case_name}}</h5>
                                            <em>{{$jing->case_miaoshu}}&nbsp;...</em>
                                            <a href="{{url('/case_xiang')}}?id={{$jing->id}}">更多&gt;&gt;</a>
                                        </div>
                                    </li>
                                @endforeach    
                                </ul>
                            </div>
                      </div>
                      <div class="list">
                          <div class="listLeft L">行业调研</div>
                          <div class="listRight L">
                                <ul>
                                    @foreach($hang as $hang)
                                        <li>
                                            <div class="topList"><img src="{{$hang->img_path}}"></div>
                                            <div class="bottomList">
                                                <h5>{{$hang->case_name}}</h5>
                                                <em>{{$hang->case_miaoshu}}&nbsp;...</em>
                                                <a href="{{url('/case_xiang')}}?id={{$hang->id}}">更多&gt;&gt;</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                      </div>
                      <div class="list">
                          <div class="listLeft L">渠道调研</div>
                          <div class="listRight L">
                                <ul>
                                    @foreach($qu as $qu)
                                        <li>
                                            <div class="topList"><img src="{{$qu->img_path}}"></div>
                                            <div class="bottomList">
                                                <h5>{{$qu->case_name}}</h5>
                                                <em>{{$qu->case_miaoshu}}&nbsp;...</em>
                                                <a href="{{url('/case_xiang')}}?id={{$qu->id}}">更多&gt;&gt;</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                      </div>
                      <div class="list">
                          <div class="listLeft L">满意度调研</div>
                          <div class="listRight L">
                                <ul>
                                    @foreach($manyidu as $manyidu)
                                        <li>
                                            <div class="topList"><img src="{{$manyidu->img_path}}"></div>
                                            <div class="bottomList">
                                                <h5>{{$manyidu->case_name}}</h5>
                                                <em>{{$manyidu->case_miaoshu}}&nbsp;...</em>
                                                <a href="{{url('/case_xiang')}}?id={{$manyidu->id}}">更多&gt;&gt;</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                      </div>
                      <div class="list">
                          <div class="listLeft L">营销咨询</div>
                          <div class="listRight L">
                                <ul>
                                    @foreach($yingxiao as $yingxiao)
                                        <li>
                                            <div class="topList"><img src="{{$yingxiao->img_path}}"></div>
                                            <div class="bottomList">
                                                <h5>{{$yingxiao->case_name}}</h5>
                                                <em>{{$yingxiao->case_miaoshu}}&nbsp;...</em>
                                                <a href="{{url('/case_xiang')}}?id={{$yingxiao->id}}">更多&gt;&gt;</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                      </div>
                      <div class="list">
                          <div class="listLeft L">市场战略规划</div>
                          <div class="listRight L">
                                <ul>
                                    @foreach($shichang as $shichang)
                                        <li>
                                            <div class="topList"><img src="{{$shichang->img_path}}"></div>
                                            <div class="bottomList">
                                                <h5>{{$shichang->case_name}}</h5>
                                                <em>{{$shichang->case_miaoshu}}&nbsp;...</em>
                                                <a href="{{url('/case_xiang')}}?id={{$shichang->id}}">更多&gt;&gt;</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                      </div>
                      <div class="list">
                          <div class="listLeft L">业务咨询</div>
                          <div class="listRight L">
                                <ul>
                                    @foreach($yewu as $yewu)
                                        <li>
                                            <div class="topList"><img src="{{$yewu->img_path}}"></div>
                                            <div class="bottomList">
                                                <h5>{{$yewu->case_name}}</h5>
                                                <em>{{$yewu->case_miaoshu}}&nbsp;...</em>
                                                <a href="{{url('/case_xiang')}}?id={{$yewu->id}}">更多&gt;&gt;</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                      </div>
                      <div class="list">
                          <div class="listLeft L">商业模式设计</div>
                          <div class="listRight L">
                                <ul>
                                    @foreach($shangye as $shangye)
                                        <li>
                                            <div class="topList"><img src="{{$shangye->img_path}}"></div>
                                            <div class="bottomList">
                                                <h5>{{$shangye->case_name}}</h5>
                                                <em>{{$shangye->case_miaoshu}}&nbsp;...</em>
                                                <a href="{{url('/case_xiang')}}?id={{$shangye->id}}">更多&gt;&gt;</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                      </div>
                 </div>
                 <div class="clear"></div>
            </div>
            <div class="contentBottom">
                <span>查看项目详情</span>
                <span>费用计算器</span>
            </div>
        </div>
    </div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/footer.js"></script>
<script src="/Home/js/index/casemore/case.js"></script>
</body>
</html>