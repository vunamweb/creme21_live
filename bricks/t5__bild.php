<?php
global $img_pfad, $ausrichtung, $ausrichtungArray, $dir, $produktBild, $imageFolder, $gallery, $galCT, $image_description;

$data = explode("|", $text); $imgid = $data[0]; $ausrichtung = $data[1]; if(!$ausrichtung) $ausrichtung = 1;

if(!$galCT) $galCT=1;


if($text) {
	$que  	= "SELECT `longtext`, itext, imgname, name FROM `morp_cms_image` i, `morp_cms_img_group` g WHERE g.gid=i.gid AND imgid=$imgid";
	$res 	= safe_query($que);
	$rw     = mysqli_fetch_object($res);
	$itext 	= $rw->itext;
	$ltext 	= $rw->longtext;

	$inm 	= $rw->imgname;
	$altText = $itext ? $itext : repl("\n", " ", $ltext); if(!$altText) $altText = $morpheus["client"].' '.$inm;
	$folder	= str_replace(array(";", " / ", "/", "  ", " "), array("","-","-", "-", "-"), $rw->name);

	$produktBild = '<img src="'.$dir.$imageFolder.urlencode($folder).'/'.urlencode($inm).'?'.($inm == "leer.png" ? 'w=200&h=60' : 'w=200&h=200').'" alt="'.$altText.'" class="img-fluid">';

	$gallery .= '								            <div class="swiper-slide"><img src="'.$dir.$imageFolder.urlencode($folder).'/'.urlencode($inm).'?w=600" class="img-fluid" alt="'.$altText.'" /><span>'.($image_description ? $image_description : $altText) .'</span></div>
';
}

$morp = $inm;

$galCT++;

$socialImage = urlencode($inm);
global $socialImg; if(!$socialImg) $socialImg = $dir.$imageFolder.urlencode($folder).'/'.($inm);

?>