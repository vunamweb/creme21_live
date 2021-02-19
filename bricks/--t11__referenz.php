<?php
	global $refCt, $dir, $navID, $photoFolder, $setSizer;

	$sql = "SELECT * FROM  `morp_referenzen` WHERE refid=$text AND sichtbar=1";
	$res = safe_query($sql);
	$row 	= mysqli_fetch_object($res);

	if(!$refCt) $refCt = 1;
	else $refCt++;

	$referenzTargetID = 2;
	$photoFolder = 'images/referenzen/';

	if(!$setSizer) $setSizer=0;


///////************* OFF weil staion wieder umgestellt hat
/*
	$abstract_pos = $row->abstract_pos ? $row->abstract_pos : 1;
	$abstract_color = $row->abstract_color ? $row->abstract_color : '#fff';

	$img = $row->img;

	$size = $img ? getimagesize ( $dir.$photoFolder.$img ) : array(400,400);
	$w = $size[0];
	$h = $size[1];

	$height = 400;
	$width 	= 400;
	if($h > 400 && $w > 400) { $height = 800; $width = 800; }
	elseif($w > 850) { $width = 1200; }
	else if($h > $w) $height = 800;
	else if($w > $h) $width = 800;

	$setSizer = $width <= 400 ? $setSizer+1 : $setSizer;

	$referenzTargetID = 2;
*/
///////*******************************************************************************

	$img = $row->img14;

	$output .= '
						<div class="bild referenz50 linkbox" style="background:url('.$dir.$photoFolder.urlencode($img).');background-size:cover;" ref="'.$dir.$navID[$referenzTargetID].eliminiere(strtolower($row->name)).'+'.$row->refid.'">
						    <div class="overlay overlayFade">
						        <div class="text">'.strip_tags($row->kunde).($row->land ? '<br/>'.$row->land : '').'<br/><span>'.$row->kategorie.'</span></div>
						    </div>
						</div>';


?>