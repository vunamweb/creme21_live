<?php
global $color, $additional_text;

$text = explode("\n", $text);

$additional_text .= '
<ul>
';

foreach($text as $val) {
	if ($val) $additional_text .= '		<li><span></span>'.$val.'</li>
';
}

$additional_text .= '</ul>

';

?>