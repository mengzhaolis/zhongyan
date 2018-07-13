$(function(){
    // 轮播图
      var length, currentIndex = 0,
        interval, hasStarted = false,
        t = 3000;
    length = $('.slider-panel').length;
    $('.slider-panel:not(:first)').hide();
    $('.slider-item:first').addClass('slider-item-selected');
    $('.slider-page').hide();
    $('.slider-panel, .slider-pre, .slider-next').hover(function() {
        stop();
        $('.slider-page').show();
    }, function() {
        $('.slider-page').hide();
        start()
    });
    $('.slider-item').hover(function(e) {
        stop();
        var preIndex = $(".slider-item").filter(".slider-item-selected").index();
        currentIndex = $(this).index();
        play(preIndex, currentIndex);
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
        play(preIndex, currentIndex);
    }

    function next() {
        var preIndex = currentIndex;
        currentIndex = ++currentIndex % length;
        play(preIndex, currentIndex);
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
        hasStarted = false;
    }
    start();

  //成功案例
    $("#indemo ul li").hover(function(){
        $(this).find(".diaplayHide").show();
    },function(){
    	$(this).find(".diaplayHide").hide();
    })
    // 中研流程图
   $(".demandContent .first").show();
    var $left=$(".demandLine").position().left;
     $(".rightArrow").click(function(){
        var $left=$(".demandLine").position().left;
        if($left>-330){
            $(".rightArrow img").attr("src","/Home/images/public/left.png");
            $(".rightArrow").addClass("changeRotateRight");
            $(".demandLine").animate({ left: "-=110px" }, 0);
        }else if($left==-330){
            $(".rightArrow img").attr("src","/Home/images/public/right.png");
            $(".rightArrow").removeClass("changeRotateRight");
        }
    })
    $(".leftArrow").click(function(){
        var $left=$(".demandLine").position().left;
        if($left<0){
            $(".leftArrow img").attr("src","/Home/images/public/left.png");
            $(".leftArrow").addClass("changeRotateLeft");
            $(".demandLine").animate({ left: "+=110px" }, 0);
        }else if($left==0){
            $(".leftArrow img").attr("src","/Home/images/public/right.png");
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
      // 成功案例 
window.onload=function(){
    var speed=20;
    var tab=document.getElementById("demo");
    var tab1=document.getElementById("demo1");
    var tab2=document.getElementById("demo2");
    tab2.innerHTML=tab1.innerHTML;
    function Marquee(){
        if(tab2.offsetWidth-tab.scrollLeft<=0)
            tab.scrollLeft-=tab1.offsetWidth;
        else{
            tab.scrollLeft++;
        }
    }
    var MyMar=setInterval(Marquee,speed);
    tab.onmouseover=function() {clearInterval(MyMar)};
    tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
  $("#indemo ul li").hover(function(){
        $(this).find(".diaplayHide").show();
    },function(){
        $(this).find(".diaplayHide").hide();
    }) 
 };
})
//首页底部注册-省市二级联动
$('.city').change(function () {

    var province_id = $(this).val();
    // var token = $("#token").val();
    var url = '/city';
    var data = {'province_id': province_id };
    $.get(url, data, function (data) {
        $('.second').html(data);
    })
})