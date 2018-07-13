$('.type').change(function(){
	var id = $(this).val();
	var url ='/online/counter_type';
	var data = {'id':id}
	$.get(url,data,function(data){
		$('.type_hang').html(data)
	})
})
$("#submit").click(function(){

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
	var type = $('.type').val();
	if(type==0||type=='')
	{
		alert('请选择行业');
	}
	var type_hang = $('.type_hang').val();

	var data = {'username':username,'phone':phones,'hangye':type,'type':type_hang}
	// console.log(data)
	var url ='/online/jieguo';
	$.get(url,data,function(data){
		if(data =='')
		{
			alert('请查看填写信息');
			return;
		}
		console.log(data)
		$('.asd').html(data);
	})
})