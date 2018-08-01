$(function(){
	// 总裁动态
	$(".dynamic_img a").eq(0).show();
    $(".dynamic_content ul li").mouseover(function(){
        var index=$(this).index();
        $(".dynamic_img a").eq(index).show().siblings().hide();
    })
    // 客户评价
	$(".evaluate_inner li").hover(function(){
        $(this).css("backgroundColor","#445a9a").siblings().css("backgroundColor","#fff");
        $(this).find("p").css("color","#fff");
        $(this).siblings().find("p").css("color","#333");
        $(this).find("span").css("color","#fff");
        $(this).siblings().find("span").css("color","#666");
    },function(){
        $(".evaluate_inner li").css("backgroundColor","#fff");
        $(".evaluate_inner li p").css("color","#333");
        $(".evaluate_inner li span").css("color","#666");
    })
// 点击图片放大

 var imgsObj = $('.evaluate_inner li'); //需要放大的图像的li
    if (imgsObj) {
        $.each(imgsObj, function() {
            $this=$(this).find("img");
            $this.click(function() {
                var currImg = $this;
                // coverLayer(1);
                // var tempContainerOut=$('<div class=tempContainerOut></div>');
                // var tempContainer =$(".tempContainerOut").append('<div class=tempContainer></div>'); 
                var tempContainer=$('<div class=tempContainer></div>');//图片容器  
                with(tempContainer) { //width方法等同于$(this)  
                    appendTo("body");
                    var windowWidth = $(window).width();
                    var windowHeight = $(window).height();
                    //获取图片原始宽度、高度  
                    var orignImg = new Image();
                    orignImg.src = currImg.attr("src");
                    var currImgWidth = orignImg.width;
                    var currImgHeight = orignImg.height;
                    if (currImgWidth < windowWidth) { //为了让图片不失真，当图片宽度较小的时候，保留原图  
                        if (currImgHeight < windowHeight) {
                            var topHeight = (windowHeight - currImgHeight) / 2;
                            html('<img border=0 src=' + currImg.attr('src') + '>');
                        } else {
                            css('top', 0);
                            html('<img border=0 src=' + currImg.attr('src') + '>');
                        }
                    } else {
                        var currImgChangeHeight = (currImgHeight * windowWidth) / currImgWidth;
                        if (currImgChangeHeight < windowHeight) {
                            var topHeight = (windowHeight - currImgChangeHeight) / 2;
                            html('<img border=0 src=' + currImg.attr('src') + ';>');
                        } else {
                            css('top', 0);
                            html('<img border=0 src=' + currImg.attr('src') + '>');
                        }
                    }
                }
                // var close=$(".tempContainer").append($('<span class=close></span>'));
                tempContainer.click(function() {
                    $(this).remove();
                    // coverLayer(0);
                });
            });
        });
    } else {
        return false;
    }
  
    
})