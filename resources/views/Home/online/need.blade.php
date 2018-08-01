@include('Home.common.head') 
    <meta charset="UTF-8">
    <title>需求评估</title>

    <link rel="stylesheet" type="text/css" href="/Home/css/online/need.css">
</head>
<body>
@include('Home.common._meat')
<!-- 主体 -->
<div class="main">
    <div class="inner">
        <div class="leftImg L">
            <img src="/Home/images/online/need/leftText.png" class="leftText">
            <img src="/Home/images/online/need/leftImg.png">
        </div>
        <div class="need R">
            <h3>需求评估</h3>
            <p>浏览产品了解中研能为你做什么</p>
            <form>
                <div class="name txt">
                    <label for="name">姓&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
                    <input type="text" name="" id="name" placeholder="请输入您的姓名">
                    <em>*</em>
                </div>
                <div class="tel txt">
                    <label for="tel">手机号：</label>
                    <input type="text" name="" id="tel" placeholder="请输入11位的手机号码">
                    <em>*</em>
                </div>
                <div class="company txt">
                    <label for="company">公&nbsp;&nbsp;&nbsp;&nbsp;司：</label>
                    <input type="text" name="" id="company" placeholder="请输入您的公司名称">
                </div>
                <div class="trade sel">
                    <label for="trade">行&nbsp;&nbsp;&nbsp;&nbsp;业：</label>
                    <select id="trade" class="type">
                        <option>请选择您需要评估的行业</option>
                        
                         @foreach($type as $type)
                            <option value="{{$type['id']}}">{{$type['type_name']}}</option>
                                @foreach($type['son'] as $value)
                                    <option value="{{$value['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;|--{{$value['type_name']}}</option>
                                @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="type sel">
                    <label for="type">类&nbsp;&nbsp;&nbsp;&nbsp;型：</label>
                    <select id="type" class='type_hang'>
                        <option>&nbsp;&nbsp;&nbsp;&nbsp;请选择您需要评估的行业</option>
                        
                    </select>
                </div>
                <div class="budget">
                    <i>预&nbsp;&nbsp;&nbsp;&nbsp;算：</i>
                    <!-- <span>10&nbsp;-&nbsp;30万</span>
                    <span>30&nbsp;-&nbsp;50万</span>
                    <span>50&nbsp;-&nbsp;80万</span>
                    <span>80万以上</span> -->
                    <input type="radio" name="money" value="10万-30万">10&nbsp;-&nbsp;30万 
                </div>
                <p>注：预算请参考<a href="{{url('/online/counter')}}" target="view_window">计算器</a></p>
                <div class="area"><label for="area">描&nbsp;&nbsp;&nbsp;&nbsp;述：</label><textarea placeholder="请简要描述您的需求：" id="area"></textarea></div>
                <input type="button" value="提交" class="btn" id="submit">
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/online/need.js"></script>
<script src="/Home/js/footer.js"></script>
<script type="text/javascript" src="/H-ui.admin/H-ui/lib/layer/2.4/layer.js"></script>
</body>
</html>