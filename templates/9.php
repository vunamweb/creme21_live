<?php
/* pixel-dusche.de */

global $dir, $anker;
global $fileID, $lastUsedTemplateID,$anzahlOffenerDIV, $OffeneSection;


$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;

if($OffeneSection) $template .= '
			</section>
';
$OffeneSection = 0;


$template = '
#cont#
';

$templateIsClosed = 1;
$anzahlOffenerDIV = 0;

?>