$(function(){
    // 顶部
	$(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/course_xiang/breadcrumbBlue0.png')","color":"#fff"});
	$(".breadcrumb a").hover(function(){
        var $this=$(this);
        var $index=$this.index();
        if($this!=0){
            $(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/course_xiang/breadcrumbWhite0.png')","color":"#333"});
             $this.css({"backgroundImage":"url('/Home/images/course_xiang/breadcrumbBlue"+$index+".png')","color":"#fff"});
        }else if($this==0){
        	$(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/course_xiang/breadcrumbBlue0.png')","color":"#fff"});
        }
	},function(){
		var $this=$(this);
        var $index=$this.index();
        $this.css({"backgroundImage":"url('/Home/images/course_xiang/breadcrumbWhite"+$index+".png')","color":"#333"});
        $(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/course_xiang/breadcrumbBlue0.png')","color":"#fff"});
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
        // 点击变大图

 var imgsObj = $('.evaluate_inner li'); //需要放大的图像的li
    if (imgsObj) {
        $.each(imgsObj, function() {
            $this=$(this).find("img");
            $this.click(function() {
                var currImg = $this;
                // coverLayer(1);
                var tempContainer = $('<div class=tempContainer></div>'); //图片容器  
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