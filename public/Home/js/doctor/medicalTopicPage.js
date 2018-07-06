$(function(){
    // 医疗产业面临的问题
    $(".problemInner").find("li").hover(function(){
        var $this=$(this);
        $this.find("h4").addClass("changeColor");
        $this.find("h4").addClass("changeBorderColor");
        $this.find("p").addClass("changeColor");
        $this.addClass("changeBackground");
    },function(){
        var $this=$(this);
        $this.find("h4").removeClass("changeColor");
        $this.find("h4").removeClass("changeBorderColor");
        $this.find("p").removeClass("changeColor");
        $this.removeClass("changeBackground");
    })
    // 如何运作商业地产第一块
    $(".whatInnerListOne").find("li").hover(function(){
        var $this=$(this);
        $this.find("h4").addClass("change");
        $this.addClass("shadow");
    },function(){
        var $this=$(this);
        $this.find("h4").removeClass("change");
        $this.removeClass("shadow");
    })
	// 如何运作商业地产第二块
	$lis=$(".whatInnerHeadline").find("li");
	$(".whatInnerTitle h4").eq(0).show();
    $(".whatInnerImg ol li").eq(0).show();
    $(".whatInnerTitle h4").eq(0).siblings().hide();
    $(".whatInnerImg ol li").eq(0).siblings().hide();
	$lis.hover(function(){
		var $this=$(this);
		var $index=$this.index();
		$this.addClass("backgroundImg");
        $this.find("img").attr("src","/Home/images/doctor/whatWhite"+$index+".png");
        $this.find("h5").addClass("changeColor");
	},function(){
		var $this=$(this);
		var $index=$this.index();
		$this.removeClass("backgroundImg");
        $this.find("img").attr("src","/Home/images/doctor/what"+$index+".png");
        $this.find("h5").removeClass("changeColor");
	})
	$lis.click(function(){
		var $this=$(this);
		var $index=$this.index();
		$(".whatInnerTitle h4").eq($index).show().siblings().hide();
        $(".whatInnerImg ol li").eq($index).show().siblings().hide();
	})
	$(window).scroll(function() {
        var _top = $(window).scrollTop();
        if (_top > 4750){
            $('.BACKTOP').addClass("backTop");
        } 
        if(_top <= 4750){
            $('.BACKTOP').removeClass("backTop");
        }
    });
    $(".BACKTOP").click(function() {
        $("html,body").animate({
            scrollTop: 0
        }, 100);
    });
})