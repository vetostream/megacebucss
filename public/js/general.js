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
	var usertype = tr.find(':selected').val();
	var userid   = tr.data('id');

	$.post('/superadmin/changeRole',
	{
		user_id: userid,
		usertype: usertype,
		_token: $('meta[name="csrf-token"]').attr('content')
	}, function(data, status)
	{
		Materialize.toast('User type updated!', 3000);
	})
})

// $( document ).on('click','button[name="post-comment"]',function(e){
// 	e.preventDefault();
// 	$form = $("form[name='comment-form']");
	
// 	$data = $form.serialize();
// 	console.log("Data serialized: " + $data);

// 	$form.submit();
// });