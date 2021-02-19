<?php
/* pixel-dusche.de */
global $fileID, $lastUsedTemplateID, $farbe, $class, $templCt, $templateIsClosed, $cid, $hl, $produktBild, $material, $OffeneSection, $material_HL, $ilink, $produktBildCt, $anker;

$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;

if($OffeneSection) $template .= '
			</section>			
';
$OffeneSection = 0;


$isSlider = 1;

global $cid, $dir;

if($tref == 1 || !$tref) $template = '

                                    <div class="box_info_products"'.($anker ? ' id="'.$anker.'"' : '').'>
                                        <div class="row">
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <h3>'.$hl.'</h3>
                                                '.($produktBildCt > 1 ? '	
												<div class="swiper-small">
													<div class="swiper-wrapper">
' : '').'
                                                '.$produktBild.'
                                                '.($produktBildCt > 1 ? '	

													</div>
												</div>
' : '').'
                                            </div>
                                            <div class="col-12 col-md-5 col-lg-6">
                                                <div class="box_characteristics">
                                                	
                                                	#cont#

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-3">
                                                '.($material ? '<div class="box_info_products_white">
                                                    <div class="box_materials">
                                                        <h6>'.$material_HL.':</h6>
                                                        <ul>
                                                            '.$material.'
                                                        </ul>
                                                    </div>
                                                </div>' : '').'
                                            </div>
                                        </div>
                                    </div>


';
else if($tref == 2) $template = '
                        <div class="col-6 col-md-6">
                            <div class="main_products_item">
                                <a href="'.$ilink.'" class="products_item">
                                    <h2>'.$hl.'</h2>
                                    <div class="products_item_img products_item_img_main">
                                        '.$produktBild.'
                                    </div>
                                </a>
                            </div>
                        </div>
';


$templateIsClosed = 1;
$hl = '';
$class = '';
$produktBild = '';
$produktBildCt = 0;
$material = '';
$material_HL = '';
$ilink = '';

?>