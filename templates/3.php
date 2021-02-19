<?php
/* pixel-dusche.de */
global $hl, $design, $itext, $startDIV, $anker, $h1, $bgIMG, $slogan;
global $fileID, $lastUsedTemplateID, $tabstand, $tabstand_bottom, $anker, $templateIsClosed, $closeDL, $isDownload, $anzahlOffenerDIV, $OffeneSection;
global $grImg, $tschmal, $class, $farbe;

$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;

if($OffeneSection) $template .= '
			</section>			
';
$OffeneSection = 0;

if($tref == 1 || !$tref) $template = '
<section class="'.($tabstand ? 'pt4 ' : '').($tabstand_bottom ? 'pb4 ' : '').($class ? $class : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').' '.($anker ? ' id="'.$anker.'"' : '').'>
    <div class="container">
        <div class="row each_row ">
            <div class="col-12'.($tschmal ? ' col-md-5 offset-md-1' : ' col-md-6').'">
                <div class="">
'.$grImg.'
                </div>
            </div>
            <div class="col-12'.($tschmal ? ' col-md-5' : ' col-md-6').'">
                <div class="">
#cont#
                </div>
            </div>
        </div>
    </div>
</section>
';


elseif($tref == 2) $template = '
<section class="'.($tabstand ? 'pt4 ' : '').($tabstand_bottom ? 'pb4 ' : '').($class ? $class : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').' '.($anker ? ' id="'.$anker.'"' : '').'>
    <div class="container">
        <div class="row each_row ">
            <div class="col-12'.($tschmal ? ' col-md-5' : ' col-md-6').'">
                <div class="">
#cont#
                </div>
            </div>
            <div class="col-12'.($tschmal ? ' col-md-5 offset-md-1' : ' col-md-6').'">
                <div class="">
'.$grImg.'
                </div>
            </div>
        </div>
    </div>
</section>
';


elseif($tref == 3) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').''.($tabstand ? '  class="mt6"' : '').'>
    <div class="container bgcolor '.($class ? $class.'' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
        <div class="row each_row ">
            <div class="col-12'.($tschmal ? ' col-md-7 offset-md-1' : ' col-md-8').'">
                <div class="">
#cont#
                </div>
            </div>
            <div class="col-12'.($tschmal ? ' col-md-3' : ' col-md-4').'">
                <div class="">
'.$grImg.'
                </div>
            </div>
        </div>
    </div>
</section>

';


elseif($tref == 4) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').''.($tabstand ? '  class="mt6"' : '').'>
    <div class="container bgcolor '.($class ? $class.'' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
        <div class="row each_row ">
            <div class="col-12'.($tschmal ? ' col-md-3 offset-md-1' : ' col-md-4').'">
                <div class="">
'.$grImg.'
                </div>
            </div>
            <div class="col-12'.($tschmal ? ' col-md-7' : ' col-md-8').'">
                <div class="">
#cont#
                </div>
            </div>
        </div>
    </div>
</section>
';

/*



elseif($tref == 2) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container content center '.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
        <div class="row">
            <div class="col-12">
#cont#	'.($DLclosed ? '' : '</div>').'
            </div>
        </div>
    </div>
</section>
';
elseif($tref == 3) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container-fluid center bgIMG'.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
#cont#	'.($DLclosed ? '' : '</div>').'
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
</section>

';
elseif($tref == 4) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container content '.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
        <div class="row">
            <div class="col-12">
#cont#	'.($DLclosed ? '' : '</div>').'
            </div>
        </div>
    </div>
</section>
';
*/

$templateIsClosed = 1;
$anzahlOffenerDIV = 0;

$hl = '';
$farbe = '';
$class = '';
// $bgIMG = '';
$itext = '';
$closeDL = '';
$slogan = '';

?>