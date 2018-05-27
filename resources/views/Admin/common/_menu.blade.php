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
					<li>
						<a data-href="{{url('/message/message')}}" data-title="资讯管理" href="javascript:void(0)">资讯管理</a>
					</li>
				</ul>
				<ul>
					<li>
						<a data-href="{{url('/message/message_recycle')}}" data-title="回收站" href="javascript:void(0)">回收站</a>
					</li>
				</ul>
			</dd>
		</dl>
		@endforeach





	</div>
</aside>
<div class="dislpayArrow hidden-xs">
	<a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>