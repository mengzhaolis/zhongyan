@include('Admin.common._meta')
<title>中研世纪-后台首页</title>
<meta name="keywords" content="中研世纪-后台首页">
<meta name="description" content="中研世纪-后台首页">
</head>
<body>
@include('Admin.common._header')
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        @foreach($data as $val)
        <dl id="menu-article">
            <dt>
                <i class="Hui-iconfont">&#xe616;</i> {{$val['type_name']}}
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                        @foreach($val['son'] as $value)
                        <li>
                            <a data-href="{{$value['juris_url']}}" data-title="{{$value['type_name']}}" href="javascript:void(0)">{{$value['type_name']}}</a>
                        </li>
                        @endforeach
                    </ul>
                    
                </dd>
        </dl>
        @endforeach





    </div>
</aside>
<div class="dislpayArrow hidden-xs">
    <a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>

<div class="dislpayArrow hidden-xs">
    <a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" data-href="welcome.html">我的桌面</span>
                    <em></em>
                </li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group">
            <a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
                <i class="Hui-iconfont">&#xe6d4;</i>
            </a>
            <a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
                <i class="Hui-iconfont">&#xe6d7;</i>
            </a>
        </div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="{{url('/admin/welcome')}}"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
    </ul>
</div>
@include('Admin.common._footer');
</body>

</html>