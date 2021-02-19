<?php
global $img_pfad, $ausrichtung, $ausrichtungArray, $dir, $img__header, $templ_id;

$data = explode("|", $text); $imgid = $data[0]; $ausrichtung = $data[1]; if(!$ausrichtung) $ausrichtung = 1;

if($text) {
	$que  	= "SELECT itext, imgname, `longtext` FROM `morp_cms_image` WHERE imgid=$imgid";
	$res 	= safe_query($que);
	$rw     = mysqli_fetch_object($res);
	$itext 	= $rw->itext;
	$ltext 	= $rw->longtext;

	$inm 	= $rw->imgname;
	$altText = $itext ? $itext : $ltext; if(!$altText) $altText = $morpheus["client"].' '.$inm;

	$img__header = '<img src="'.$img_pfad.urlencode($inm).'" class="img-fluid" alt="'.($ltext ? $ltext : $inm).'" />';

}

$morp = $inm;

$socialImage = urlencode($inm);

?>