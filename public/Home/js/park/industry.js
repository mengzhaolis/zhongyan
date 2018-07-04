// 轮播图
$(function(){
        var length, currentIndex = 0,
        interval, hasStarted = false,
        t = 3000;
    length = $('.slider-panel').length;
    $('.slider-panel:not(:first)').hide();
    $('.slider-item:first').addClass('slider-item-selected');
    $('.slider-page').hide();
    $('.slider-panel, .slider-pre, .slider-next').hover(function() {
        stop();
        $('.slider-page').show()
    }, function() {
        $('.slider-page').hide();
        start()
    });
    $('.slider-item').hover(function(e) {
        stop();
        var preIndex = $(".slider-item").filter(".slider-item-selected").index();
        currentIndex = $(this).index();
        play(preIndex, currentIndex)
    }, function() {
        start()
    });
    $('.slider-pre').unbind('click');
    $('.slider-pre').bind('click', function() {
        pre()
    });
    $('.slider-next').unbind('click');
    $('.slider-next').bind('click', function() {
        next()
    });

    function pre() {
        var preIndex = currentIndex;
        currentIndex = (--currentIndex + length) % length;
        play(preIndex, currentIndex)
    }

    function next() {
        var preIndex = currentIndex;
        currentIndex = ++currentIndex % length;
        play(preIndex, currentIndex)
    }

    function play(preIndex, currentIndex) {
        $('.slider-panel').eq(preIndex).fadeOut(500).parent().children().eq(currentIndex).fadeIn(1000);
        $('.slider-item').removeClass('slider-item-selected');
        $('.slider-item').eq(currentIndex).addClass('slider-item-selected')
    }

    function start() {
        if (!hasStarted) {
            hasStarted = true;
            interval = setInterval(next, t)
        }
    }

    function stop() {
        clearInterval(interval);
        hasStarted = false
    }
    start()

    // 产品服务
     $(".service_inner_list ul li").hover(function(){
        $(this).find(".empty").stop().animate({width:"100%"},400);
        $(this).find(".text").stop().animate({left:"30px",opacity:"1"},400);
    },function(){
        $(this).find(".empty").stop().animate({width:"0"},400);
        $(this).find(".text").stop().animate({left:"272px",opacity:"0"},400);
    })
     // 经典案例
     $(".classicCase_inner li").hover(function(){
        $(this).css("backgroundColor","#445a9a").siblings().css("backgroundColor","#fff");
        $(this).find("p").css("color","#fff");
        $(this).siblings().find("p").css("color","#333");
     },function(){
        $(".classicCase_inner li").css("backgroundColor","#fff");
        $(".classicCase_inner li p").css("color","#333");
     })
// 中研流程图
   $(".demandContent .first").show();
    var $left=$(".demandLine").position().left;
     $(".rightArrow").click(function(){
        var $left=$(".demandLine").position().left;
        if($left>-330){
            $(".rightArrow img").attr("src","./images/industry/left.png");
            $(".rightArrow").addClass("changeRotateRight");
            $(".demandLine").animate({ left: "-=110px" }, 0);
        }else if($left==-330){
            $(".rightArrow img").attr("src","./images/industry/right.png");
            $(".rightArrow").removeClass("changeRotateRight");
        }
    })
    $(".leftArrow").click(function(){
        var $left=$(".demandLine").position().left;
        if($left<0){
            $(".leftArrow img").attr("src","./images/industry/left.png");
            $(".leftArrow").addClass("changeRotateLeft");
            $(".demandLine").animate({ left: "+=110px" }, 0);
        }else if($left==0){
            $(".leftArrow img").attr("src","./images/industry/right.png");
            $(".leftArrow").removeClass("changeRotateLeft");
        }           
    })
    $(".demandLine ul li").hover( function(){
        $(this).find("div").addClass("change")
        $(this).siblings().find("div").removeClass("change");
        $(this).addClass("bgchange").siblings().removeClass("bgchange");
        var index=$(this).index();
        $(".demandContent ul li").eq(index).show().siblings().hide();
    },function(){
        $(".demandLine ul li").find("div").removeClass("change");
        $(".demandLine ul li").removeClass("bgchange");
    })
    $(".bottom a").hover(function(){
        $(this).addClass("fontColor").siblings().removeClass("fontColor");
    },function(){
        $(".bottom a").removeClass("fontColor");
    })
})