(function($) {$(document).ready(function(){
	var $window = $(window);
	$('#comment').addClass('form-control').attr('placeholder','Your Comment').attr('data-toggle','comment').attr('title','Please enter a comment!');
	if(($('.logged-in-as').length)<1){
		$('#comment').removeAttr('required');
		$('#commentform #submit').hide();
	}
	$('.comment-form-comment label').hide();
	$('.avatar').addClass('img-circle');
	$('#submit-button').click(function(){
		comment_form();
	});
});
})(jQuery);
function comment_form(){
	if (jQuery('#comment').val() == '') {
		jQuery('#comment').focus();
		jQuery("[data-toggle='comment']").tooltip('show');
		return;
	}
	jQuery("[data-toggle='comment']").tooltip('hide');
	if (jQuery('#name').val() == '') {
		jQuery('#name').focus();
		jQuery("[data-toggle='name']").tooltip('show');
		return;
	}
	jQuery("[data-toggle='comment']").tooltip('hide');
	if (jQuery('#email').val() == '') {
		jQuery('#email').focus();
		jQuery("[data-toggle='email']").tooltip('show');
		return;
	}
	jQuery("[data-toggle='email']").tooltip('hide');
	if(!isValidEmailAddress(jQuery('#email').val())){
		jQuery("[data-toggle='valid-mail']").tooltip('show');
		return;
	}
	jQuery("[data-toggle='valid-mail']").tooltip('hide');
	jQuery('#submit').click();
}(jQuery);
function isValidEmailAddress(email) {
	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	return pattern.test(email);
}