<?php
global $color;

$text = explode("\n", $text);

$output .= '
<ol>
';

foreach($text as $val) {
	if ($val) $output .= '		<li>'.$val.'</li>
';
}

$output .= '</ol>

';

?>