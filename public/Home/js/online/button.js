$(function(){
	$("#btn").click(function(){
		var username = $.trim($("#name").val());
		if (username.length == 0) {
			$('#name').val('');
			$('#name').attr('placeholder', '用户名不能为空');
			return;
		}
		var reg = /^[\u4E00-\u9FA5]{2,4}$/;
		if(!reg.test(username))
		{
			$('#name').val('');
			$('#name').attr('placeholder','用户名必须是汉字');
			return;
		}
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		var phones = $("#tel").val();
		// alert(jQuery.type(phones));
		if(phones.length==0)
		{
			$('#tel').val('');
			$('#tel').attr('placeholder', '手机号不能为空');
			return;
		}
		if(!myreg.test(phones))
		{
			$('#tel').val('');
			$('#tel').attr('placeholder', '手机号不合法');
			return;
		}
		var type1 = $('.province').val();
		if(type1==0||type1=='')
		{
			alert('请选择省');
		}
		var type2 = $('.downtown').val();
		if(type2==0||type2=='')
		{
			alert('请选择市区');
		}
		if($("#area1").val().length==0){
			$('#area1').val('');
			$('#area1').attr('placeholder', '调研类型不能为空');
			return;
		}
		if($("#area2").val().length==0){
			$('#area2').val('');
			$('#area2').attr('placeholder', '调研需求不能为空');
			return;
		}
	});
})