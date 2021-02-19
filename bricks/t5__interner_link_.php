<?php
global $navarray, $lan, $navID, $produkt_group_arr, $multilang, $goto, $navarrayFULL, $image_description;

$tmp 	= explode("|", $text);
$anker 	= explode("#", $tmp[0]);
$link 	= trim($anker[0]);
$anker	= $anker[1];
$txt 	= $tmp[1];

if($link && $link != 'bitte ziel wählen') $goto = $dir.($multilang ? $lan.'/' : '').$navID[$link]; else $goto = '';
$output .= $txt ? str_replace('/', '<i class="slash">/</i>',$txt) : $navarrayFULL[$link];

$image_description = $txt;

$morp = '<b>Link</b>: '.$txt.'<br/>';

?>