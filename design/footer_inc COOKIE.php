<?php global $masonry; ?>

<footer class="pt4 pb4">
    <div class="container">
        <div class="row">

<?php echo getVorlagenText(58, $lang, $dir); ?>
<?php echo getVorlagenText(59, $lang, $dir); ?>
<?php echo getVorlagenText(60, $lang, $dir); ?>

            <div class="col-md-3 col-xs-12 box ra">
	            <ul class="meta">
<?php echo $nav_meta; ?>
	            </ul>
            </div>

        </div>
    </div>
</footer>

<script src="<?php echo $dir; ?>js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="<?php echo $dir; ?>js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $dir; ?>js/swiper.min.js" type="text/javascript"></script>
<script src="<?php echo $dir; ?>js/ekko-lightbox.min.js" type="text/javascript"></script>
<?php if($masonry) { ?>
<script src="<?php echo $dir; ?>js/isotope.pkgd.js"></script>
<?php } ?>

<script>
<?php if($masonry) { ?>
$('.grid').isotope({
  itemSelector: '.grid-item',
  masonry: {
    columnWidth: 300,
    isFitWidth: true,
    gutter: 10
  }
});
<?php } ?>

$(document).ready(function(){
<?php if(!$masonry) { ?>
	$("#loader").fadeOut("slow", function(){
		$("section").fadeIn("slow");
		$("footer").fadeIn("slow");
	});
<?php } ?>

	$('.linkbox, .cta-container, .cta-produkt').on("click", function() {
  		ref = $(this).attr("ref");
  		location.href = ref;
  		// console.log(ref);
  	});
});

$('.dropdown-toggle').on('click', function() {
  if ($(this).next().is(':visible')) {
    location.href = $(this).attr('href');
 }
});

</script>

<?php
	$sprungID = array("de"=>23, "en"=>37, "fr"=>133, "it"=>104, "es"=>75, );
	$mail = "info@geoas.de";
	$kunde = "geoas.de";
	$wl = $lan == "de" ? "Weiterlesen" : "Continue reading";
	$ac = $lan == "de" ? "Ich akzeptiere" : "I accept";

	if (!isset($_COOKIE["disclaimer"])){?>
    <div id="cookie_disclaimer">
        <div>
            <?php echo $kunde; echo $lan == "de" ? ' benutzt Cookies, um seinen Benutzern das beste Webseiten-Erlebnis zu ermöglichen. Außerdem werden teilweise auch Cookies von Diensten Dritter gesetzt. Weiterführende Informationen erhalten Sie in der Datenschutzerklärung. ' : ' uses cookies to give its users the best website experience. In addition, some cookies are also set by third party services. Further information can be found in the privacy policy. '; ?>
			<a href="<?php echo $dir.$lan.'/'.$navID[$sprungID[$lan]]; ?>" title="Weiterlesen …"><?php echo $wl; ?> …</a>
            <a href="#" id="cookie_stop"><?php echo $ac; ?></a>
        </div>
    </div>
<?php }?>
</body>
</html>
<?php
	if (!isset($_COOKIE["disclaimer"])){?>

<!-- Cookies -->
<script type="text/javascript">
$(function(){
     $('#cookie_stop').click(function(){
        $('#cookie_disclaimer').hide();

        var nDays = 60;
        var cookieName = "disclaimer";
        var cookieValue = "true";

        var today = new Date();
        var expire = new Date();
        expire.setTime(today.getTime() + 3600000*24*nDays);
        document.cookie = cookieName+"="+escape(cookieValue)+";expires="+expire.toGMTString()+";path=/";
     });
});
</script>
<!-- END COOKIES-->
<?php }?>

</body>
</html>
