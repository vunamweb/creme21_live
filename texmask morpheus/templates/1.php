<?php
/* pixel-dusche.de */
global $hl, $design, $itext, $startDIV, $anker, $h1, $bgIMG, $imageFolder;
global $fileID, $lastUsedTemplateID, $tabstand, $anker, $anzahlOffenerDIV, $templateIsClosed, $parallaxText;
global $video;

if($tref == 30) {
    $query_ = "SELECT * FROM `morp_cms_content` c LEFT JOIN morp_cms_image i ON i.imgid=c.img1, `morp_cms_nav` n WHERE c.navid=".$cid." and c.tref=30 AND n.navid=c.navid AND ton=1 limit 1";
	$result_ 	= safe_query($query_);
    while ($throw_ = mysqli_fetch_object($result_)) {
        $text_		= $throw_->content;
    }
    
    //$template = $query_; return;
    
   $tx_ = explode("##", $text_);
   
   $tx_0 = explode("@@", $tx_[0]);
   $tx_0 = (int) $tx_0[1];
   $que  	= "SELECT `longtext`, itext, imgname, name FROM `morp_cms_image` i, `morp_cms_img_group` g WHERE g.gid=i.gid AND imgid=$tx_0";
   $res 	= safe_query($que);
   $rw     = mysqli_fetch_object($res);
   $inm 	= $rw->imgname;
   $img = $imageFolder.$inm;
	
   
   $tx_1 = explode("@@", $tx_[1]);
   $tx_1 = $tx_1[1];
   
   $tx_2 = explode("@@", $tx_[2]);
   $tx_2 = $tx_2[1];
   
   $template = '<div class="banner_category banner_category_new" style="background: url('.$img.')">
 <div class="text-intro">
   '.$tx_1.'
 </div>
<div class="info">
   	'.$tx_2.'
 </div>
</div>';

//return;
}

$fileID = basename(__FILE__, '.php');
$lastUsedTemplateID = $fileID;


if($lastUsedTemplateID && $lastUsedTemplateID != $fileID && !$templateIsClosed) {
	for($i=1; $i<=$anzahlOffenerDIV; $i++) $template .= '					</div>
';

	$template .= '
				</section>
';
	$templateIsClosed=1;
}

$video_special = $video ? ' style="margin:0;"' : '';

$farbe = '';

//$template = $tref; return;

if($tref == 0) $template = '
 <div class="container '.($parallax ? 'pad0' : '').''.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
		'.($parallax ? '<div class="parallax parallax2" style="background: url('.$parallax.') no-repeat top center fixed; -webkit-background-size: cover; background-size: cover;">' : '
        <div class="row">
            <div class="col-md-12">
             <div class="trends_content">#cont#</div>
            </div>
        </div>
        ').'
    </div>
';
elseif($tref == 1 || !$tref) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="mb2 '.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : $video_special).'>
    <div class="container-fluid content center'.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
        <div class="row">
            <div class="col-md-12">
#cont#
            </div>
        </div>
    </div>
</section>

';
elseif($tref == 2) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container content text-center '.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
        <div class="row">
            <div class="col-md-12">
#cont#
            </div>
        </div>
    </div>
</section>
';
elseif($tref == 3) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container-fluid '.($parallax ? 'pad0' : '').' center bgIMG'.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
		'.($parallax ? '<div class="parallax" style="background: url('.$parallax.') no-repeat top center fixed; -webkit-background-size: cover; background-size: cover;">
        '.($parallaxText ? '

        <div class="container">

			<div class="row h-100">
			   <div class="col-sm-12 col-lg-9 col-xl-6 my-auto">
			     <div class="card card-block silverton-card text-left">

						#cont#

			     </div>
			   </div>
			</div>

        </div>' : '

        ').'
' : '

		#cont#
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        ').'
    </div>
</section>

';
elseif($tref == 4) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container content '.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
        <div class="row">
            <div class="col-md-12">
#cont#
            </div>
        </div>
    </div>
</section>
';
elseif($tref == 5) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>
    <div class="container content center '.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
        <div class="row">
            <div class="col-md-12 col-md-8 offset-md-2">
#cont#
            </div>
        </div>
    </div>
</section>
';
elseif($tref == 11) $template = '
<section'.($anker ? ' id="'.$anker.'"' : '').' class="'.($tabstand ? ' mt6 ' : '').($class ? $class.' bg-color' : '').'"'.($farbe ? ' style="background:#'.$farbe.'"' : '').'>

    <div class="container-fluid '.($parallax ? 'pad0' : '').' center bgIMG'.($tabstand ? ' mt6 ' : '').'"'.($bgIMG ? ' style="background:url('.$bgIMG.') no-repeat fixed; background-size: cover; padding-top:2em; padding-bottom:2em;"' : '').'>
		'.($parallax ? '<div class="parallax parallax2" style="background: url('.$parallax.') no-repeat top center fixed; -webkit-background-size: cover; background-size: cover;">' : '
 #cont#
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        ').'
    </div>
</section>

';



$anzahlOffenerDIV=0;

$hl = '';
$farbe = '';
$class = '';
// $bgIMG = '';
$itext = '';
$parallaxText = '';

?>