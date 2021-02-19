<?php
global $pdf, $dir, $downloadButton;

if($text) {
	$query  = "SELECT * FROM `morp_cms_pdf` where pid=$text";
	$result = safe_query($query);
	$row = mysqli_fetch_object($result);
	
	$de = $row->pdesc;
	$nm = $row->pname;
	$si = $row->psize;
	$da = $row->pdate;
	$pi = $row->pimage;
	$pl = $row->plong;
	$da = euro_dat($da);
	
	$typ = explode(".", $nm);
	$c	 = (count($typ)-1);
	$img = $typ[$c]."_s.gif";
	
	$downloadButton = '<a href="'.$dir.'pdf/'.$nm.'" class="btn d-block btn_download_auto"><i class="fa fa-download fa-lg"></i> '.($pl ? nl2br($pl) : $de).'</a>';

}
$morp = '<b>Download:</b> '.$de.'<br/>';
?>