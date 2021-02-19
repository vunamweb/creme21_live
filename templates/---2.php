<?php
/* pixel-dusche.de */

global $cid, $template2count, $templateTotal;
global $lasttref, $linkbox;

global $containerLink, $containerLinkText, $template2count, $templateTotal, $lastUsedTemplateID, $templateIsClosed, $templateCloseNow;
global $design, $cid, $tref, $farbe, $class, $tende, $tabstand, $tpos, $DoNotCloseTemplate, $anzahlOffenerDIV, $anker;
global $class_inner, $farbe_inner, $kontaktCount;

global $parallax, $needBG, $needBGCounter;

global $popupText, $popupTarget;

global $prozessDesc, $prozessListe;


$template = '';

$fileID = basename(__FILE__, '.php');


if ($parallax) {
	$needBG = 1;
}

	if($needBG) { $needBGCounter++; }


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

	$template .= '
				</section>
';
	$templateIsClosed=1;
}


if($template2count == 1 || $templateIsClosed) { $template .= '
<section class="'.($tabstand ? ' mt6 ' : '').($tref == 5 ? ' mt0 mb0 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'; padding:4em 0 4em;"' : '').'>
	'.($parallax ? '<div class="parallax " style="background: url('.$parallax.') no-repeat top center fixed; -webkit-background-size: cover; background-size: cover;">' : '').'
    <div class="container content ">
        <div class="row each_row'.($tref == 12 ? ' mobileAbstand' : '').'">';
	$templateIsClosed=0;
}


if($tref == 1 || !$tref) $template .= '
            <div class="col-12 col-md-4 '.($needBG ? 'card card-block silverton-card' : '').'"'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'">
            '.($needBG ? '<div class="text-left">' : '').'
            '.($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'
            '.($needBG ? '</div>' : '').'
            </div>
';
elseif($tref == 2) $template .= '
            <div class="col-md-3  "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
            '.($needBG ? '<div class="text-left card card-block silverton-card">' : '').'
            '.($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'
            '.($needBG ? '</div>' : '').'
            </div>

';

//             <div class="'.($needBG ? 'col-md-5 mr-auto mt4 card card-block silverton-card ' : 'col-md-6 mt4').($needBGCounter > 1 ? ' offset-md-1' : '').' "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>'

elseif($tref == 3) $template .= '
            <div class="'.($needBG ? 'col-md-5 mr-auto  card card-block silverton-card ' : 'col-md-6 ').($needBGCounter > 1 ? ' offset-md-1' : '').' "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>'

            .($needBG ? '<div class="text-left">' : '').


            ($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'

            '.($needBG ? '</div>' : '').'

            </div>

';
elseif($tref == 4) $template .= '
            <div class="col-md-8  "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
            '.($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'
            </div>

';

elseif($tref == 5) {
	if(!$kontaktCount) $kontaktCount = 1;
	else $kontaktCount++;
	if($kontaktCount == 4) $kontaktCount = 1;

	$template .= '
            <div class="kontakt  k'.$kontaktCount.'">
            '.($class_inner ? '<div class="inner '.$class_inner .'">' : '<div class="w-100">').'
#cont#
            '.($class_inner ? '</div>' : '</div>').'
            </div>


';
}
elseif($tref == 6) $template .= '
            <div class="col-md-5 offset-md-1 mt4 "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
            '.($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'
            </div>

';
elseif($tref == 7) $template .= '
            <div class="col-md-5 mt4 "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
            '.($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'
            </div>

';
elseif($tref == 8) $template .= '
            <div class="col-md-7 offset-md-2 mt4 "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
            '.($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'
            </div>
            <div class="col-md-3"> &nbsp; </div>
';
elseif($tref == 9) $template .= '
            <div class="col-md-5 offset-md-4 mt4 "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
            '.($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'
            </div>
            <div class="col-md-3"> &nbsp; </div>
';
elseif($tref == 10) $template .= '
            <div class="col-12'.($needBG ? ' card card-block silverton-card silverton-card2 maritime-card' : '').' "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>
#cont#

				'.($prozessDesc ? $prozessDesc : '').'
            </div>

';
elseif($tref == 11) $template .= '
            <div class="col-12 col-md-4">
            </div>
';
elseif($tref == 12) $template .= '
            <div class="'.($needBG ? 'col-md-6 mr-auto mt4 card card-block silverton-card mobileOneDIV ' : 'col-md-6 mt4').' "'.($linkbox ? ' ref="'.$linkbox.'"' : '').($anker ? ' id="'.$anker.'"' : '').'>'

            .($needBG ? '<div class="text-left">' : '').


            ($class_inner ? '<div class="inner '.$class_inner .'">' : '').'
#cont#
            '.($class_inner ? '</div>' : '').'

            '.($needBG ? '</div>' : '').'

            </div>

';



if(($template2count == $templateTotal || $tende) && !$templateIsClosed) {
	for($i=1; $i<=$anzahlOffenerDIV; $i++) $template .= '					</div>
';

	$template .= '
				</section>
';
	$template2count = 0;
	$templateTotal = 0;
	$templateIsClosed = 1;
	$tende = 0;

	$needBG = 0;
	$needBGCounter = '';
}

$lastUsedTemplateID = $fileID;
$anzahlOffenerDIV = $parallax ? 3 : 2;

$farbe='';
$class='';
$tabstand = '';
$anker = '';
//$class_inner = '';
$parallax = '';



// SPECIAL POPUP TEXT

if($popupTarget && $popupText) $template .= '

<!-- popup Text -->
<div class="modal">
	<div class="modal-body">
		<div class="row" id="'.$popupTarget.'">
			<div class="block mobilePad">
'.$popupText.'
			</div>
		</div>
	</div>
</div>

';




$popupTarget = '';
$popupText = '';

?>