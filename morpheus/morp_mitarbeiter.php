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
$myauth = 60;
include("cms_include.inc");

// print_r($_REQUEST);

global $arr_form;

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

// NICHT VERAENDERN ///////////////////////////////////////////////////////////////////
$edit 	= $_REQUEST["edit"];
$delimg = $_REQUEST["delimg"];
$neu	= $_REQUEST["neu"];
$save	= $_REQUEST["save"];
$del	= $_REQUEST["del"];
$delete	= $_REQUEST["delete"];
$id		= $_REQUEST["id"];
$unvis	 = $_REQUEST["unvis"];
$vis	 = $_REQUEST["vis"];
///////////////////////////////////////////////////////////////////////////////////////


//// EDIT_SKRIPT
$um_wen_gehts 	= "Mitarbeiter / Team";
$titel			= "Verwaltung Mitarbeiter";

global $table, $tid;

$table = "morp_mitarbeiter";
$tid = "mid";

///////////////////////////////////////////////////////////////////////////////////////


echo '<div id=vorschau>
	<h2>'.$titel.'</h2>

	'. ($edit || $neu ? '<p><a href="?pid='.$pid.'">&laquo; zur&uuml;ck</a></p>' : '') .'
	<form action="" onsubmit="" name="verwaltung" method="post">
';


$new = '<p><a href="?neu=1">&raquo; NEU</a></p>';

