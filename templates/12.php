<?php
/* pixel-dusche.de */
global $ilink, $jsFunc, $bgImage;

$template = '
<section class="mt0">
	<div class="master-slider ms-skin-default" id="masterslider">

#cont#

	</div>

</section>
';


$jsFunc = '
	<script type="text/javascript">
	    var slider = new MasterSlider();

	    slider.control(\'arrows\');
	    slider.control(\'timebar\' , {insertTo:\'#masterslider\'});
	    slider.control(\'bullets\');

	     slider.setup(\'masterslider\' , {
	         width:1500,
	         height:460,
	         space:1,
	         layout:\'fullwidth\',
//	         loop:true,
	         preload:0,
	         instantStartLayers:true,
	         autoplay:true
	    });

	</script>
';

?>