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

$(document).on('click', '#btn-edit-user-type', function()
{
	var tr = $(this).parent().parent();
	var usertype     = tr.find(':selected').val();
	var usertypeText = tr.find(':selected').text();
	var userid   = tr.data('id');
	var username = tr.data('name');

	$.post('/superadmin/changeRole',
	{
		user_id: userid,
		usertype: usertype,
		_token: $('meta[name="csrf-token"]').attr('content')
	}, function(data, status)
	{
		Materialize.toast(username + '\'s user type updated to ' + usertypeText, 3000);
	})
})

$('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      limit: Infinity,
      minLength: 1
    }
});

$( document ).on('click','#post-like-a',function(){
	$formData = $("form[name='like-form']").serialize();
	$.ajax({
		url:'/posts/like',
		method:'get',
		data:$formData,
		dataType:'text'
	}).done(function(result){
		if (result === '1'){
			//$number_likes = $("input[name='number_likes']").val();
			$number_likes = $("#likecount").text();
			Materialize.toast('Post liked!', 3000, 'rounded');
			$('#likecount').text(parseInt($number_likes) + 1);
			$('#post-like-a').hide();
			$('#post-unlike-a').show();
		}else{
			Materialize.toast('Something went wrong.', 3000, 'rounded');
		}
	}).fail(function(result){
			Materialize.toast('Something went wrong.' + result, 3000, 'rounded');
	});
});


$( document ).on('click','#post-unlike-a',function(){
	$formData = $("form[name='like-form']").serialize();
	$.ajax({
		url:'/posts/unlike',
		method:'get',
		data:$formData,
		dataType:'text'
	}).done(function(result){
		if (result === '1'){
			//$number_likes = $("input[name='number_likes']").val();
			$number_likes = $("#likecount").text();
			Materialize.toast('Post unliked!', 3000, 'rounded');
			$('#likecount').text(parseInt($number_likes) - 1);
			$('#post-unlike-a').hide();
			$('#post-like-a').show();
		}else{
			Materialize.toast('Something went wrong.', 3000, 'rounded');
		}
	}).fail(function(result){
			Materialize.toast('Something went wrong.' + result, 3000, 'rounded');
	});
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