//// EDIT_SKRIPT
// 0 => Feldbezeichnung, 1 => Bezeichnung für Kunden, 2 => Art des Formularfeldes
$arr_form = array(
	array("vorname", "Vorname", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("name", "Name", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
 	array("beschreibung", "persönlicher Text", '<textarea cols="80" rows="5" name="#n#">#v#</textarea>'),
 	array("freitext", "Beschreibung Tätigkeit", '<textarea cols="80" rows="5" name="#n#">#v#</textarea>'),
	array("sichtbar", "Online sichtbar", 'chk'),
#	array("position", "Position", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("email", "E-Mail", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("fon", "Telefon", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
#	array("aid", "Abteilung", 'sel', 'morp_mitarbeiter_abt', 'bezeichnung'),
#	array("reihenfolge", "Reihenfolge", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("img1", "Portrait", 'foto', 'image', 'imgname', 6, 'gid'),
	array("img2", "Logo", 'foto', 'image', 'imgname', 6, 'gid'),
#	array("img3", "Foto 3", 'sel', 'image', 'imgname', 6, 'gid'),


	array("strasse", "Straße", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("plz", "PLZ", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("ort", "Ort", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("tel", "Tel", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("www", "www", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("frt", "FRT", 'chk'),
	array("et", "ET", 'chk'),
	array("et1", "ET Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("et2", "ET Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("et3", "ET Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("et4", "ET Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("et5", "ET Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("et6", "ET Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("ipb", "IP-B", 'chk'),
	array("ipb1", "IP-B Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("ipb2", "IP-B Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("ipb3", "IP-B Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("ipb4", "IP-B Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("ipb5", "IP-B Zusatz", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("jugend", "Jugend", 'chk'),
	array("kinder", "Kinder", 'chk'),
	array("coaching", "Coaching", 'chk'),
	array("teamcoaching", "Team Coaching", 'chk'),
);
///////////////////////////////////////////////////////////////////////////////////////


#	array("mberechtigung", "Berechtigung (ID: 1 = Zugang)", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
# 	array("ausbildungen", "<strong>Ausbildung EN</strong>", '<textarea cols="80" rows="5" name="#n#">#v#</textarea>'),
# 	array("imgid", "Berechtigung (ID: 1 = Zugang)", 'sel', 'image', 'imgname'),

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if ($vis || $unvis) {
	if($vis) 		$sql = "UPDATE $table SET sichtbar=1 WHERE $tid=".$vis;
	elseif($unvis) 	$sql = "UPDATE $table SET sichtbar=0 WHERE $tid=".$unvis;
	// echo $sql;
	safe_query($sql);
	$jsSAVE = 1;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function liste() {
	global $table, $tid;
	//// EDIT_SKRIPT

	$ord = "name";
	$anz = "name";
	$anz2 = "bezeichnung";
	$anz3 = "email";
	////////////////////

	$echo .= '<p>&nbsp;</p><div class="alert alert-danger" role="alert">Mitarbeiter "Adler-Pollack-Institut" NICHT löschen!</div><div class="container-full"><div class="row">';

	$old = '';

	$sql = "SELECT * FROM $table WHERE 1 ORDER BY ".$ord."";
	$res = safe_query($sql);

	$lastChar = '';
	$endDiv = 0;

	while ($row = mysqli_fetch_object($res)) {
		$edit = $row->$tid;
		$si   = $row->sichtbar;


		if ($si == 1) 	$si = '<a href="?unvis='.$edit.'"><i class="fa fa-eye vis" ref="0"></i></a>';
		else			$si = '<a href="?vis='.$edit.'"><i class="gray fa fa-eye-slash vis" ref="1"></i></a>';

		$name = $row->name;
		$firstChar = substr($name,0,1);

		if($firstChar != $lastChar) {
			if($endDiv) $echo .= "</div>";
			$endDiv = 1;
			$echo .= '<div class="row"><h5>'.$firstChar.'</h5>';
			$lastChar = $firstChar;
		}

		$echo .= '<div class="col-md-4">
		<div class="row mitarbeiter">
			<div class="col-sm-1"><a href="?edit='.$edit.'" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a></div>
			<div class="col-sm-6">'.$row->vorname	.' '.$row->$anz	.'<!--<br/>
			'.$row->$anz3.'--></div>
			<div class="col-sm-3">'.($row->img1 ? '<img src="../mthumb.php?w=40&src=images/team/'.urlencode($row->img1).'" />' : '').'
			'.($row->img2 ? '<img src="../mthumb.php?w=40&src=images/team/'.urlencode($row->img2).'" />' : '').'</div>
			<div class="col-sm-1">'.$si.'</div>
			<div class="col-sm-1"><a href="?del='.$edit.'" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></div>
		</div>
	</div>
		';
	}

	$echo .= '</div></div></div><p>&nbsp;</p>';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function edit($edit) {
	global $arr_form;
	global $table, $tid;

	$sql = "SELECT * FROM $table WHERE $tid=".$edit."";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);

	$echo .= '<input type="Hidden" name="neu" value="'.$neu.'">
		<input type="Hidden" name="edit" value="'.$edit.'">
		<input type="Hidden" name="save" value="1">

	<table cellspacing="6">';

	$echo .= '<tr>
		<td></td>
	</tr>
';

	foreach($arr_form as $arr) {
		$echo .= setMorpheusFormTable($row, $arr, 'team/', $edit, $table, $tid);
	}
/*
	foreach($arr_form as $arr) {
		$get = $arr[0];

		if ($arr[2] == "sellan") {
			$echo .= '<tr><td>'.$arr[1].'</td><td><select name="lan">';
			$echo .= '<option value="1" '. ($row->lan == 1 ? ' selected' : '') .'>Deutsch</option>';
			$echo .= '<option value="2" '. ($row->lan == 2 ? ' selected' : '') .'>English</option>';
			$echo .= '<option value="3" '. ($row->lan == 3 ? ' selected' : '') .'>Francais</option>';
			$echo .= '</select></td></tr>';
		}
		elseif ($arr[2] == "sel") {
			$echo .= '<tr><td>'.$arr[1].'</td><td><select name="'.$arr[0].'">'.pulldown ($row->$get, $arr[3], $arr[4], $arr[0], $arr[5], $arr[6]).'</select></td></tr>';
			if ($arr[0] == "imgid") $image = pfad ($arr[0], $arr[3], $arr[4], $row->$get);
		}
		elseif ($arr[2] == "foto") {
			// $echo .= '<tr><td>'.$arr[1].'</td><td><select name="'.$arr[0].'">'.pulldown ($row->$get, $arr[3], $arr[4], $arr[0], $arr[5], $arr[6]).'</select></td></tr>';
			// if ($arr[0] == "imgid") $image = pfad ($arr[0], $arr[3], $arr[4], $row->$get);

			$echo .= '<tr><td width="160">'.$arr[1].'</td><td><input type=hidden name='.$arr[0].' value="' .$row->$get.'" style="width:500px"><a href="image_folder_upload.php?mid='.$edit.'&tn='.$morpheus["img_size_news_tn"].'&imgid='.$arr[0].'&team=1">';

			if ($row->$get) $echo .=  '<img src="../mthumb.php?w=200&amp;src=images/team/'.urlencode($row->$get).'"></a> &nbsp; &nbsp; <a href="?delimg='.$arr[0].'&edit='.$edit.'"><img src="images/delete.gif" width="9" height="10" alt="Bild löschen" border="0" hspace="6"></a>';
			else $echo .=  '<b>Foto</b>: bitte wählen</a>';

			$echo .= '</td></tr>';

		}
		elseif ($arr[2] == "text") {
			$echo .= '<tr><td>'.$arr[1].'</td><td>'.repl("#e#", $edit, $arr[3]).'</td></tr>';
		}
		else $echo .= '<tr>
		<td>'.$arr[1].':</td>
		<td>'. repl(
					array("#v#", "#n#", "#s#", "#db#", '#e#', '#id#', '#s1#', '#s0#'),
					array($row->$get, $arr[0], 'width:400px;', $table2, $edit, $id2, $sel1, $sel2),
			$arr[2]).'</td>
	</tr>';
	}
*/

	if ($image) $echo .= '<tr><td></td><td><img src="../images/userfiles/image/' .$image .'" /></td></tr>';

	$echo .= '
	<tr>
		<td></td>
		<td><br><input type="submit" name="speichern" value="speichern"></td>
	</tr>
</table>';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function neu() {
	global $arr_form;

	$x = 0;

	$echo .= '<input type="Hidden" name="neu" value="1"><input type="Hidden" name="save" value="1">

	<table cellspacing="6">';

	foreach($arr_form as $arr) {
		$get = $arr[0];
		if ($x <= 5) $echo .= '<tr>
			<td>'.$arr[1].':</td>
			<td>'. repl(array("#v#", "#n#", "#s#"), array($row->$get, $arr[0], 'width:400px;'), $arr[2]).'</td>
		</tr>';
		$x++;
	}

	$echo .= '<tr>
		<td></td>
		<td><input type="submit" name="speichern" value="speichern"></td>
	</tr>
</table>';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if ($save) {
	global $arr_form;
	global $table, $tid;

	//// EDIT_SKRIPT
	$sql = '';
	/////////////////////

	foreach($arr_form as $arr) {
		$tmp = $arr[0];
		$val = $_POST[$tmp];

		if ($tmp != "region") $sql .= $tmp. "='" .trim($val). "', ";
	}

	$sql = substr($sql, 0, -2);

	if ($neu) {
		$sql  = "INSERT $table set $sql";
		$res  = safe_query($sql);
		$edit = mysqli_insert_id($mylink);
		unset($neu);
	}
	else {
		$sql = "update $table set $sql WHERE $tid=$edit";
		$res = safe_query($sql);
		$edit = 0;
	}
	// echo $sql;
	// $edit = 0;
}
elseif ($del) {
	die('<p>M&ouml;chten Sie den '.$um_wen_gehts.' wirklich l&ouml;schen?</p>
	<p><a href="?delete='.$del.'">Ja</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="?">Nein</a></p>
	');
}
elseif ($delete) {
	global $table, $tid;
	$sql = "DELETE FROM $table WHERE $tid=$delete";
	$res = safe_query($sql);
}
elseif($delimg) {
	$sql = "SELECT $delimg FROM $table WHERE $tid=$edit";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);

	unlink("../images/team/".$row->$delimg);

	$sql = "UPDATE $table SET $delimg='' WHERE $tid=$edit";
	safe_query($sql);

}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if ($neu) 		echo neu("neu");
elseif ($edit) 	echo edit($edit);
else			echo liste($id).$new;

echo '
</form>
';

include("footer.php");

?>
