@include('Home.common.head')
    <meta charset="UTF-8">
    <title>计算器</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/online/calculator.css">
@include('Home.common._meat')
</head>
<body>

<div class="main">
    <div class="inner">
        <div class="img">
            <img src="/Home/images/online/title.png">
            <img src="/Home/images/online/money.png" class="money">
        </div>
        <div class="mainInner">
            <!-- 左边 -->
            <div class="mainLeft L">
                <h3>在线计算</h3>
                <p>浏览产品了解中研能为你做什么</p>
                <form>
                    <div class="name">
                        <label for="name">1.请填写您的姓名：</label>
                        <input type="text" name="" id="name">
                    </div>
                    <div class="tel">
                        <label for="tel">2.请填写您的手机号码:</label>
                        <input type="text" name="" id="tel">
                    </div>
                    
                    <div class="trade">
                        <label>3.请选择您需要调研的行业：</label>
                        <br/>
                        <select class="type">
                            <option value=''>---请选择行业---</option>
                                @foreach($type as $type)
                                <option class="oneLevel" value="{{$type['id']}}">{{$type['type_name']}}</option>
                                    @foreach($type['son'] as $value)
                                        <option class="oneLevel" value="{{$value['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;|--{{$value['type_name']}}</option>
                                    @endforeach
                                @endforeach

                        </select>
                    </div>
                    <div class="type">
                        <label>4.请选择您需要调研的行业类型</label>
                        <br/>
                        <select class="type_hang">
                            <option class="empty">请选择调研类型</option>
                            
                        </select>
                    </div>   
                </form>
            </div>
            <div class="mainCenter">
                <form>
                    <input type="button" name="" id="submit" value="提交">
                </form>
            </div>
            <!-- 右边 -->
            <div class="mainRight R asd">
                <h3>计算结果</h3>
                <p>浏览产品了解中研能为你做什么</p>
                <div class="classify">
                    <h4>行业：</h4>
                    <dl>
                        
                    </dl>
                </div>
                <div class="typeRight">
                    <h4>行业类型：</h4>
                    
                </div>
                <div class="content">
                    <h4>行业内容：</h4>
                    
                </div>
                <div class="price">
                    <h4>参考价格：</h4>
                    <p><span>￥</span></p>
                    <div class="clear"></div>
                    <ul>
                        <li>①费用计算结果仅供参考；</li>
                        <li>②稍后我们会主动联系您；</li>
                        <li>③中研世纪行业专家会结合您实际需求，为您提供精准报价；</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/online/calculator.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>