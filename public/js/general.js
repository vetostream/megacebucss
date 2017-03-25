$( document ).on('click','#a-ideas',function(){
	$(".header-profile").hide("slow");
	$(".research-profile").hide();
	$(".ideas-profile").show("slow");
});

$( document ).on('click','#a-research',function(){
	$(".header-profile").hide("slow");
	$(".ideas-profile").hide();
	$(".research-profile").show("slow");
});