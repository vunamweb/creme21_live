<?php
/*
UploadiFive
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
*/

include("../../nogo/config.php");
include("../../nogo/funktion.inc");
include("../../nogo/db.php");
dbconnect();

$pgid = $_POST["pgid"];
$reload = $_POST["reload"];

if(!$pgid) exit();

// Set the uplaod directory
// $uploadDir = '/pdf/';

echo $uploadDir = getMediaDirectoy ($pgid, "../../"); // '/secure/dfiles/vxcDfgH/';

// Set the allowed file extensions
// 		$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions
$imgTypes = array('jpg', 'jpeg', 'png', 'pdf', 'swf', 'ai', 'eps', 'tif', 'tiff', 'psd', 'bmp'); // Allowed file extensions
$docFiles = array("doc", "docx", "xls", "xlsx", "mov", 'indd', 'zip', "nef", "flv", "m4v", "mp4", "avi");
$fileTypes = array_merge($imgTypes, $docFiles);

$verifyToken = md5('pixeld' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile   = $_FILES['Filedata']['tmp_name'];
	$file 		= $_FILES['Filedata']['name'];

	$targetFile = $uploadDir . $file;

	$thumb = explode("@", $file);
	$bezeichnung = $thumb[1];
	$bezeichnung = explode(".", $bezeichnung);
	$bezeichnung = $bezeichnung[0];
	$thumb = $thumb[0].'.jpg';

	$filesize = filesize($tempFile);

	// Validate the filetype
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array(strtolower($fileParts['extension']), $fileTypes)) {

		// Save the file
		if(!move_uploaded_file($tempFile, $targetFile)) echo ":(";
		else {
			echo ":)";
			if (in_array(strtolower($fileParts['extension']), $fileTypes)) setData ($file, $pgid, strtolower($fileParts['extension']), $pfad, $filesize, $reload, $thumb, $bezeichnung);
			if (in_array(strtolower($fileParts['extension']), $imgTypes)) include("convert.php");
		}
		echo "finish";
	} else {
		// The file type wasn't allowed
		echo 'Invalid file type.';
	}
}


function setdata ($file ,$pgid, $extension, $pfad, $filesize, $reload, $thumb, $bezeichnung) {
		$date = date(Y ."-" .m ."-" .d);

		$sql = "SELECT pid FROM morp_media WHERE pname='$file'";
		$res = safe_query($sql);

		if(mysqli_num_rows($res)>0) 	$sql = "UPDATE morp_media SET pname='$file', pdate='$date', psize='$filesize', thumb='$thumb', bezeichnung='$bezeichnung', pgid=$pgid, edit=1 WHERE pname='$file'";
		elseif ($reload) 				$sql = "UPDATE morp_media SET pname='$file', pdate='$date', psize='$filesize', thumb='$thumb', bezeichnung='$bezeichnung', edit=1 WHERE pid=$reload";
		else 							$sql = "INSERT morp_media SET pname='$file', pdate='$date', psize='$filesize', pgid=$pgid, thumb='$thumb', bezeichnung='$bezeichnung'";

		echo $sql;

		safe_query($sql);
}

?>