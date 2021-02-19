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

echo "\n\n<div id=content_big class=text>\n<p><strong>L&auml;nder Verwaltung</strong></p>\n\n";

$arr 	= array("Land DE"=>"landde", "Land EN"=>"landen", "Land Kurzbezeichnung"=>"landkurz", "Top"=>"top", "Links"=>"lef", "Highlight / Hervorhebung DE"=>"landhlde", "Highlight / Hervorhebung EN"=>"landhlen");

$neu 	= $_REQUEST["neu"];
$edit 	= $_REQUEST["edit"];
$save 	= $_REQUEST["save"];
$land 	= $_REQUEST["land"];
$sort	= $_REQUEST["sort"];
$sortid	= $_REQUEST["sortid"];
if (!$land) $land = "sortde";

$tab	= "morp_haendler_land";


echo '
	<p class="mt2 mb2">
		<a href="?repair=1&land='.$land.'" class="btn btn-info"><i class="fa fa-refresh"></i> sortierung aktualisieren</a>
			<img src="images/leer.gif" alt="" width="50" height="1" border="0">
		<a href="?land=sortde"><img src="images/de.gif" alt="" width="13" height="9" border="0"'. ($land == "sortde" ? ' style="border: solid 2px #000;"' : '').'></a>
			&nbsp; &nbsp;
		<a href="?land=sorten"><img src="images/en.gif" alt="" width="16" height="9" border="0"' . ($land == "sorten" ? ' style="border: solid 2px #000;"' : '').'></a>
	</p>
';


if ($save) {
	foreach ($arr as $key=>$val) {
		$set .= "$val='". $_REQUEST[$val]."', ";
	}

	if ($neu) 	$sql = "INSERT ";
	else 		$sql = "UPDATE ";

	$sql .= $tab." set ".substr($set, 0, -2);

	if ($edit) $sql .= " WHERE lid=$edit";

	$res = safe_query($sql);
	unset($edit);
	unset($neu);

	// include("set_nav.php");
}

elseif ($_REQUEST["repair"]) {
	$arr 		= array();
	$xx 		= 0;

	$sql  		= "SELECT * FROM $tab WHERE 1 ORDER BY $land";
	$res 		= safe_query($sql);

	while ($rw = mysqli_fetch_object($res)) $arr[] = $rw->lid;

	foreach ($arr as $val) {
		$xx++;
		$sql  = "update $tab set $land = $xx WHERE lid=$val";
		$res = safe_query($sql);
	}
}

# wenn sortierung geaendert wurde, jetzt in db schreiben
elseif ($sort) {
	if ($sort == "up") $s2 = $sortid - 1;
	else $s2 = $sortid + 1;

	$sort_    = array($sortid, $s2);
	$sort_new = array($s2, $sortid);
	$sort_arr = array();

	for($i=0; $i<=1; $i++) {
		$query  	= "SELECT * FROM $tab WHERE $land=$sort_[$i]";
		$result 	= safe_query($query);
		$row 		= mysqli_fetch_object($result);
		$sort_arr[] = $row->lid;
	}

	for($i=0; $i<=1; $i++) {
		$query  = "update $tab set $land=$sort_new[$i] WHERE lid=$sort_arr[$i]";
		safe_query($query);
	}
}




if ($edit || $neu) {
	echo '<form method="post"><table>';

	if ($edit) {
		$sql = "SELECT * FROM $tab WHERE lid=$edit";
		$res = safe_query($sql);
		$row = mysqli_fetch_object($res);
	}

	foreach ($arr as $key=>$val) {
		echo '<tr><td>'.$key.'</td><td><input type="text" name="'.$val.'" value="'.$row->$val.'"></td></tr>';
	}

	echo '<tr><td>&nbsp;<br><input type="hidden" name="neu" value="'.$neu.'"><input type="hidden" name="edit" value="'.$edit.'"><input type="submit" class="button" value="speichern" name="save"></td></tr></table></form>';
}

else {
	#############################################################################################
	$sql = "SELECT * FROM $tab WHERE 1 ORDER BY landde";
	$res = safe_query($sql);
	$x	 = 0;
	$y	 = mysqli_num_rows($res);

	echo '<table class="autocol small">';

	while($row = mysqli_fetch_object($res)) {
		$lde = $row->landde;
		$len = $row->landen;
		$lk  = $row->landkurz;
		$hld = $row->landhlde;
		$hle = $row->landhlen;
		$lid = $row->lid;
		$so  = $row->$land;
		$x++;

		if ($hld) $strongde = '<strong>';
		else unset ($strongde);

		if ($hle) $strongen = '<strong>';
		else unset ($strongen);

		echo '<tr>';

/*
		if ($x > 1) echo "<td width=20>&nbsp; <a href=\"?sort=up&sortid=$so&land=$land\" title=\"eine Position nach oben\">" .up() ."</a></td>\n";
		else echo "<td width=20></td>\n";

		if ($x < $y) echo "<td width=20><a href=\"?sort=down&sortid=$so&sortland=$land\" title=\"eine Position nach unten\">" .down() ."</a></td>\n";
		else echo "<td width=20></td>\n";

		echo '<td width="50">'.$lk.'</td><td width="150">'.$strongde.$lde.'</td><td width="100">'.$strongen.$len.'</td><td><a href="?edit='.$lid.'"><img src="images/stift.gif" alt="" width="9" height="9" border="0"></a></td></tr>
	';
*/


		echo '<td width="100">'.$lk.'</td><td width="150">'.$strongde.$lde.'</td><td width="100">'.$strongen.$len.'</td><td><a href="?edit='.$lid.'"><img src="images/stift.gif" alt="" width="9" height="9" border="0"></a></td></tr>
	';

		$world .= '<div style="position:absolute; left:'.$row->lef.'px; top:'.$row->top.'px;"><span style="font-family:arial; font-size:11px;">'.$row->landde.'</span></div>
		';


	}

	echo '</table>';

	echo '&nbsp;<br>
		<a href="?neu=1" class="btn btn-info"><i class="fa fa-plus"></i> Neues Land hinzuf&uuml;gen</a><p>&nbsp;</p>
		';

/*
	echo '
		<div class="linksgrau" style="position:absolute; left:50px; top:620px; width:580px; height:343px;">
			<img src="../images/weltkarte.gif" width="580" height="343" alt="" border="0">
			'.$world.'
		</div>
		';
*/

	#############################################################################################
}
?>

<?php
include("footer.php");
?>