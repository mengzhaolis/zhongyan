$(function(){
    $(window).scroll(function() {
        var _top = $(window).scrollTop();
        if (_top > 4150){
            $('.BACKTOP').addClass("backTop");
        } 
        if(_top <= 4250){
            $('.BACKTOP').removeClass("backTop");
        }
    });
    $(".BACKTOP").click(function() {
        $("html,body").animate({
            scrollTop: 0
        }, 100);
    });
})
