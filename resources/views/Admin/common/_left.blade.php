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
						<a data-href="{{url('/message/message')}}" data-title="{{$value['type']}}" href="javascript:void(0)">{{$value['type']}}</a>
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
<!-- 防止在index.blade.php页面中的通过后台数据循环的左侧菜单栏 -->
<!-- <aside class="Hui-aside">
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
</div> -->