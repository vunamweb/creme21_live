<?
if ($png) $src  	= ImageCreateFromPNG($dir.$img);
else 	  $src  	= ImageCreateFromJPEG($dir.$img);

$w = ImageSx($src);
$h = ImageSy($src);

if ($mx) {
		if ($w > $mx) $wert = $mx/$w;
		else $wert = $w/$mx;

		
	if ($wert > 1) {
		$x = $w/$wert;
		$y = $h/$wert;
	}
	else {
		$x = $w*$wert;
		$y = $h*$wert;
	}
	$dst = ImageCreateTrueColor($x,$y);
	ImageCopyResampled($dst, $src, 0, 0, 0, 0, $x, $y, $w, $h);
	#header("Content-type: image/jpeg");
	imageJPEG($dst, $dir.$nm, 95);
}

?>
