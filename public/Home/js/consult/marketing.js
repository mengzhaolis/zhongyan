$(function(){
	$(".advantageLeft").find("li").hover(function(){
		var $this=$(this);
		var $index=$this.index();
		$this.find("div").addClass("changeBackground");
		$this.find("img").attr("src","/Home/images/consult/advantageTint"+$index+".png");
	},function(){
		var $this=$(this);
		var $index=$this.index();
		$this.find("div").removeClass("changeBackground");
		$this.find("img").attr("src","/Home/images/consult/advantageDark"+$index+".png");
	})
		$(".advantageRight").find("li").hover(function(){
		var $this=$(this);
		var $index=$this.index()+3;
		$this.find("div").addClass("changeBackground");
		$this.find("img").attr("src","/Home/images/consult/advantageTint"+$index+".png");
	},function(){
		var $this=$(this);
		var $index=$this.index()+3;
		$this.find("div").removeClass("changeBackground");
		$this.find("img").attr("src","/Home/images/consult/advantageDark"+$index+".png");
	})
})