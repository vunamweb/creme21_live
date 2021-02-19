(function($) {
	
	
	var disableElements = function() {

		// Enable all
		$('.saferpaycw-control-box').each(function () {
			$(this).find('input').prop('disabled', false);
			$(this).find('select').prop('disabled', false);
			$(this).find('textarea').prop('disabled', false);
		});
		
		// Disable selected
		$('.saferpaycw-use-default .saferpaycw-control-box').each(function () {
			$(this).find('input').prop('disabled', true);
			$(this).find('select').prop('disabled', true);
			$(this).find('textarea').prop('disabled', true);
		});
	};

	$(document).ready(function() {
		$(".saferpaycw-default-box input").click(function() {
			$(this).parents(".control-box-wrapper").toggleClass('saferpaycw-use-default');
			disableElements();
		});
		disableElements();
	});

})(jQuery);
