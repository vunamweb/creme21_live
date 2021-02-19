<?php
global $navarray, $lan, $navID, $produkt_group_arr, $multilang, $divLink;

$tmp 	= explode("|", $text);
$anker 	= explode("#", $tmp[0]);
$link 	= trim($anker[0]);
$anker	= $anker[1];
$txt 	= $tmp[1];


$output .= '<a href="'.$dir.$link.'" class="btn btnGoshop_de">'.($txt).'</a>';
$divLink = $dir.$link;

$morp = '<b>Link</b>: '.$txt.'<br/>';

?>