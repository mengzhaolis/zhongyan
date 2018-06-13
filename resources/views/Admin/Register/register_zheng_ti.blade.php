<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="100">用户名</th>
				<th width="90">手机</th>
				<th width="80">地域</th>
				<th width="150">注册来源</th>
				<!-- <th width="">地址</th> -->
				<th width="110">注册时间</th>
				<th width="110">分配时间</th>
				<th width="100">处理时间</th>
				<th width="100">调研类型</th>
				<th width="60">线索状态</th>
				<th width="60">联系人</th>
				<th width="60">分配状态</th>
				<th width="50">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $val)
			<tr class="text-c">
				<td><input type="checkbox" value="{{$val->id}}" name="check"></td>
				<td>{{$val->id}}</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show()">{{$val->user_name}}</u></td>
				<td>{{$val->user_phone}}</td>
				<td>{{$val->user_address}}</td>
				<td>{{$val->reg_url}}</td>
				<!-- <td class="text-l">北京市 海淀区</td> -->
				<td>{{date("Y-m-d H:i:s",$val->created_at)}}</td>
				<td>{{date("Y-m-d H:i:s",$val->updated_at)}}</td>
				<td>{{date("Y-m-d H:i:s",$val->changed_at)}}</td>
				<td class="td-status"><span class="label label-success radius">{{$val->crcm_type}}</span></td>

				@if($val->status==0)
					<td class="td-status"><span class="label label-success radius" style="background-color:#999999">未操作</span></td>
				@elseif($val->status==1)
					<td class="td-status"><span class="label label-success radius" style="background-color:#ff6600">1次失败</span></td>
				@endif
				@if($val->status==2)
					<td class="td-status"><span class="label label-success radius" style="background-color:red">2次失败</span></td>
				@elseif($val->status==3)
					<td class="td-status"><span class="label label-success radius" style="background-color:green">有效</span></td>
				@endif
				
				<td class="td-status"><span class="label label-success radius" style="background-color:blue">{{$val->name}}</span></td>
				@if($val->nums==2)
				<td class="td-status"><span class="label label-success radius" style="background-color:red">2次分配</span></td>
				@elseif($val->nums==1)
				<td class="td-status"><span class="label label-success radius" style="background-color:red">1次分配</span></td>
				@endif
				@if($val->nums==0)
				<td class="td-status"><span class="label label-success radius" style="background-color:red">未分配</span></td>
				
				@endif
				<td class="td-manage">
				<!-- <a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>  -->
				<a title="编辑" href="javascript:;" onclick="member_show()" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
				 <!--产看注册详细信息开始  -->
				<div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content radius">
							<div class="modal-header">
								<h3 class="modal-title">注册详情</h3>
								<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
							</div>
							<div class="modal-body">
								<p>{{$val->crcm_need}}</p>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary">确定</button>
								<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
							</div>
						</div>
					</div>
				</div>
				 <!--产看注册详细信息结束  -->
				<!-- <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>  -->
				<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
