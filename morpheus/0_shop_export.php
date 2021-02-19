<?php
session_start();
error_reporting("none");
# # # # # # # # # # # # # # # # # # # # # # # # # # #
# www.pixel-dusche.de                               #
# bj&ouml;rn t. knetter                             #
# start 12/2003                                     #
#                                                   #
# post@pixel-dusche.de                              #
# frankfurt am main, germany                        #
# # # # # # # # # # # # # # # # # # # # # # # # # # #

		include("../nogo/config.inc");
		include("cms_header.php");
		include("../nogo/db.php");
		dbconnect();
		include("../nogo/funktion.inc");

// $sp = array("pid", "pname", "artnr", "ansicht", "farbnr", "ptyp", "pshop", "psize", "pw", "ph", "pdate", "pgid", "edit", "thumb", "bezeichnung");

//	mail('post@pixel-dusche.de', 'chung shi', 'start csv export');

$sql = "SELECT * FROM morp_media WHERE pshop=1";
$res = safe_query($sql);
$txt = "img,artnr,ansicht\n";

while($row = mysql_fetch_object($res)) {
	$img=$row->pname;
	$artnr=$row->artnr;
	$ansicht=$row->ansicht;

	$artnr=explode(",", $artnr);
	foreach($artnr as $val) {
		$an = trim($val);
		$txt .= "$img,$an,$ansicht\r\n";
	}

}

	save_data("../secure/shop.csv",$txt,"w+");


//	mail('post@pixel-dusche.de', 'chung shi', 'fertig csv export'.substr($txt, 0, 400));
echo "erfolgreich";
?>