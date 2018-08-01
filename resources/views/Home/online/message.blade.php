@include('Home.common.head')
    <meta charset="UTF-8">
    <title>在线留言</title>
    <link rel="stylesheet" type="text/css" href="/Home/css/online/online.css">
</head>
<body>
@include('Home.common._meat')
<!-- 主体 -->
<div class="main">
    <div class="inner">
         <div class="left L">
             <div class="topImg"><img src="/Home/images/online/message/topImg.png"></div>
             <div class="bottomImg"><img src="/Home/images/online/message/bottomImg.png"></div>
         </div>
         <div class="right R">
             <h3>在线留言</h3>
             <p>浏览产品了解中研能为你做什么</p>
             <form>
                <div class="name marginBottom">
                    <label for="name">您的姓名：</label>
                    <input type="text" name="" id="name" placeholder="请输入您的姓名">
                </div>
                <div class="tel marginBottom">
                    <label for="name">您的电话：</label>
                    <input type="text" name="" id="tel" placeholder="请输入11位的手机号码">
                </div>
                <div class="area marginBottom">
                    <label for="content">留言内容：</label>
                    <textarea placeholder="请输入留言内容" id="content"></textarea>
                </div>
                <div class="clear"></div>
                <input type="button" name="" value="提交" id="btn">
             </form>
         </div>
    </div>
    <div class="clear"></div>
</div>
@include('Home.common.footer')
<script src="/Home/js/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/Home/js/online/online.js"></script>
<script src="/Home/js/footer.js"></script>
</body>
</html>