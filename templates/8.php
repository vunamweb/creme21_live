<?php
/* pixel-dusche.de */

global $cid, $template8count, $templateTotal;
global $lasttref, $linkbox;

global $containerLink, $containerLinkText, $template8count, $templateTotal, $lastUsedTemplateID, $templateIsClosed, $templateCloseNow;
global $design, $cid, $tref, $farbe, $class, $tende, $tabstand, $tpos, $DoNotCloseTemplate, $anzahlOffenerDIV, $anker, $OffeneSection, $bild_box, $tabstand_bottom;
global $farbe_inner, $class_inner, $anker__link, $div__link;

$template = '';

$fileID = basename(__FILE__, '.php');

if($OffeneSection) $template .= '
			</section>
';
$OffeneSection = 0;

$template8count;

if(!$template8count || $template8count < 1) {
	$sql = "SELECT cid FROM morp_cms_content WHERE tid=$fileID AND navid=$cid AND ton=1 ORDER by tpos";
	$res = safe_query($sql);
	$templateTotal = mysqli_num_rows($res);

	$template8count = 1;
}
else $template8count++;



if($lastUsedTemplateID && $lastUsedTemplateID != $fileID && !$templateIsClosed) {
	for($i=1; $i<=$anzahlOffenerDIV; $i++) $template .= '					</div>
';

	$templateIsClosed=1;
}


if($template8count == 1 || $templateIsClosed) {
	$template .= '
        <div class="section_services">
            <div class="container">
                <div class="row">';
	$OffeneSection = 1;
	$anzahlOffenerDIV = 3;

	$templateIsClosed=0;
}

global $liste, $h2, $h4;

if($tref == 1 || !$tref) $template .= '
					<div class="col-12 col-md-6 col-lg-4">
                        <div class="box_services linkbox" ref="'.$div__link.'">
                            <h2>'.$h2.'</h2>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h4>'.$h4.'</h4>
                                </div>
                                <div class="col-12 col-md-6">
                                    <ul>
                                    	'.$anker__link.$liste.'
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
';
elseif($tref == 2) $template .= '
            <div class="col-md-3 mt4 linkbox"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#
            </div>

';



if(($template8count == $templateTotal || $tende) && !$templateIsClosed) {
	for($i=1; $i<=$anzahlOffenerDIV; $i++) $template .= '								</div>
';

	$template8count = 0;
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
$liste = '';
$h2 = '';
$h4='';
$anker__link = '';

?>