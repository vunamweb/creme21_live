<?php
global $halb;

$text = explode("\n", $text);

$halb .= '						<div class="col-12 col-md-6 col-lg-6"><ul class="pl-3">
';
foreach($text as $val) {
	if ($val) $halb .= '							<li>'.$val.'</li>
';
}
$halb .= '						</ul></div>
';

$morp = ' / Auzählung / ';
?>