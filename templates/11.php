<?php
/* pixel-dusche.de */

global $dir, $anker, $navID;
global $fileID, $lastUsedTemplateID,$anzahlOffenerDIV, $OffeneSection;
global $farbe, $class;

$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;

if($OffeneSection) $template .= '
			</section>			
';
$OffeneSection = 0;

$template = '

<section class="'.$class.'">
    <div class="container-full">
	    <div class="container mb3 mobile">
	        <div class="row">
	            <div class="col-12">
	&nbsp;
	            </div>
	
	        </div>
	    </div>
    </div>
</section>

';

$templateIsClosed = 1;
$anzahlOffenerDIV = 0;

?>