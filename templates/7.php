<?php
/* pixel-dusche.de */

global $hl, $button, $imgSize, $imgClass, $headerImgCt, $OffeneSection;
global $fileID, $lastUsedTemplateID, $js, $morpheus, $dir;

$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;

if($OffeneSection) $template .= '
			</section>
';
$OffeneSection = 0;

//
//
// $morpheus["slogan"] from morpheus SETTINGS
//
//


	$template = '

        <section class="section_banner">
            <div class="carousel_banner">
                <div class="box_contact">
                    <p class="mobile mb-md-2"><img src="'.$dir.'images/SVG/i_call.svg" alt="Beratung Leipzig" class="img-fluid" width="27"> Mobil: <a href="tel:'.$morpheus["fon"].'"> '.$morpheus["fon"].'</a></p>
                    <p class="mb-0 email"><a href="mailto:'.$morpheus["email"].'">'.$morpheus["email"].'</a></p>
                </div>

                <div class="carousel" data-flickity=\'{"prevNextButtons": false, "autoPlay": true, "setGallerySize": true, "resize": true }\'>
#cont#
                </div>

            </div>
        </section>
';


$fliesstext = '';


?>