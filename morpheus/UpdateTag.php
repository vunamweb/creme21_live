<?php
session_start();

global $mylink;

include("../nogo/config.php");
include("../nogo/config_morpheus.inc");
include("../nogo/db.php");
dbconnect();
include("login.php");
include("../nogo/funktion.inc");


// der erste Wert kommt in data // alle folgenden Werte kommen im Array Z

$data = explode(",", $_POST["data"]);
$feld = $_POST["feld"];
$table = $_POST["table"];
$id = $_POST["id"];
$add = $_POST["add"];

// print_r($_POST);
 print_r($data);

$art = $_POST["art"] ? $_POST["art"] : "image";

if($table && $feld && $id) {
	if($add) {
		$data = $data[0];
		$short = eliminiere($data);
		$ins = "INSERT `morp_tags` SET tag_long='$data', tag='".$short."'";
		$res = safe_query($ins);
		$tagID = mysqli_insert_id($mylink);

		$ins = "INSERT `morp_tags_list` SET art='$art', tagID=".$tagID.", targetID = ".$id;
		safe_query($ins);

		$taglist = '';

		$sql = "SELECT * FROM `morp_tags_list` WHERE art='$art' AND targetID = ".$id;
		$res = safe_query($sql);
		while($row = mysqli_fetch_object($res)) {
			$taglist .= '#'.$row->tag.' ';
		}
		$sql = "UPDATE $table SET tags='$taglist' WHERE $feld=$id";
		safe_query($sql);

		// echo $data;
	}
	else {
		$taglist = '';

		$ins = "DELETE FROM `morp_tags_list` WHERE targetID = ".$id;
		safe_query($ins);

		foreach($data as $val) {
			if(isin("Array", $val)) {
				$val = repl(")", '', $val);
				$val = explode("=>", $val);
				$val = trim($val[1]);
				$sql = "SELECT * FROM morp_tags WHERE tag_long='".$val."'";
			}
			else $sql = "SELECT * FROM morp_tags WHERE tagID=".trim($val);
			$res = safe_query($sql);
			$row = mysqli_fetch_object($res);
			$taglist .= '#'.$row->tag.' ';
			// echo $sql = "UPDATE $table set $pos='$data' WHERE $feld=$id";
			// safe_query($sql);
			$ins = "INSERT `morp_tags_list` SET art='$art', tagID=".$row->tagID.", targetID = ".$id;
			safe_query($ins);
			// echo "<br>";
		}

		$sql = "UPDATE $table SET tags='$taglist' WHERE $feld=$id";
		safe_query($sql);
	}
}

?>