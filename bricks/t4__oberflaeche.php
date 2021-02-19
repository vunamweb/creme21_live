<?php

global $dir, $navID, $navarrayFULL, $material, $material_HL, $sn2;

$material_HL = 'Oberflächen';

// echo $sn2;

if($text) {
	if($sn2 == 48) $goto=49;
	else $goto = $text;
	$material .= '		<li><a href="'.$dir.$navID[$goto].'">'.$navarrayFULL[$text].'</a></li>
';

}
