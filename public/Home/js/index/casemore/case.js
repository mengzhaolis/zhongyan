$(function(){
	$(".fiveCase").find("em").click(function(){
		var $this=$(this);
		$this.addClass("changeColor").siblings().removeClass("changeColor");
		$this.parent("dd").siblings().find("em").removeClass("changeColor");
	});
	$(".eightService").find("em").click(function(){
		var $this=$(this);
		$this.addClass("changeColor").siblings().removeClass("changeColor");
	});
})