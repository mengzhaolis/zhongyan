$(function(){
	$(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/index/course_list/breadcrumbBlue0.png')","color":"#fff"});
	$(".breadcrumb a").hover(function(){
        var $this=$(this);
        var $index=$this.index();
        if($this!=0){
            $(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/index/course_list/breadcrumbWhite0.png')","color":"#333"});
             $this.css({"backgroundImage":"url('/Home/images/index/course_list/breadcrumbBlue"+$index+".png')","color":"#fff"});
        }else if($this==0){
        	$(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/index/course_list/breadcrumbBlue0.png')","color":"#fff"});
        }
	},function(){
		var $this=$(this);
        var $index=$this.index();
        $this.css({"backgroundImage":"url('/Home/images/index/course_list/breadcrumbWhite"+$index+".png')","color":"#333"});
        $(".breadcrumb a").eq(0).css({"backgroundImage":"url('/Home/images/index/course_list/breadcrumbBlue0.png')","color":"#fff"});
	})
    // 分页
    $.fn.pager = function(page, total, callback) {
    var html = '';
    html += '<a class="first" href="javascript:;">上一页</a>';
    var start = page - 5 < 0 ? 0 : page - 5;
    var end = page + 5 < total ? page + 5 : total;
    for (var i = start; i < end; i++) {
        html += i == page - 1 ? '<span>' + (i + 1) + '</span>' : '<a href="javascript:;">' + (i + 1) + '</a>';
    }
    html += '<a class="first" href="javascript:;">下一页</a>';
    $(this).html(html).find('a').click(function() {
        var p = $(this).text();
        if (p == '上一页') p = page == 1 ? 1 : page - 1;
        if (p == '下一页') p = page == total ? total : page + 1;
        if (p != page) callback(parseInt(p));
    });
}
onload = function() {
    //用用回调
    function go(p) {
        $('.pager').pager(p, 5, go);
    }
    $('.pager').pager(1, 5, go);
   }
})