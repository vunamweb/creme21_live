(function ($) {
	
	var attachEventHandlers = function() {
		if (typeof paypalpluscw_ajax_submit_callback != 'undefined') {
			$('.paypalpluscw-confirmation-buttons input').each(function () {
				$(this).click(function() {
					PayPalPlusCwHandleAjaxSubmit();
				});
			});
		}
	};
	
	var getFieldsDataArray = function () {
		var fields = {};
		
		var data = $('#paypalpluscw-confirmation-ajax-authorization-form').serializeArray();
		$(data).each(function(index, value) {
			fields[value.name] = value.value;
		});
		
		return fields;
	};
	
	var PayPalPlusCwHandleAjaxSubmit = function() {
		
		if (typeof cwValidateFields != 'undefined') {
			cwValidateFields(PayPalPlusCwHandleAjaxSubmitValidationSuccess, function(errors, valid){alert(errors[Object.keys(errors)[0]]);});
			return false;
		}
		PayPalPlusCwHandleAjaxSubmitValidationSuccess(new Array());
		
	};
	
	var PayPalPlusCwHandleAjaxSubmitValidationSuccess = function(valid) {
		
		if (typeof paypalpluscw_ajax_submit_callback != 'undefined') {
			paypalpluscw_ajax_submit_callback(getFieldsDataArray());

		}
		else {
			alert("No JavaScript callback function defined.");
		}
	}
		
	$( document ).ready(function() {
		attachEventHandlers();
		
		$('#paypalpluscw_alias').change(function() {
			$('#paypalpluscw-checkout-form-pane').css({
				opacity: 0.5,
			});
			$.ajax({
				type: 		'POST',
				url: 		'index.php?route=checkout/confirm',
				data: 		'paypalpluscw_alias=' + $('#paypalpluscw_alias').val(),
				success: 	function( response ) {
					var htmlCode = '';
					try {
						var jsonObject = jQuery.parseJSON(response);
						htmlCode = jsonObject.output;
					}
					catch (err){
						htmlCode = response;
					}
					
					var newPane = $("#paypalpluscw-checkout-form-pane", $(htmlCode));
					if (newPane.length > 0) {
						var newContent = newPane.html();
						$('#paypalpluscw-checkout-form-pane').html(newContent);
						attachEventHandlers();
					}
					
					$('#paypalpluscw-checkout-form-pane').animate({
						opacity : 1,
						duration: 100, 
					});
				},
			});
		});
		
	});
	
}(jQuery));