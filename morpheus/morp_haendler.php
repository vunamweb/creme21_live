<?php
# # # # # # # # # # # # # # # # # # # # # # # # # # #
# www.pixel-dusche.de                               #
# björn t. knetter                                  #
# start 12/2003                                     #
# edit 27.11.2006                                   #
# post@pixel-dusche.de                              #
# frankfurt am main, germany                        #
# # # # # # # # # # # # # # # # # # # # # # # # # # #

session_start();
#$box = 1;
include("cms_include.inc");

// print_r($morpheus);

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

$arr = array("PLZ Straße", "Ort", "Straße",  "Hausnummer", "Firmenname 1", "Firmenname 2", "Branche", "Telefon", "E–Mail–Adresse");
$arr_col = array("plz", "ort", "strasse",  "hnr", "name1", "name2", "branche", "telefon", "email");
$get = array();

// echo '<pre>';

if (isset($_FILES['file'])) {

	require_once "simplexlsx.class.php";

	$xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] );

	$sql = "TRUNCATE TABLE `morp_haendler`";
	safe_query($sql);


	echo '<h1>Parsing Result</h1>';
	echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

	list($cols,) = $xlsx->dimension();

	foreach( $xlsx->rows() as $k => $r) {
		if ($k == 0) {
			for( $i = 0; $i < $cols; $i++) {
				if(in_array($r[$i], $arr)) echo "--$i-". $get[$i]=$i;
			}
			print_r($k);

			$pflicht1 = $get[0];
			$pflicht2 = $get[1];
			$pflicht3 = $get[4];
			continue; // skip first row
		}
		echo '<tr>';

		$sql = '';

		for( $i = 0; $i < $cols; $i++)
			if(in_array($i, $get))  {
				if($r[$pflicht1] && $r[$pflicht2] && $r[$pflicht3]) {
					echo '<td>'.$arr_col[$i].': '.( (isset($r[$i])) ? ($r[$i]) : '&nbsp;' ).'</td>';
					$sql .= "`".$arr_col[$i]."`='".$r[$i]."', ";
				}
			}

		echo '</tr>';

		if($sql) {
			$sq = 'INSERT `morp_haendler` SET '.$sql." last_update='".date("d.m.Y")."'";
			$res = safe_query($sq);
			//echo mysqli_insert_id($mylink);
		}
	}
	echo '</table>';
}

?>
<h1 style="margin-bottom: 2em;">Upload</h1>
<div class="alert alert-danger" role="alert">Mit Klick auf den Upload Button wird der aktuelle Datensatz gelöscht!</div>

<form method="post" enctype="multipart/form-data">
*.XLSX <input type="file" name="file"  />

<input type="submit" value="Upload and import" style="margin-top: 2em;" /><br/><br/>

</form>



<?php
	include("footer.php");

?>