<?php
session_start();

global $mylink;

// echo "here";

include("../nogo/config.php");
include("../nogo/config_morpheus.inc");
include("../nogo/db.php");
dbconnect();
include("login.php");
include("../nogo/funktion.inc");

// print_r($_POST);

$id = $_POST["id"];
$del = $_POST["del"];
$all = $_POST["all"];

$cols = array(
	"pos",
	"img0",
	"img1",
	"img2",
	"img3",
	"layout",
	"img4",
	"img5",
	"img6",
	"tid",
	"ton",
	"tpos",
	"tlink",
	"tbackground",
	"timage",
	"theadl",
	"theight",
	"twidth",
	"tcolor",
	"tref",
	"tende",
	"content",
	"tabstand",
	"vorlage",
	"vorl_name",
	"vid",
);

# # # # # array fuer interne links schreiben

if($del) {
	$sql  = "DELETE FROM `morp_cms_content` WHERE cid=$id";
	safe_query($sql);

	$sql  = "DELETE FROM `morp_cms_content_live` WHERE cid=$id";
	safe_query($sql);
}
elseif ($all) {
	$sql  = "SELECT * FROM `morp_cms_content` WHERE navid=$all";
	$res = safe_query($sql);

	while ($row = mysqli_fetch_object($res)) {
		$exists = 0;
		$sql  = "SELECT cid FROM `morp_cms_content_live` WHERE cid=".$row->cid;
		$rs = safe_query($sql);
		$exists = mysqli_num_rows($rs);

		$id = $row->cid;

		if($exists) $sql = "UPDATE `morp_cms_content_live` SET ";
		else  		$sql = "INSERT `morp_cms_content_live` SET cid=".$row->cid.", navid=".$row->navid.", ";

		foreach($cols as $val) {
			$sql .= '`'.$val.'` = "'.addslashes($row->$val).'",';
		}

		if($exists) $sql .= " edit=0 WHERE cid=$id ";
		else $sql .= " edit=0";
		safe_query($sql);
#echo $sql."\n";
		$sql  = "UPDATE `morp_cms_content` SET edit=0 WHERE cid=$id";
		safe_query($sql);
#echo $sql."\n";
	}
}
else {
	$sql  = "SELECT cid FROM `morp_cms_content_live` WHERE cid=$id";
	$res = safe_query($sql);
	$exists = mysqli_num_rows($res);

	$sql  = "SELECT * FROM `morp_cms_content` WHERE cid=$id";
	$res = safe_query($sql);

	$row = mysqli_fetch_object($res);

	if($exists) $sql = "UPDATE `morp_cms_content_live` SET ";
	else  		$sql = "INSERT `morp_cms_content_live` SET cid=".$row->cid.", navid=".$row->navid.", ";

	foreach($cols as $val) {
		$sql .= '`'.$val.'` = "'.addslashes($row->$val).'",';
	}

	if($exists) $sql .= " edit=0 WHERE cid=$id ";
	else $sql .= " edit=0";
	 echo $sql;
	safe_query($sql);

	$sql  = "UPDATE `morp_cms_content` SET edit=0 WHERE cid=$id";
	safe_query($sql);

}

?>