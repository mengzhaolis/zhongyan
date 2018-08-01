@include('Home.common.head')
    <meta charset="UTF-8">
    <title>注册页面</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/online/button.css">
</head>
<body>
@include('Home.common._meat')
<!-- 主体 -->
<div class="main">
    <div class="inner">
         <div class="left L">
             <h3>
                <span>开课时间</span>
                <a href="">了解更多&gt;&gt;</a>
             </h3>
             <ul>
                 <li class="first">2018-08-10&nbsp;&nbsp;开课时间开课时间开课时间开课时间开课时间开课时间</li>
                 <li>2018-08-10&nbsp;&nbsp;开课时间开课时间开课时间开课时间开课时间开课时间</li>
                 <li>2018-08-10&nbsp;&nbsp;开课时间开课时间开课时间开课时间开课时间开课时间</li>
                 <li>2018-08-10&nbsp;&nbsp;开课时间开课时间开课时间开课时间开课时间开课时间</li>
                 <li>2018-08-10&nbsp;&nbsp;开课时间开课时间开课时间开课时间开课时间开课时间</li>
             </ul>
         </div>
         <div class="right R">
            <h3>欢迎注册</h3>
             <form>
                <div class="content">
                    <label for="name"><em>*</em>您的姓名：</label>
                    <input type="text" name="" placeholder="请输入您的姓名" id="name">
                </div>
                <div class="content">
                    <label for="tel"><em>*</em>您的电话：</label>
                    <input type="text" name="" placeholder="请输入您的电话" id="tel">
                </div>
                <div class="content">
                    <span>&nbsp;&nbsp;所在城市：</span>
                    <select class="province">
                        <option>-&nbsp;省&nbsp;-</option>
                    </select>
                    <select class="downtown">
                        <option>-&nbsp;市区&nbsp;-</option>
                    </select>
                </div>
                <div class="content area">
                    <label for="area1">&nbsp;&nbsp;调研类型：</label>
                    <textarea class="genre" id="area1"></textarea>
                </div>
                <div class="content area">
                    <label for="area2">&nbsp;&nbsp;调研需求：</label>
                     <textarea class="need" id=area2></textarea>
                </div>
                <p><span><img src="/Home/images/online/login/conceal.png"></span><i>本公司将严格遵守相关法律法规，绝不泄露用户信息</i></p>
                <div class="clear"> </div>
                <input type="button" name="" class="btn" value="立即提交" id="btn">
            </form>
         </div>
    </div>
    <div class="clear"></div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/online/button.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>