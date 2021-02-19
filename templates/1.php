<?php
/* pixel-dusche.de */
global $hl, $design, $itext, $startDIV, $anker, $h1, $bgIMG;
global $fileID, $lastUsedTemplateID, $tabstand, $tabstand_bottom, $anker, $templateIsClosed, $closeDL, $isDownload, $tschmal, $OffeneSection;
global $farbe_inner, $class_inner, $downloadButton, $count_single_template, $klasse;


$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;

if(!$count_single_template) $count_single_template = 1;
else $count_single_template++;

if($OffeneSection) $template .= '
			</section>
';
$OffeneSection = 0;


if($tref == 1 || !$tref) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="t'.$count_single_template.($klasse ? ' '.$klasse : '').'">
    <div class="container '.($tabstand ? ' pt2 ' : '').' '.($tabstand_bottom ? ' pb4 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
        <div class="row">
            <div class="col-12'.($tschmal ? ' col-md-10 offset-md-1' : '').'">
            '.$downloadButton.'
#cont#
            </div>
        </div>
    </div>
</section>
';
elseif($tref == 2) $template = '
<section class="section_experience t'.$count_single_template.' '.($klasse ? ' '.$klasse : '').($class ? ' '.$class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'" '.($anker ? ' id="'.$anker.'"' : '').'>
    <div class="container '.($tabstand ? ' pt2 ' : '').' '.($tabstand_bottom ? ' pb4 ' : '').'">
        <div class="row each_row">
            <div class="col-12 text-center'.($tschmal ? ' col-md-10 offset-md-1' : '').'">
#cont#
            </div>
        </div>
    </div>
</section>
';
elseif($tref == 3) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="t'.$count_single_template.' '.($tabstand ? ' pt2 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container-full pad0 '.($tabstand ? ' pt2 ' : '').'">
#cont#
    </div>
</section>

';
elseif($tref == 4) $template = '
<section class="section_general"'.($anker ? ' id="'.$anker.'"' : '').'>
	    <div class="container t'.$count_single_template.' '.($tabstand ? ' mt4 mb0 pt2' : '').' '.($tabstand_bottom ? ' mt4 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
	        <div class="row">
	            <div class="col-12'.($tschmal ? ' ' : '').'">
	#cont#
	            </div>
	        </div>
	    </div>
	</div>
</section>
';

$templateIsClosed = 1;

$hl = '';
$farbe = '';
$class = '';
// $bgIMG = '';
$itext = '';
$closeDL = '';
// $downloadButton = '';

?>