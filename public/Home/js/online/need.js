$('.type').change(function () {
    var id = $(this).val();
    var url = '/online/counter_type';
    var data = { 'id': id }
    $.get(url, data, function (data) {
        $('.type_hang').html(data)
    })
})
$("#submit").click(function () {

    var username = $.trim($("#name").val());
    if (username.length == 0) {
        $('#name').val('');
        $('#name').attr('placeholder', '用户名不能为空');
        return;
    }
    var reg = /^[\u4E00-\u9FA5]{2,4}$/;
    if (!reg.test(username)) {
        $('#name').val('');
        $('#name').attr('placeholder', '用户名必须是汉字');
        return;
    }
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
    var phones = $("#tel").val();
    // alert(jQuery.type(phones));
    if (phones.length == 0) {
        $('#tel').val('');
        $('#tel').attr('placeholder', '手机号不能为空');
        return;
    }
    if (!myreg.test(phones)) {
        $('#tel').val('');
        $('#tel').attr('placeholder', '手机号不合法');
        return;
    }
    var type = $('.type').val();
    if (type == 0 || type == '') {
        alert('请选择行业');
        return;
    }
    var type_hang = $('.type_hang').val();

    var money = $('input:radio[name="money"]:checked').val();
    var company = $("#company").val();
    var miaoshu = $("#area").val();
    if(money==0||money==''||money==undefined)
    {
        alert('请选择预算,详情参考计算器');
        return;
    }
    var data = { 'username': username, 'phone': phones, 'hangye': type, 'type': type_hang,'money':money,'company':company,'miaoshu':miaoshu }
    // console.log(data)
    var url = '/administrator/need_add';
    $.get(url, data, function (data) {
       if(data!='')
       {
           layer.msg('添加成功,我们尽快和您取得联系!', { icon: 1, time: 3000 });
           window.location.reload();
       }else
       {
           layer.msg('添加失败!', { icon: 5, time: 1000 });
       }
    })
})