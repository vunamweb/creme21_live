<?php
global $img_pfad, $dir, $emotional, $socialImage, $imageFolder;

$imgid  = explode("|",$text);
$imgid = $imgid[0];

$w = 60;

if($text) {
	$que  	= "SELECT `longtext`, itext, imgname, name FROM `morp_cms_image` i, `morp_cms_img_group` g WHERE g.gid=i.gid AND imgid=$imgid";
	$res 	= safe_query($que);
	$rw     = mysqli_fetch_object($res);
	$itext 	= $rw->itext;
	$ltext 	= $rw->longtext;
	$inm 	= $rw->imgname;

	$name = explode(".", $inm);
	$name = explode("_", $name[0]);

	$altText = $itext ? $itext : $ltext; if(!$altText) $altText = $morpheus["client"].' '.$inm;
	$folder	= str_replace(array(";", " / ", "/", "  ", " "), array("","-","-", "-", "-"), $rw->name);

	$output .= '		<li><img src="'.$dir.$imageFolder.urlencode($folder).'/'.urlencode($inm).'?w='.$w.'" class="'.(isin('transparent', $name[1]) ? 'transp' : '').'" alt="'.$itext.'" /><p>'.str_replace(array(" ", "-", '|'), array("<br />", "-<br />", " "), $name[1]).'</p></li>';
}

$morp = $inm;
$socialImage = urlencode($inm);
global $socialImg; if(!$socialImg) $socialImg = $dir.$imageFolder.urlencode($folder).'/'.($inm).'?w='.$w;

?>