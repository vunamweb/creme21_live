<?php
global $navarray, $lan, $navID, $multilang, $ddID, $div__link;

$tmp 	= explode("|", $text);
$anker_name 	= explode("#", $tmp[0]);
$link 	= trim($anker_name[0]);
$anker_name	= trim($anker_name[1]);
$txt 	= $tmp[1];


$div__link = $dir.$navID[$link];

$morp = '<b>Link</b>: '.$txt.'<br/>';

?>