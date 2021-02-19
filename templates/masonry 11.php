<?php
/* pixel-dusche.de */

global $dir, $anker, $navID;
global $fileID, $lastUsedTemplateID,$anzahlOffenerDIV;


$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;


$template = '

<section>
    <div class="container mb3">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
	            <div class="grid">

#cont#


	            </div>

            </div>

        </div>


		<div class="row">
            <div class="col-12 col-md-10 offset-md-1 text-center">
				<p class="mehr"><a href="'.$dir.$navID[2].'" class="mehr">SHOW ALL <span>(Referenzen)</span></a></p>
			</div>
		</div>
    </div>
</section>

';

$templateIsClosed = 1;
$anzahlOffenerDIV = 0;

?>