<?php
global $color;

$text = explode("\n", $text);

$output .= '
<table class="themen noData">
	<tr>
		<th>Nr.</th>
		<th>Datum</th>
		<th>Thema</th>
	</tr>';

foreach($text as $val) {
	$arr = explode("#", $val);
	if ($val) $output .= '		<tr><td nowrap>'.trim($arr[0]).'</td><td nowrap>'.trim($arr[2]).'</td><td><b>'.trim($arr[1]).'</b></td></tr>
';
}

$output .= '</table>

';

?>