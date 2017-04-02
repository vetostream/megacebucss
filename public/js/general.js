$( document ).on('click','#a-ideas',function(){
	$(".header-profile").hide("slow");
	$(".research-profile").hide();
	$("#profile-li").css('display','inline-block');
	$(".ideas-profile").show("slow");
});

$( document ).on('click','#a-research',function(){
	$(".header-profile").hide("slow");
	$(".ideas-profile").hide();
	$("#profile-li").css('display','inline-block');
	$(".research-profile").show("slow");
});

$( document ).on('click','#a-profile',function(){
	$("#profile-li").hide();
	$(".research-profile").hide();
	$(".ideas-profile").hide();
	$(".header-profile").show("slow");
});

$( document ).on('click','#fund-research',function(){
	$("form[name='fund-form'").submit();
});

$('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      limit: Infinity,
      minLength: 1
    }
});

//$( document ).on('submit','form[name="search-form"]',function(e){
//	e.preventDefault();
//	var formData = $("form[name='search-form']").serialize();
//	console.log("Data serialized from form " + formData);
//	
//	$.ajax({
//		url:'/search/everything',
//		method:'get',
//		data:formData,
//		dataType:'json'
//	}).done(function(response){
//		console.log(response);
//		if(response.tags.length === 0){
//			
//		}
//	}).fail(function(response){
//		console.log("Something went wrong while searching. " + response);
//	});
//
//});

//$(".fixed-len").keydown(function(event){
//	var datum = $('.chips-autocomplete').material_chip('data');
//	if(event.which == 13){
//		console.log(datum);
//		//$.ajax({
//		//	url:''
//		//});
//	}
//});

//$( document ).on('submit','form[class="search-auto"]',function(e){
//	e.preventDefault();
//	alert("test");
//});
// $( document ).on('click','button[name="post-comment"]',function(e){
// 	e.preventDefault();
// 	$form = $("form[name='comment-form']");
	
// 	$data = $form.serialize();
// 	console.log("Data serialized: " + $data);

// 	$form.submit();
// });