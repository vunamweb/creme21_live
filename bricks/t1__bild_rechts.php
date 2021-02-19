<?php
global $img_pfad, $dir, $emotional, $socialImage, $imageFolder;

$imgid  = explode("|",$text);
$imgid = $imgid[0];

$w = 100;

if($text) {
	$que  	= "SELECT `longtext`, itext, imgname, name FROM `morp_cms_image` i, `morp_cms_img_group` g WHERE g.gid=i.gid AND imgid=$imgid";
	$res 	= safe_query($que);
	$rw     = mysqli_fetch_object($res);
	$itext 	= $rw->itext;
	$ltext 	= $rw->longtext;
	$inm 	= $rw->imgname;
	$altText = $itext ? $itext : $ltext; if(!$altText) $altText = $morpheus["client"].' '.$inm;
	$folder	= str_replace(array(";", " / ", "/", "  ", " "), array("","-","-", "-", "-"), $rw->name);

	$output .= '		<img src="'.$$dir.$imageFolder.urlencode($folder).'/'.($inm).'?w='.$w.'" class="img-fluid pull-right img-right" alt="'.$itext.'" />';
}

$morp = $inm;
$socialImage = urlencode($inm);
global $socialImg; if(!$socialImg) $socialImg = $dir.$imageFolder.urlencode($folder).'/'.($inm).'?w='.$w;

?>