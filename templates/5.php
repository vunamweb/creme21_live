<?php
/* pixel-dusche.de */

global $cid, $template5count, $templateTotal;
global $lasttref, $linkbox;

global $containerLink, $containerLinkText, $template5count, $templateTotal, $lastUsedTemplateID, $templateIsClosed, $templateCloseNow, $additional_text;
global $design, $cid, $tref, $farbe, $class, $tende, $tabstand, $tpos, $DoNotCloseTemplate, $anzahlOffenerDIV, $anker, $OffeneSection, $div_title, $icon, $image_description;

$template = '';

$fileID = basename(__FILE__, '.php');


if(!$template5count || $template5count < 1) {
	$sql = "SELECT cid FROM morp_cms_content WHERE tid=$fileID AND navid=$cid AND ton=1 ORDER by tpos";
	$res = safe_query($sql);
	$templateTotal = mysqli_num_rows($res);

	$template5count = 1;
}
else $template5count++;



if($lastUsedTemplateID && $lastUsedTemplateID != $fileID && !$templateIsClosed) {
	for($i=1; $i<=$anzahlOffenerDIV; $i++) $template .= '					</div>
';


	$template .= '
								</div>
';

	$templateIsClosed=1;
}

if($template5count == 1 || $templateIsClosed) { $template .= '
            <section class="section_products '.($tref == 3 ? ' gray ' : '').($design==2 ? ' pad0 ' : '').($class ? $class : '').''.($tabstand ? ' pt4 ' : '').' '.($tabstand_bottom ? ' pb4 ' : '').'">
                <div class="container">
                '.$div_title.'
                    <div class="row no-gutters">
';
	$templateIsClosed=0;
	$OffeneSection=1;
}


if($tref == 1 || !$tref) $template .= '
                        <div class="col-6 col-md-4  col-lg-3">
                            <div class="main_products_item w_products_item">
                                <a'.($goto ? ' href="'.$goto.'"' : '').' class="products_item">
                                	<h2>#cont#</h2>
                                    <div class="products_item_img small products_item_img_custom rel">
                                        '.$produktBild.'
                                    </div>
                                    '.($icon ? '<div class="icon">
                                        '.$icon.'
                                    </div>' : '').'
                                </a>
                               '.$additional_text.'
                            </div>
                        </div>

';
else if($tref == 2) $template .= '
                        <div class="col-6 col-md-4  col-lg-3">
                            <a href="'.$goto.'" class="products_item products_item_white rel">
                               <h3>#cont#</h3>
                                <div class="products_item_img small">
                                    '.$produktBild.'
                                </div>
                                '.($icon ? '<div class="icon">
                                        '.$icon.'
                                </div>' : '').'
                            </a>
                            '.$additional_text.'
                        </div>

';
else if($tref == 3) $template .= '
                        <div class="col-6 col-md-4  col-lg-3">
                            <a href="'.$goto.'" class="products_item products_item_white rel">
                               <h3>#cont#</h3>
                                <div class="products_item_img small">
                                    '.$produktBild.'
                                </div>
                                '.($icon ? '<div class="icon">
                                    '.$icon.'
                                </div>' : '').'
                            </a>
                           '.$additional_text.'
                        </div>

';


if(($template5count == $templateTotal || $tende) && !$templateIsClosed) {
	for($i=1; $i<=$anzahlOffenerDIV; $i++) $template .= '					</div>
';


	if($OffeneSection) $template .= '
			</section>
';
	$OffeneSection = 0;
	$template5count = 0;
	$templateTotal = 0;
	$templateIsClosed = 1;
	$tende = 0;
}

$lastUsedTemplateID = $fileID;
$anzahlOffenerDIV = 2;


$produktBild = '';
$goto = '';
$hl = '';
$div_title = '';
$icon = '';
$additional_text = '';
$image_description = '';
$class = '';
$farbe = '';

?>