// tab选项卡
$(function(){
    $(".footer_right ol li").eq(0).addClass("current");
    $(".footer_right_list ul").eq(0).show();
    $(".footer_right ol li").mouseover(
        function(){
            $(this).addClass("current").siblings().removeClass("current");
            var index=$(this).index();
            $(".footer_right_list ul").eq(index).show().siblings().hide();
        })
})