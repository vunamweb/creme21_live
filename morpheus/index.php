<?php
session_start();
# # # # # # # # # # # # # # # # # # # # # # # # # # #
# www.pixel-dusche.de                               #
# björn t. knetter                                  #
# start 12/2003                                     #
#                                                   #
# post@pixel-dusche.de                              #
# frankfurt am main, germany                        #
# # # # # # # # # # # # # # # # # # # # # # # # # # #

include("cms_include.inc");


echo '

<style>
h2 { margin-bottom:.5em;

</style>


<div id="content_big" class="text">

<p><b>CMS Morpheus</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>

<br>
<img src="../images/logo_sm.png" alt="" class="img-fluid ">


<p>&nbsp;</p>

<h2 class="mt2">Seitenverwaltung</h2>
<ul>
	<li><a href="navigation.php">Seiten bearbeiten &raquo;</a></li>
</ul>

<p>&nbsp;</p>



<p>&nbsp;</p>

<!--
<h2>Bildformate</h2>

<div style="margin-top: 2em; margin-left: 4em;">
	<h3 style="margin-bottom: .5em;">Allgemein</h3>
	<p>Header-Bild Slider: 1500 x 598</p>

	<h3 style="margin-bottom: .5em; margin-top: 1.5em;">Referenzen</h3>
	<p>Header-Bild: 1500 x 598</p>
	<p>Quadratisch klein: 400 x 400</p>
	<p>Quadratisch groß: 800 x 800</p>
	<p>Breit 2/3: 800 x 400</p>
	<p>Breit komplett: 1200 x 400</p>

	<p>&nbsp;</p>

	<p>Referenz Übersicht: 400 x 310</p>
	<p>Referenz Startseite: 610 x 380</p>
</div>
-->

</div>
';

?>

<?php
include("footer.php");
?>