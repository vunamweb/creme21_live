<?php
/* pixel-dusche.de */

global $cid, $template2count, $templateTotal;
global $lasttref, $linkbox;

global $containerLink, $containerLinkText, $template2count, $templateTotal, $lastUsedTemplateID, $templateIsClosed, $templateCloseNow;
global $design, $cid, $tref, $farbe, $class, $tende, $tabstand, $tpos, $DoNotCloseTemplate, $anzahlOffenerDIV, $anker, $OffeneSection, $bild_box, $tabstand_bottom;
global $farbe_inner, $class_inner, $klasse;

$template = '';

$fileID = basename(__FILE__, '.php');

if($OffeneSection) $template .= '
			</section>
';
$OffeneSection = 0;

$template2count;

if(!$template2count || $template2count < 1) {
	$sql = "SELECT cid FROM morp_cms_content WHERE tid=$fileID AND navid=$cid AND ton=1 ORDER by tpos";
	$res = safe_query($sql);
	$templateTotal = mysqli_num_rows($res);

	$template2count = 1;
}
else $template2count++;



if($lastUsedTemplateID && $lastUsedTemplateID != $fileID && !$templateIsClosed) {
	for($i=1; $i<=$anzahlOffenerDIV; $i++) $template .= '					</div>
';


/*
	$template .= '
								</div>
';
*/

	$templateIsClosed=1;
}


/*
if($template2count == 1 || $templateIsClosed) { $template .= '
<section class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container content cta-div">
        <div class="row">';
	$templateIsClosed=0;
}
*/
if($template2count == 1 || $templateIsClosed) {
	if($design == 3) {
		$anzahlOffenerDIV = 1;
	}
	else {
		$template .= '
						<div class="container-full '.($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
							<div class="container">';
		$OffeneSection = 1;
		$anzahlOffenerDIV = 3;
	}

	$template .= '
								<div class="row">';
	$templateIsClosed=0;
}



if($tref == 1 || !$tref) $template .= '
            						<div class="col-md-4 '.($tabstand ? ' mt4 ' : '').' '.$klasse.'"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#
            						</div>
';
elseif($tref == 2) $template .= '
            <div class="col-md-3 mt4"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#
            </div>

';
elseif($tref == 3) $template .= '
            						<div class="col-12 col-md-6 '.$klasse.' '.($class_inner).'"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
<div class="about">#cont#</div>
            						</div>

';
elseif($tref == 4) $template .= '
            						<div class="col-md-8 '.($tabstand ? ' mt4 ' : '').' '.$klasse.'"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#
           							</div>

';

elseif($tref == 5) $template .= '
                                <div class="col-12 col-md-6'.($tabstand ? ' pt4 ' : '').($tabstand_bottom ? ' pb4 ' : '').' '.$klasse.'">
									<div class="box_info">
                                        <div class="box_info_img">
                                            '.$bild_box.'
                                        </div>
                                        <div class="box_info_content">
#cont#
                                        </div>
                                    </div>
                                </div>
';

elseif($tref == 6) $template .= '

                        <div class="col-6 col-md-6 '.$klasse.'">
                            <div class="main_products_item">
                                <a href="'.$dir.'" class="products_item">
                                    <h2>OtOPLastiken</h2>
                                    <div class="products_item_img products_item_img_main">
                                            '.$bild_box.'
                                    </div>
                                </a>
                            </div>
                        </div>
';

/*

if($tref == 1 || !$tref) $template .= '
            <div class="col-md-4 mt4"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#
            </div>
';
elseif($tref == 2) $template .= '
            <div class="col-md-3 mt4"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#
            </div>

';
elseif($tref == 3) $template .= '
            <div class="col-md-6 mt4"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#
            </div>

';
elseif($tref == 4) $template .= '
            <div class="col-md-8 mt4"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#
            </div>

';

elseif($tref == 5) $template .= '

';
*/



if(($template2count == $templateTotal || $tende) && !$templateIsClosed) {
	for($i=1; $i<=$anzahlOffenerDIV; $i++) $template .= '								</div>
';

/*
	$template .= '
								</div>
';
*/

	$template2count = 0;
	$templateTotal = 0;
	$templateIsClosed = 1;
	$tende = 0;
}

$lastUsedTemplateID = $fileID;
// $anzahlOffenerDIV = 0;

$farbe='';
$class='';
$tabstand = '';
$anker = '';
$bild_box = '';
$class_inner = '';

?>