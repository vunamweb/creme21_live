<?php
global $pdf, $dir, $ctDL, $closeDL, $isDownload;

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


$output .= '<a href="'.$dir.'pdf/'.$nm.'" target="_blank" title="'.$nm.' zum Download"><img src="'.$dir.'mthumb.php?w=400&amp;src=images/userfiles/image/'.urlencode($typ[0]).'.jpg" alt="" class="img-fluid" /></a>';
}
$morp = '<b>Download:</b> '.$de.'<br/>';
?>