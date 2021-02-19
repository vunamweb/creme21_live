<?php
/* pixel-dusche.de */

global $dir, $anker, $morpheus, $img__header, $halb;
global $fileID, $lastUsedTemplateID,$anzahlOffenerDIV, $OffeneSection;


$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;

if($OffeneSection) $template .= '
			</section>
';
$OffeneSection = 0;


$template = '
        <section class="section_banner_sub">
            <div class="container">
	            <div class="row">
	                <div class="col-12 col-md-6 align-self-center">
	                    <div class="box_banner_img">
	                        '.$img__header.'
	                    </div>
	                </div>
	                <div class="col-12 col-md-6 align-self-center">
	                    <div class="box_caption">
#cont#

							'.($halb ? '<div class="row">'.$halb.($anker__link ? '<div class="col-12 col-md-6 col-lg-6"><ul class="pl-3">'.$anker__link.'</div></ul>' : '').'</div>' : '').'


	                    </div>
	                </div>
	            </div>
            </div>
            <div class="box_contact">
                <p class="mobile mb-md-2"><img src="'.$dir.'images/SVG/i_call.svg" alt="" class="img-fluid" width="27"> Mobil: <a href="tel:'.$morpheus["fon"].'"> '.$morpheus["fon"].'</a></p>
                <p class="mb-0 email"><a href="mailto:'.$morpheus["email"].'">'.$morpheus["email"].'</a></p>
            </div>
        </section>


            ';

$templateIsClosed = 1;
$anzahlOffenerDIV = 0;
$img__header = '';
$anker__link = '';
?>