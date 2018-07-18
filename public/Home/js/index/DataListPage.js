$(function(){
	$(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/index/message/breadcrumbBlue0.png')","color":"#fff"});
	$(".breadcrumb a").hover(function(){
        var $this=$(this);
        var $index=$this.index();
        if($this!=0){
            $(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/index/message/breadcrumbWhite0.png')","color":"#333"});
             $this.css({"backgroundImage":"url('/Home/images/index/message/breadcrumbBlue"+$index+".png')","color":"#fff"});
        }else if($this==0){
        	$(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/index/message/breadcrumbBlue0.png')","color":"#fff"});
        }
	},function(){
		var $this=$(this);
        var $index=$this.index();
        $this.css({"backgroundImage":"url('/Home/images/index/message/breadcrumbWhite"+$index+".png')","color":"#333"});
        $(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/index/message/breadcrumbBlue0.png')","color":"#fff"});
	})
})