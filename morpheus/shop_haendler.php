<?php
session_start();
# # # # # # # # # # # # # # # # # # # # # # # # # # #
# www.pixel-dusche.de                               #
# björn t. knetter                                  #
#                                                   #
# post@pixel-dusche.de                              #
# frankfurt am main, germany                        #
# # # # # # # # # # # # # # # # # # # # # # # # # # #

global $kat_arr;

$haendler_in = 'in';

include("cms_include.inc");

echo "\n\n<div id=content_big class=text>\n<p><strong>Kunden / Vertrieb Verwaltung</strong></p>\n\n";

$arr 	= array("knr"=>"Kundennummer", "name1"=>"Name 1", "name2"=>"Name 2", "textde"=>"Text DE", "texten"=>"Text EN", "ansprech"=>"Ansprechpartner", "plz"=>"PLZ", "ort"=>"Ort", "strasse"=>"Strasse", "map"=>"Koordinaten", "lid"=>"Land", "fon1"=>"Telefon 1", "fon2"=>"Telefon 2", "fax"=>"Telefax", "internet"=>"Internet WWW <strong>ohne</strong> \"http://\"<br>Bsp.: www.domain.de", "email1"=>"E-Mail 1", "email2"=>"E-Mail 2", "distributor"=>"Distributor (1)<br>Premiumh&auml;ndler (2)", "shop1"=>"Shop 1 Url", "shopde1"=>"Shop Beschr. DE", "shopen1"=>"Shop Beschr. EN", "shop2"=>"Shop 2 Url", "shopde2"=>"Shop 2 Beschr DE", "shopen2"=>"Shop 2 Beschr EN", "webshop"=>"Webshop", "upd"=>"frei geschaltet");
$arr 	= array_flip($arr);

$anz 	= array("knr"=>"Kundennummer", "name1"=>"Name 1", "plz"=>"PLZ", "ort"=>"Ort", "email1"=>"E-Mail 1");
$anz 	= array_flip($anz);

$neu 	= $_REQUEST["neu"];
$edit 	= $_REQUEST["edit"];
$save 	= $_REQUEST["save"];
$del	= $_REQUEST["del"];
$delete	= $_REQUEST["delete"];

$tab	= "morp_haendler";
$spid	= "kid";

$col 	= array("#FFFFFF","#EFECEC", "cccccc", "cde6fa");

if ($del) {
	die("<p><font color=#ff0000><b>Wollen Sie den Haendler wirklich löschen?</b></font></p>
				<p>&nbsp; &nbsp; &nbsp; <a href=\"?delete=$del\">" .ilink() ." ja</a> &nbsp; &nbsp; &nbsp; <a href=\"?\">" .backlink() ." nein</a></p></body></html>");
}

elseif ($delete) {
	$query = "delete from $tab where $spid=$delete";
	safe_query($query);
}

elseif ($save) {
	foreach ($arr as $key=>$val) {
		$set .= "$val='". $_REQUEST[$val]."', ";
	}

	if ($neu) 	$sql = "INSERT ";
	else 		$sql = "UPDATE ";

	$sql .= $tab." set ".substr($set, 0, -2);

	if ($edit) $sql .= " WHERE $spid=$edit";

	$res = safe_query($sql);

	// include("set_nav.php");

	unset($edit);
	unset($neu);
}

if ($edit || $neu) {
	echo '<form method="post"><table>';

	if ($edit) {
		$sql = "SELECT * FROM $tab WHERE $spid=$edit";
		$res = safe_query($sql);
		$row = mysqli_fetch_object($res);
	}

	foreach ($arr as $key=>$val) {
		echo '<tr><td>'.$key.'</td><td>';
		if (isin("^Text", $key)) 		echo '<textarea cols="" rows="8" name="'.$val.'" style="width: 400px;">'.$row->$val.'</textarea>';
		elseif (isin("^Land", $key)) 	echo '<select name="'.$val.'">'.pulldown ($row->$val, "morp_haendler_land", "landde", "lid").'</select>';
		else 							echo '<input type="text" name="'.$val.'" value="'.$row->$val.'" style="width: 400px;">';
		echo '</td></tr>';
	}

	echo '<tr><td>&nbsp;<br><input type="hidden" name="neu" value="'.$neu.'"><input type="hidden" name="edit" value="'.$edit.'"><input type="submit" class="button" value="speichern" name="save"></td></tr></table></form>';
}

else {
	#############################################################################################
	$knr  	= $_GET["knr"];
	$name 	= $_GET["name"];
	$land 	= $_GET["land"];
	$distr 	= $_GET["distr"];
	$prem 	= $_GET["prem"];

	$sql  = "SELECT * FROM $tab h, morp_haendler_land hl WHERE h.lid=hl.lid";

	if ($knr)   $sql .= " AND knr LIKE '$knr%' ";
	if ($name)  $sql .= " AND name1 LIKE '$name%' OR name2 LIKE '$name%' ";
	if ($land)  $sql .= " AND landde LIKE '$land%' ";
	if ($distr) $sql .= " AND distributor = 1 ";
	if ($prem)  $sql .= " AND distributor = 2 ";

	$sql .= " ORDER BY hl.lid, knr, name1";
	$res  = safe_query($sql);
	$ct   = 0;

	echo '
	<form method="get">
		<div class="mb2 mt2">
			Kunden Nr.: <input type="text" name="knr" value="'.$knr.'" style="width: 50px;"> &nbsp; Name: <input type="text" name="name" value="'.$name.'" style="width: 50px;"> &nbsp; Land: <input type="text" name="land" value="'.$land.'" style="width: 50px;"> &nbsp; Distributor <input type="Checkbox" name="distr" value="1"'.($distr ? ' checked' : '').'> &nbsp;  &nbsp; Premium-H&auml;ndler <input type="Checkbox" name="prem" value="1"'.($prem ? ' checked' : '').'> &nbsp; <input type="submit" class="button" name="suchen" value="suchen">
		</div>
	</form>';

	echo '<table class="autocol small smallpad">';
	$x = 0;

	while($row = mysqli_fetch_object($res)) {
		if ($row->distributor == 1) $ct = 2;
		if ($row->distributor == 2) $ct = 3;
		$x++;

		echo '<tr bgcolor='.($row->upd ? $col[$ct] : '#1997c6').'><td>'.$x.'</td>';
		foreach ($anz as $key=>$val) {
			$data = $row->$val;
			echo '<td>'.substr($data, 0, 30).'</td>';
		}
		echo '<td>'.substr($row->landde, 0, 2).'</td>';
		echo '<td>'.$row->upd.'</td>';
		echo '<td> &nbsp; <a href="?edit='.$row->kid.'"><i class="fa fa-pencil-square-o"></i></a></td>';
		echo '<td> &nbsp; <a href="?del='.$row->kid.'"><i class="fa fa-trash-o"></i></a></td>';
		if ($ct == 3)
			echo '<td> &nbsp; <a href="shop_haendler_prem.php?kid='.$row->kid.'"><strong>&raquo; PLZ</strong></a></td>';
		echo '</tr>';

		if ($ct == 0) $ct = 1;		//farbendefenition
		else $ct = 0;
	}

	echo '</table>';

	echo "&nbsp;<br>
		<a href=\"?neu=1\">".ilink()." Neuen Kunden hinzuf&uuml;gen</a><p>&nbsp;</p>
		";
	#############################################################################################
}
?>

<?php
include("footer.php");
?>