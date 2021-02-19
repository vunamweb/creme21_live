<?php
global $img_pfad, $ausrichtung, $ausrichtungArray, $dir, $produktBild, $imageFolder, $gallery, $galCT, $produktBildCt, $image_description;

$data = explode("|", $text); $imgid = $data[0]; $ausrichtung = $data[1]; if(!$ausrichtung) $ausrichtung = 1;

if(!$galCT) $galCT=1;

if(!$produktBildCt) $produktBildCt=1;
else $produktBildCt++;

if($text) {
	$que  	= "SELECT `longtext`, itext, imgname, name FROM `morp_cms_image` i, `morp_cms_img_group` g WHERE g.gid=i.gid AND imgid=$imgid";
	$res 	= safe_query($que);
	$rw     = mysqli_fetch_object($res);
	$itext 	= $rw->itext;
	$ltext 	= $rw->longtext;

	$inm 	= $rw->imgname;
	$altText = $itext ? $itext : repl("\n", " ", $ltext); if(!$altText) $altText = $morpheus["client"].' '.$inm;
	$folder	= str_replace(array(";", " / ", "/", "  ", " "), array("","-","-", "-", "-"), $rw->name);

	$produktBild .= '
			<div class="swiper-slide">
				<div class="hovereffect">
					<a ref="'.$galCT.'" class="openPopup info"><i class="fa fa-arrows"></i></a>
					<a ref="'.$galCT.'" class="openPopup"><img src="'.$dir.$imageFolder.urlencode($folder).'/'.urlencode($inm).'?w=600" alt="'.$altText.'" class="produktbild"></a>
				</div>
			</div>
';

	$gallery .= '								            <div class="swiper-slide"><img src="'.$dir.$imageFolder.urlencode($folder).'/'.urlencode($inm).'?w=600" class="img-fluid" alt="'.$altText.'" /><span>'.($image_description ? str_replace("®", "<sup>®</sup>", $image_description) : $altText).'</span></div>
';
}

$galCT++;

$morp = $inm;

$socialImage = urlencode($inm);
global $socialImg; if(!$socialImg) $socialImg = $dir.$imageFolder.urlencode($folder).'/'.($inm);

?>