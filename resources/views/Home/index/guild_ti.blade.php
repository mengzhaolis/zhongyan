<ul class="hang">
    @foreach($guild as $guild)
    <li>
        <img src="{{$guild->img_path}}">
        <div class="listTop">
                <h4>{{$guild->guild_title}}</h4>
                <em></em>
                <p>{{$guild->guild_miao}}<a href="{{$guild->guild_url}}" style="color:white;">【详情】</a></p>
        </div>
            <div class="listBottom">
                <a href="">参考报价</a>
                <a href="">需求评估</a>
            </div>
        </li>
        
    @endforeach
</ul>