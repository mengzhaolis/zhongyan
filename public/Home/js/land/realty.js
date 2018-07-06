$(function(){
	// 如何运作商业地产第二块
	$lis=$(".howInnerHeadline").find("li");
	$(".howInnerTitle h4").eq(0).show();
    $(".howInnerImg ol li").eq(0).show();
    $(".howInnerTitle h4").eq(0).siblings().hide();
    $(".howInnerImg ol li").eq(0).siblings().hide();
	$lis.hover(function(){
		var $this=$(this);
		var $index=$this.index();
		$this.addClass("backgroundImg");
        $this.find("img").attr("src","/Home/images/land/howWhite"+$index+".png");
        $this.find("h5").addClass("changeColor");
	},function(){
		var $this=$(this);
		var $index=$this.index();
		$this.removeClass("backgroundImg");
        $this.find("img").attr("src","/Home/images/land/how"+$index+".png");
        $this.find("h5").removeClass("changeColor");
	})
	$lis.click(function(){
		var $this=$(this);
		var $index=$this.index();
		$(".howInnerTitle h4").eq($index).show().siblings().hide();
        $(".howInnerImg ol li").eq($index).show().siblings().hide();
	})
	$(window).scroll(function() {
        var _top = $(window).scrollTop();
        if (_top > 5000){
            $('.BACKTOP').addClass("backTop");
        } 
        if(_top <= 5000){
            $('.BACKTOP').removeClass("backTop");
        }
    });
    $(".BACKTOP").click(function() {
        $("html,body").animate({
            scrollTop: 0
        }, 100);
    });
})