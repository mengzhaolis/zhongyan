$(function(){
	// 中研栏目
	$(".column ul li").hover(function(){
		console.log(123)
		$(this).find(".pre-click").show();
		$(this).siblings().find(".pre-click").hide();
	},function(){
        $(this).find(".pre-click").hide();
	})
	    // 服务体系
    $(".service_inner_list ul li").hover(function(){
        $(this).find("p").stop().animate({height:"144px",padding:"40px 20px 0", opacity:"1"},400);
    },function(){
        $(this).find("p").stop().animate({height:"0",padding:"0",opacity:"0"},400);
    })
  //成功案例
    $("#indemo ul li").hover(function(){
        $(this).find(".diaplayHide").show();
    },function(){
    	$(this).find(".diaplayHide").hide();
    })
})