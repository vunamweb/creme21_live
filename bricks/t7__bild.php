<?php
global $img_pfad, $ausrichtung, $ausrichtungArray, $dir, $imgGal, $morpheus, $headerImgCt, $imageFolder;
global $fliesstext, $headline, $tref;


$data = explode("|", $text); $imgid = $data[0]; $ausrichtung = $data[1]; if(!$ausrichtung) $ausrichtung = 1;

$w = 1500;


if(!$headerImgCt) $headerImgCt=1;
else $headerImgCt++;

if($imgid) {
	$que  	= "SELECT `longtext`, itext, text2, imgname, name FROM `morp_cms_image` i, `morp_cms_img_group` g WHERE g.gid=i.gid AND imgid=$imgid";
	$res 	= safe_query($que);
	$rw     = mysqli_fetch_object($res);
	$itext 	= $rw->itext;
	$ltext 	= $rw->longtext;
// 	if($ltext) $ltext = explode("\n", $ltext);
	$text2 	= $rw->text2;
	$inm 	= $rw->imgname;
	$altText = $itext ? $itext : $ltext; if(!$altText) $altText = $morpheus["client"].' '.$inm;
	$folder	= str_replace(array(";", " / ", "/", "  ", " "), array("","-","-", "-", "-"), $rw->name);

	$slogan = explode("\n", $ltext);
	$output .= '
                    <div class="carousel-cell">
                        <img src="'.$img_pfad.''.($inm).'" alt="'.$altText.'" class="sl deskt__img">
                        <img src="'.$img_pfad.'mobil_'.($inm).'" alt="" class="sl2 mobile__img">
						 '.($text2 ? '<h2 class="carousel_title">'.$text2.'</h2>' : '').'

		                <div class="box_label">
		                    <p class="mb-0">
								'.$slogan[0].'
								<span>
								'.$slogan[1].'
							</span></p>
		                </div>

                    </div>';
}

$morp = $inm;

$socialImage = urlencode($inm);
global $socialImg; if(!$socialImg) $socialImg = $dir.$imageFolder.urlencode($folder).'/'.($inm).'?w='.$w;
$fliesstext = '';
?>