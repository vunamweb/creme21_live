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

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
// print_r($_REQUEST);

global $arr_form;

// NICHT VERAENDERN ///////////////////////////////////////////////////////////////////
$edit 	= $_REQUEST["edit"];
$delimg = $_REQUEST["delimg"];
$neu	= $_REQUEST["neu"];
$save	= $_REQUEST["save"];
$del	= $_REQUEST["del"];
$delete	= $_REQUEST["delete"];
$id		= $_REQUEST["id"];
///////////////////////////////////////////////////////////////////////////////////////


//// EDIT_SKRIPT
$um_wen_gehts 	= "Veranstaltungs Orte";
$titel			= "Veranstaltungs Orte";
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
	array("veranstOrt", "Veranst Ort / Hotel", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("plz", "PLZ", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("stadt", "Stadt", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
	array("strasse", "Straße", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
#	array("www", "Webadresse www", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
#	array("strasse", "Straße", '<input type="Text" value="#v#" name="#n#" style="#s#">'),

);

//	$set = " set stadt='".$_POST["stadt"]."', veranstOrt='".$_POST["veranstOrt"]."', raum='".$_POST["raum"]."', text='".$_POST["text"]."', plz='".$_POST["plz"]."', strasse='".$_POST["strasse"]."'";

///////////////////////////////////////////////////////////////////////////////////////


#	array("mberechtigung", "Berechtigung (ID: 1 = Zugang)", '<input type="Text" value="#v#" name="#n#" style="#s#">'),
# 	array("ausbildungen", "<strong>Ausbildung EN</strong>", '<textarea cols="80" rows="5" name="#n#">#v#</textarea>'),
# 	array("imgid", "Berechtigung (ID: 1 = Zugang)", 'sel', 'image', 'imgname'),

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function liste() {
	//// EDIT_SKRIPT
	$db = "morp_event_orte";
	$id = "oid";
	$ord = "stadt, veranstOrt";
	$anz2 = "veranstOrt";
	$anz = "stadt";
	////////////////////

	$echo .= '<p>&nbsp;</p><table width="100%" cellspacing="0" cellpadding="0" class="autocol">';

	$sql = "SELECT * FROM $db WHERE 1 ORDER BY ".$ord."";
	$res = safe_query($sql);

	while ($row = mysqli_fetch_object($res)) {
		$edit = $row->$id;
		$echo .= '<tr>
			<td width="600"><p><a href="?edit='.$edit.'">'.$row->plz.' '.$row->$anz.' / '.$row->$anz2.'</strong></a></p></td>
			<td valign="top"><a href="?edit='.$edit.'"><i class="fa fa-pencil-square-o"></a></td>
			<td valign="top"><a href="?del='.$edit.'"><i class="fa fa-trash-o"></a></td>
		</tr>';
	}

	$echo .= '</table><p>&nbsp;</p>';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function edit($edit) {
	global $arr_form;

	//// EDIT_SKRIPT
	$db = "morp_event_orte";
	$id = "oid";
	/////////////////////

	$sql = "SELECT * FROM $db WHERE $id=".$edit."";
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
		$get = $arr[0];

		if ($arr[2] == "sellan") {
			$echo .= '<tr><td>'.$arr[1].'</td><td><select name="lan">';
			$echo .= '<option value="1" '. ($row->lan == 1 ? ' selected' : '') .'>Deutsch</option>';
			$echo .= '<option value="2" '. ($row->lan == 2 ? ' selected' : '') .'>English</option>';
			$echo .= '<option value="3" '. ($row->lan == 3 ? ' selected' : '') .'>Francais</option>';
			$echo .= '</select></td></tr>';
		}
		elseif ($arr[2] == "sel") {
			$echo .= '<tr><td>'.$arr[1].'</td><td><select name="'.$arr[0].'">'.pulldown ($row->$get, $arr[3], $arr[4], $arr[0]).'</select></td></tr>';
		}
		elseif ($arr[2] == "text") {
			$echo .= '<tr><td>'.$arr[1].'</td><td>'.repl("#e#", $edit, $arr[3]).'</td></tr>';
		}
		else $echo .= '<tr>
		<td>'.$arr[1].':</td>
		<td>'. repl(
					array("#v#", "#n#", "#s#", "#db#", '#e#', '#id#', '#s1#', '#s0#'),
					array($row->$get, $arr[0], 'width:400px;', $db2, $edit, $id2, $sel1, $sel2),
			$arr[2]).'</td>
	</tr>';
	}

	$echo .= '<tr><td><td><input type=hidden name="image" value="' .$image .'" style="width:500px"></td></tr>';

	$echo .= '
	<tr>
		<td></td>
		<td><input type="submit" name="speichern" value="speichern"></td>
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
		if ($x <= 2) $echo .= '<tr>
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

	//// EDIT_SKRIPT
	$sql = '';
	$db = "morp_event_orte";
	$id = "oid";
	/////////////////////

	foreach($arr_form as $arr) {
		$tmp = $arr[0];
		$val = $_POST[$tmp];

		if ($tmp != "region") $sql .= $tmp. "='" .trim($val). "', ";
	}

	$sql = substr($sql, 0, -2);

	if ($neu) {
		$sql  = "INSERT $db set $sql";
		$res  = safe_query($sql);
		$edit = mysqli_insert_id($mylink);
		unset($neu);
	}
	else {
		$sql = "update $db set $sql WHERE $id=$edit";
		$res = safe_query($sql);
		unset($edit);
	}
	// echo $sql;
	//unset($edit);
}
elseif ($del) {
	die('<p>M&ouml;chten Sie den '.$um_wen_gehts.' wirklich l&ouml;schen?</p>
	<p><a href="?delete='.$del.'">Ja</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="?">Nein</a></p>
	');
}
elseif ($delete) {
	$sql = "DELETE FROM morp_event_orte WHERE sid=$delete";
	$res = safe_query($sql);
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