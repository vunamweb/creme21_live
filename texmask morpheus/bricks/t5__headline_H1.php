<?php
	global $H1_count, $parallaxText;

	if(!$H1_count) $H1_count = 1;
	else $H1_count++;

	$output .= '<h1 itemprop="headline" class="cms">'.nl2br($text).'</h1>';
	$morp = $text;

	$parallaxText = 1;
?>