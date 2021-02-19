<?php
if($_COOKIE['language'] == 'en-gb')
 include("nogo/nav_en.inc");
else
 include("nogo/nav_de.inc");

echo $nav;
?>
<script >
$(document).ready(function () {
	var total = $('#cart .table .text-right').html();
	$('#cart .total-price').html(total);
});
</script>