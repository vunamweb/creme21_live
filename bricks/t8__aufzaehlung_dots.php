<?php
global $liste;

$text = explode("\n", $text);
$liste = '';

foreach($text as $val) {
	if ($val) $liste .= '		<li><span></span>'.$val.'</li>
';
}

?>