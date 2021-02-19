(function ($) {
	
	var attachEventHandlers = function() {
		if (typeof saferpaycw_ajax_submit_callback != 'undefined') {
			$('.saferpaycw-confirmation-buttons input').each(function () {
				$(this).click(function() {
					SaferpayCwHandleAjaxSubmit();
				});
			});
		}
	};
	
	var getFieldsDataArray = function () {
		var fields = {};
		
		var data = $('#saferpaycw-confirmation-ajax-authorization-form').serializeArray();
		$(data).each(function(index, value) {
			fields[value.name] = value.value;
		});
		
		return fields;
	};
	
	var SaferpayCwHandleAjaxSubmit = function() {
		
		if (typeof cwValidateFields != 'undefined') {
			cwValidateFields(SaferpayCwHandleAjaxSubmitValidationSuccess, function(errors, valid){alert(errors[Object.keys(errors)[0]]);});
			return false;
		}
		SaferpayCwHandleAjaxSubmitValidationSuccess(new Array());
		
	};
	
	var SaferpayCwHandleAjaxSubmitValidationSuccess = function(valid) {
		
		if (typeof saferpaycw_ajax_submit_callback != 'undefined') {
			saferpaycw_ajax_submit_callback(getFieldsDataArray());

		}
		else {
			alert("No JavaScript callback function defined.");
		}
	}
		
	$( document ).ready(function() {
		attachEventHandlers();
		
		$('#saferpaycw_alias').change(function() {
			$('#saferpaycw-checkout-form-pane').css({
				opacity: 0.5,
			});
			$.ajax({
				type: 		'POST',
				url: 		'index.php?route=checkout/confirm',
				data: 		'saferpaycw_alias=' + $('#saferpaycw_alias').val(),
				success: 	function( response ) {
					var htmlCode = '';
					try {
						var jsonObject = jQuery.parseJSON(response);
						htmlCode = jsonObject.output;
					}
					catch (err){
						htmlCode = response;
					}
					
					var newPane = $("#saferpaycw-checkout-form-pane", $(htmlCode));
					if (newPane.length > 0) {
						var newContent = newPane.html();
						$('#saferpaycw-checkout-form-pane').html(newContent);
						attachEventHandlers();
					}
					
					$('#saferpaycw-checkout-form-pane').animate({
						opacity : 1,
						duration: 100, 
					});
				},
			});
		});
		
	});
	
}(jQuery));