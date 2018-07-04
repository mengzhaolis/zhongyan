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
        hasStarted = false;
    }
    start()
    // 开课时间
    var eq=$(".special").find("li").eq(0);
    eq.addClass("specialFirst");
    eq.find(".specialLeft").addClass("changeHeight");
    eq.find("h5").addClass("changeSize");
    eq.find("p").show();
    $(".special").find("li").hover(function(){
        var $this=$(this);
        $this.addClass("specialFirst").siblings().removeClass("specialFirst");
        $this.find(".specialLeft").addClass("changeHeight");
        $this.siblings().find(".specialLeft").removeClass("changeHeight");
        $this.find("h5").addClass("changeSize")
        $this.siblings().find("h5").removeClass("changeSize");
        $this.find("p").show();
        $this.siblings().find("p").hide();
    })
   // 最新资讯
    $(".consult_img_first").show();
    $("#list p").mouseover(
        function () {
            $this = $(this).parents("#list");
            $this.find(".consult_img").show();
            $this.siblings().find(".consult_img").hide();
        })
    // 中研行业
    $(window).scroll(function(){
        var T=$(document).scrollTop();
        if(T>=1200&&T<=2300){
            $(".industryL").stop().animate({width:"50%"},400);
            $(".industryR").stop().animate({width:"50%"},400);
        }else{
            $(".industryL").stop().animate({width:"0"},400);
            $(".industryR").stop().animate({width:"0"},400);
        }
    }) 
$(".industry_middle ul li a").eq(0).show();
    $(".industry_middle ul li").mouseover(
        function(){
            var index=$(this).index();
            $(".industry_middle_outer ol").eq(index).show().siblings().hide();
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
$('.city').change(function(){

    var province_id = $(this).val();
    var token = $("#token").val();
    var url = '/city';
    var data ={'_token':token,'province_id':province_id};
    $.post(url,data,function(data){
        $('.second').html(data);
    })
})

