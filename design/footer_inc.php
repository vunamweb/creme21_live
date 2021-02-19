<script src="<?php echo $dir; ?>shop/catalog/view/javascript/jquery/jquery-2.1.1.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.minzzz.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> !-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/fitodac/bsnav@master/dist/bsnav.min.js"></script>
<script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="<?php echo $dir; ?>js/functions.js"></script>

<script>
	function setRightLanguage() {
		var widthXl = $('main .container-xl').width();
		var widthNavbar = $('nav').width();

		var rightLanguage = (((widthXl - widthNavbar) / 2) - 15) * (-1);

		$('#form-language').css('right', '' + rightLanguage + 'px')
	}

	setRightLanguage();

	var cart = {
		'remove': function(key, key1) {
			$.ajax({
				url: 'shop/index.php?route=checkout/cart/remove',
				type: 'post',
				data: 'key=' + key,
				dataType: 'json',
				beforeSend: function() {
					$('#cart > button').button('loading');
				},
				complete: function() {
					$('#cart > button').button('reset');
				},
				success: function(json) {
					// Need to set timeout otherwise it wont update the total
					setTimeout(function() {
						$('#cart > button #cart-total').html(json['total']);
						$('#cart > button .total-price').html(json['total_price']);
						$('#cart > ul').load('shop/index.php?route=common/cart/info ul li');
					}, 100);

					if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
						location = 'shop/index.php?route=checkout/cart';
					} else {
						$('#cart > ul').load('shop/index.php?route=common/cart/info ul li');
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}
	$(function() {
		$('a.page-scroll').bind('click', function(event) {
			var $anchor = $(this).attr('href');
			$anchor = $anchor.split('#');

			$('html, body').stop().animate({
				scrollTop: $("#" + $anchor[1]).offset().top - 100
			}, 1500, 'easeInOutExpo');

			$(".collapse").removeClass("show");
			event.preventDefault();
		});
	});


	$(document).ready(function() {
		target = window.location.hash;

		// alert(target);
		if (target) {
			$("html, body").animate({
				scrollTop: 0
			}, 0);
			$('html, body').stop().animate({
				scrollTop: $(target).offset().top - 10
			}, 2500, 'easeInOutExpo');
		}
	});
</script>

<?php
if (!isset($_COOKIE["disclaimer"])) {
	$sprungID = array("de" => 8, "en" => 37,);
	$mail = $morpheus["email"];
	$kunde = $morpheus["client"];
	$wl = $lan == "de" ? "Weiterlesen" : "Continue reading";
	$ac = $lan == "de" ? "Ich akzeptiere" : "I accept";
?>
	<div id="cookie_disclaimer" style="display: none">
		<div>
			<?php echo $kunde;
			echo $lan == "de" ? ' benutzt Cookies, um seinen Benutzern das beste Webseiten-Erlebnis zu ermöglichen. Außerdem werden teilweise auch Cookies von Diensten Dritter gesetzt. Weiterführende Informationen erhalten Sie in der Datenschutzerklärung. ' : ' uses cookies to give its users the best website experience. In addition, some cookies are also set by third party services. Further information can be found in the privacy policy. '; ?>
			<a href="<?php echo $dir . $navID[$sprungID[$lan]]; ?>" title="<?php echo $wl; ?> …"><?php echo $wl; ?> …</a>
			<a href="#" id="cookie_stop"><?php echo $ac; ?></a>
		</div>
	</div>

	<style>
		/********COOKIES*******/
		#cookie_disclaimer {
			position: fixed;
			bottom: 50px;
			z-index: 9999999;
			width: 300px;
			background: #fff;
			left: 50%;
			margin-left: -150px;
			color: #666;
			padding: 10px;
			line-height: 1.5em;
			-webkit-box-shadow: 0px 6px 22px 0px rgba(0, 0, 0, 0.75);
			-moz-box-shadow: 0px 6px 22px 0px rgba(0, 0, 0, 0.75);
			box-shadow: 0px 6px 22px 0px rgba(0, 0, 0, 0.75);
		}

		#cookie_disclaimer a {
			color: #666;
			text-decoration: underline;
		}

		#cookie_disclaimer p {
			color: #fff;
		}

		#cookie_stop {
			float: right;
			padding: 5px 35px;
			background: #5C2D91;
			color: #fff !important;
			text-decoration: none !important;
			border-radius: 10px;
			margin-right: 50px;
			margin-top: 20px;
			text-decoration: none;
		}

		/********END*******/
	</style>
	<!-- Cookies -->
	<script type="text/javascript">
		$(function() {
			$('#cookie_stop').click(function() {
				$('#cookie_disclaimer').slideUp("slow");

				var nDays = 60;
				var cookieName = "disclaimer";
				var cookieValue = "true";

				var today = new Date();
				var expire = new Date();
				expire.setTime(today.getTime() + 3600000 * 24 * nDays);
				document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString() + ";path=/";
			});
		});
	</script>
	<!-- END COOKIES-->
<?php } ?>

</body>

</html>