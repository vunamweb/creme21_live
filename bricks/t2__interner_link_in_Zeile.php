<?php
global $navarray, $lan, $navID, $produkt_group_arr, $multilang;

$tmp 	= explode("|", $text);
$anker 	= explode("#", $tmp[0]);
$link 	= trim($anker[0]);
$anker	= $anker[1];
$txt 	= $tmp[1];


$output .= '		<p><a href="'.($link != "bitte ziel wählen" ? $dir.($multilang ? $lan.'/' : '').$navID[$link] : '#').'">'.$txt.'</a></p>
';

$morp = '<b>Link</b>: '.$txt.'<br/>';

?>