<?php

global $dir, $navID, $navarrayFULL, $material, $material_HL;

$material_HL = 'MateriaLien';
	
if($text) {

	$material .= '		<li><a href="'.$dir.$navID[$text].'">'.$navarrayFULL[$text].'</a></li>
';

}
