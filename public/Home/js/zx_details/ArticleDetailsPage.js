$(function(){
    // 顶部
	$(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/zx_details/breadcrumbBlue0.png')","color":"#fff"});
	$(".breadcrumb a").hover(function(){
        var $this=$(this);
        var $index=$this.index();
        if($this!=0){
            $(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/zx_details/breadcrumbWhite0.png')","color":"#333"});
             $this.css({"backgroundImage":"url('/Home/images/zx_details/breadcrumbBlue"+$index+".png')","color":"#fff"});
        }else if($this==0){
        	$(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/zx_details/breadcrumbBlue0.png')","color":"#fff"});
        }
	},function(){
		var $this=$(this);
        var $index=$this.index();
        $this.css({"backgroundImage":"url('/Home/images/zx_details/breadcrumbWhite"+$index+".png')","color":"#333"});
        $(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/zx_details/breadcrumbBlue0.png')","color":"#fff"});
	})
    // 调研流程
    $(".demandContent .first").show();
    var $left=$(".demandLine").position().left;
     $(".rightArrow").click(function(){
        var $left=$(".demandLine").position().left;
        if($left>-330){
            $(".rightArrow img").attr("src","/Home/images/zx_details/left.png");
            $(".rightArrow").addClass("changeRotateRight");
            $(".demandLine").animate({ left: "-=110px" }, 0);
        }else if($left==-330){
            $(".rightArrow img").attr("src","/Home/images/zx_details/right.png");
            $(".rightArrow").removeClass("changeRotateRight");
        }
    })
    $(".leftArrow").click(function(){
        var $left=$(".demandLine").position().left;
        if($left<0){
            $(".leftArrow img").attr("src","/Home/images/zx_details/left.png");
            $(".leftArrow").addClass("changeRotateLeft");
            $(".demandLine").animate({ left: "+=110px" }, 0);
        }else if($left==0){
            $(".leftArrow img").attr("src","/Home/images/zx_details/right.png");
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