function setRightLanguage() {
	var widthXl = $('main .container-xl').width();
	var widthNavbar = $('nav').width();

	var rightLanguage = (((widthXl - widthNavbar)/2) -15) * (-1);

	$('#form-language').css('right',''+rightLanguage+'px')
}

function animationHide(container) {
	container.hide();
}

function animationShow(container) {
	container.show();
}

function search() {
	var search_category_id = ($(".search_category select").val() != 0) ? $(".search_category select").val() : 'category';
	var search_product_type = ($(".search_product_type select").val() != -1) ? $(".search_product_type select").val() : 'product_type';
	var search_product_attribute = ($(".search_product_attribute select").val() != 0) ? $(".search_product_attribute select").val() : 'product_attribute';

	$('.product-layout').each(function () {
		var category_id = $(this).attr("category");
		var product_type = $(this).attr("product_type");
		var product_attribute = $(this).attr("product_attribute");
		

		if (category_id.indexOf(search_category_id) == -1 || product_type.indexOf(search_product_type) == -1 || product_attribute.indexOf(search_product_attribute) == -1)
			animationHide($(this));
		else
			animationShow($(this));
	})

	$('.bg-top-category').each(function () {
		if (!$(this).hasClass(search_category_id))
			animationHide($(this));
		else
			animationShow($(this));
	})
}

$(document).ready(function () {
	setRightLanguage();

	$('.cta').click(function () {
		event.preventDefault();
		ref = $(this).attr("ref");
		console.log(ref);
		location.href = ref;
	});
	$('#cookie_stop').click(function () {
		//alert('dd');
		event.preventDefault();
		$('#cookie_disclaimer').slideUp();
		var nDays = 60;
		var cookieName = "disclaim";
		var cookieValue = "true";
		var today = new Date();
		var expire = new Date();
		expire.setTime(today.getTime() + 3600000 * 24 * nDays);
		document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString() + ";path=/";
	});

	

	$('.product-thumb .col-des').click(function () {
		//$(this).find('.caption a').click();
		//var href = $(this).find('.caption').find('a').attr('href');
		//window.location.href = 'http://24h.com.vn';
		//alert($(this).attr('class'));
	})	

	$('.navbar_category select').change(function () {
		animationShow($('.loading'));

		setTimeout(function () {
			search();
			animationHide($('.loading'));
		}, 500);
	});

	$('#checkout-checkout .panel-heading').click(function(){
		$(".collapse.show").each(function(){
			$(this).removeClass('show');
		});
	})
});