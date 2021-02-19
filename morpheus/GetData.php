<?php
session_start();

global $mylink;

include("../nogo/config.php");
include("../nogo/config_morpheus.inc");
include("../nogo/funktion.inc");
include("../nogo/db.php");
dbconnect();
include("login.php");


// der erste Wert kommt in data // alle folgenden Werte kommen im Array Z

$feld = $_POST["feld"];
$table = $_POST["table"];
$id = $_POST["id"];


// print_r($_POST);


if($table && $feld && $id) {
	$sql = "SELECT * FROM $table WHERE $feld=$id";
	$res = safe_query($sql);
	$rw = mysqli_fetch_object($res);
	// print_r($rw);
	echo json_encode($rw);
}

?>