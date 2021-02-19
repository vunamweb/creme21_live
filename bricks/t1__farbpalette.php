<?php
global $pdf, $dir, $ctDL, $closeDL, $isDownload, $imageFolder;

if($text) {
	
	
	$query  = "SELECT `name` FROM `morp_cms_img_group` WHERE gid=$text";
	$res = safe_query($query);
	$row = mysqli_fetch_object($res);
	$dir_nm = $row->name;
	
	$output .= '<ul class="list_pattern">';
	
	$query  = "SELECT * FROM `morp_cms_image` WHERE gid=$text ORDER BY imgname";
	$res = safe_query($query);
	while($row = mysqli_fetch_object($res)) {
		$inm = $row->imgname;
		$name = explode(".", $inm);
		$name = explode("_", $name[0]);
		$folder	= str_replace(array(";", " / ", "/", "  ", " "), array("","-","-", "-", "-"), $dir_nm);

		$output .= '<li><img src="'.$dir.$imageFolder.urlencode($folder).'/'.urlencode($inm).'?w=60" class="" alt="'.$inm.'"><p>'.str_replace(" ", "<br />", $name[1]).'</p></li>';		
	}

	$output .= '</ul>';

}
$morp = '<b>Download:</b> '.$de.'<br/>';
?>