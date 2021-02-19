<?php
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>konvert</title>
</head>

<body>


<?php

$suchen = isset($_POST["suchen"]) ? $_POST["suchen"] : '';
$ersetzen = isset($_POST["ersetzen"]) ? $_POST["ersetzen"] : '';

include("cms_include.inc");


if($suchen && $ersetzen) {
	$db = "morp_cms_content"; #$_POST["db"];
	$id = "cid";

	$query  = "SELECT * FROM $db";
	$result = safe_query($query);
	$cnt_arr = array();

	while ($row = mysqli_fetch_object($result)) {
		$cnt_arr[] = $row->$id;
	}

	// print_r($cnt_arr);

	foreach($cnt_arr as $val) {
		$query  = "SELECT * FROM $db WHERE $id=$val";
		$result = safe_query($query);
		$row = mysqli_fetch_object($result);
		$tmp = $row->content;
	//	$tmp = str_replace("Web-Design-Agentur", "Webdesign Agentur", $tmp);
		$tmp = str_replace($suchen, $ersetzen, $tmp);
	//	$tmp = str_replace("t1__t1__headline", "t1__headline", $tmp);
	//	$tmp = str_replace("t2__", "t1__", $tmp);
	//	$tmp = str_replace("t5__", "t1__", $tmp);
	//	$tmp = str_replace("fliesstext", "t1__fliesstext", $tmp);

		# $tmp = repl("^headline@@", "1_headline@@", $tmp);
		# $tmp = repl("##1_1_headline", "##1_headline", $tmp);
		# $tmp = repl("##2_sub1_headline", "##2_subheadline", $tmp);
	//	$tmp = repl("2_subt1__headline", "t1__subheadline", $tmp);
		# $tmp = repl("##fliesstext_ohne_bild", "##3_fliesstext", $tmp);
		# $tmp = repl("##bild", "##4_bild", $tmp);
		# $tmp = repl("##karte", "##5_karte", $tmp);



		$query  = "update $db set content='$tmp' WHERE $id=$val";
		//safe_query($query);
	}

	echo '<span style="display:block;margin-bottom:50px;">fertig!</span>';
}



?>

<h1>Suchen / Ersetzen von Texten innerhalb des Fließtextes</h1>

<p>Bitte erhöhte Vorsicht bei der Bedienung. Am besten vorher ein Backup erstellen</p>

<form method="post">
	<p><label>Suchen</label><input type="text" name="suchen" value="<?php echo $suchen; ?>" class="form-control" placeholder=""></p>
	<p><label>Ersetzen</label><input type="text" name="ersetzen" value="<?php echo $ersetzen; ?>" class="form-control" placeholder=""></p>
	<button class="btn btn-danger" type="submit">Ersetzen</button>
</form>

<?php



include("footer.php");
?>