<?php
session_start();
// phpinfo();
# # # # # # # # # # # # # # # # # # # # # # # # # # #
# www.pixel-dusche.de                               #
# björn t. knetter                                  #
# start 12/2003                                     #
#                                                   #
# post@pixel-dusche.de                              #
# frankfurt am main, germany                        #
# # # # # # # # # # # # # # # # # # # # # # # # # # #

include("cms_include.inc");

function pdf ($pgid) {
	$query  = "SELECT * FROM morp_media_group order by pgname";
	$result = safe_query($query);
	while ($row = mysqli_fetch_object($result)) {
	 	$id = $row->pgid;
		$nm = $row->pgname;
		if ($pgid == $id) $sel = "selected";
		else unset ($sel);
		$tmp .= "<option value=\"$id\" $sel>$nm</option>\n";
	}
	return $tmp;
}

$pgid 	 = $_REQUEST["pgid"];
if (!$pgid) $db = "morp_media_group";
else $db = "morp_media";

$save 	 = $_REQUEST["save"];
$neu 	 = $_REQUEST["neu"];
$del 	 = $_REQUEST["del"];
$delete	 = $_REQUEST["delete"];
$edit	 = $_REQUEST["edit"];
$pid	 = $_REQUEST["pid"];
$date	 = $_REQUEST["pdate"];
$pdesc	 = $_REQUEST["pdesc"];
$reload	 = $_REQUEST["reload"];
$pdf 	 = $_FILES['userfile']['name'];
$ptmp 	 = $_FILES['userfile']['tmp_name'];

$artnr	 = $_REQUEST["artnr"];
$ansicht = $_REQUEST["ansicht"];
$pshop = $_REQUEST["pshop"];
$farbnr	 = $_REQUEST["farbnr"];

echo "<div id=content_big class=text>\n<p><b>Verwaltung Download Dokumente</b></p>";

if ($del && $pgid) {
	echo '<p>&nbsp;</p><p><font color=#ff0000><b>Sind Sie sich sicher, dass sie den Download löschen wollen?</b></font></p>
		<p>&nbsp; &nbsp; &nbsp; <a href="morp_media.php?delete=' .$del .'&pgid=' .$pgid .'">Ja</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="morp_media.php?pgid='.$pgid.'">Nein</a></p></body></html>';
	die();
}
elseif ($delete && $pgid) {
	$query = "SELECT * FROM morp_media WHERE pid=$delete";
	$result = safe_query($query);
	$row = mysqli_fetch_object($result);
 	$de = $row->pname;

	$query = "delete from morp_media WHERE pid=$delete";
	$result = safe_query($query);

	$pfad = getDownloadDirectoy($pgid);

	unlink($pfad.$de);
}
elseif ($save && $pgid) {
	$name = $_POST["pname"];
	$query = "UPDATE morp_media SET pdesc='$pdesc', farbnr='$farbnr', ansicht='$ansicht', pshop='$pshop', artnr='$artnr', pdate='" .us_dat($date) ."', pgid=$pgid WHERE pid=$edit";
	safe_query($query);
	protokoll($uid, "morp_media", $edit, "edit");

	unset($edit);
}
elseif ($save) {
	$pgname = $_POST["pgname"];
	$pgart = $_POST["pgart"];
	if ($neu) $query = "INSERT $db ";
	else $query = "UPDATE $db ";

	$query .= "set pgname='$pgname', pgart = $pgart";
	if (!$neu) $query .= " WHERE pgid=$edit";
	# echo $query;
	$res = safe_query($query);

	if (!$neu) protokoll($uid, $db, $edit, "edit");
	else {
		$c = mysqli_insert_id();
		protokoll($uid, $db, $c, "neu");
	}

	unset($edit);
	unset($neu);
}

if ($edit && $pgid) {
		$query  = "SELECT * FROM $db WHERE pid=$edit";
		$result = safe_query($query);
		$row = mysqli_fetch_object($result);
	 	$id = $row->pid;
	 	$pg = $row->pgid;
		$de = $row->pdesc;
		$nm = $row->pname;
		$si = $row->psize;
		$da = $row->pdate;
		$da = euro_dat($da);

		$artnr = $row->artnr;
		$farbnr = $row->farbnr;
		$ansicht = $row->ansicht;
		$pshop = $row->pshop;

		$pfad = getMediaDirectoy($pgid);

	echo '

	'.'<form method="post" name="morp_media">
		<input type="hidden" name="save" value="1">
		<input type="hidden" name="edit" value="'.$id.'">
		<input type="hidden" name="pgid" value="'.$pg.'">
		<input type="hidden" name="neu" value="'.$neu.'">


		'
		.'
  		<div class="col-sm-2">
			<strong>Dateiname</strong>
		</div>
  		<div class="col-sm-9">
  			'.$nm.' <img src="mthumb.php?w=50&h=50&src='.$pfad.$nm.'" />
		</div>
  		<div class="col-sm-12 mb2 mt1">
  			<a href="morp_media_upload.php?reload='.$id.'&pgid='.$pgid.'" class="btn btn-info">neues dokument uploaden</a>
		</div>
		<div class="form-group">
			<label for="pdate" class="col-sm-3 control-label">Datum</label>
		    <div class="col-sm-9"><input type="pdate" class="form-control" id="pdate" value="'.$da.'"></div>
		</div>
		<div class="form-group">
			<label for="pdesc" class="col-sm-3 control-label">Dateibeschreibung</label>
		    <div class="col-sm-9"><input type="pdesc" class="form-control" id="pdesc" value="'.$de.'"></div>
		</div>
		<div class="form-group">
			<label for="artnr" class="col-sm-3 control-label">Artikelnummer</label>
		    <div class="col-sm-9"><input type="artnr" class="form-control" id="artnr" value="'.$artnr.'"></div>
		</div>
		<div class="form-group">
			<label for="farbnr" class="col-sm-3 control-label">Farbe</label>
		    <div class="col-sm-9"><input type="farbnr" class="form-control" id="farbnr" value="'.$farbnr.'"></div>
		</div>
		<div class="form-group">
			<label for="ansicht" class="col-sm-3 control-label">Ansicht</label>
		    <div class="col-sm-9"><input type="ansicht" class="form-control" id="ansicht" value="'.$ansicht.'"></div>
		</div>
<!--		<div class="form-group">
			<label for="pshop" class="col-sm-3 control-label">Im Shop (0/1)</label>
		    <div class="col-sm-9">
			    <input type="pshop" class="form-control" id="pshop" value="'.$pshop.'">
			</div>
		</div>
-->
		<div class="form-group">
			<label for="pshop" class="col-sm-3 control-label">Im Shop</label>
		    <div class="col-sm-9">
				<label>
			    	<input type="radio" name="pshop" value="1"'.($pshop ? ' checked' : '').'> Ja
				</label>
				<label>
					<input type="radio" name="pshop" value="0"'.($pshop ? '' : ' checked').'> Nein
				</label>
			</div>
		</div>
		<div class="form-group">
			<label for="pshop" class="col-sm-3 control-label">Gruppen-Zugehörigkeit</label>
		    <div class="col-sm-9"><select name="pgid" class="form-control">' .pdf($pgid) .'</select></div>
		</div>

		<div class="form-group">
			<button type="submit" name="erstellen" class="btn btn-success mt2">speichern</button>
		</div>

	</form>

	<p class="mt5"><a href="morp_media.php?pgid='.$pgid.'" title="zur&uuml;ck" class="btn btn-info"><i class="fa fa-chevron-left"></i> zur&uuml;ck</a></p>';
}
elseif (($neu || $reload) && $pgid) {
	echo "<form action=\"morp_media.php\" method=post enctype=\"multipart/form-data\">\n\n
		<input type=\"File\" name=\"userfile\" class=text><p>
		<input name=pid type=hidden value=$reload>
		<input name=pgid type=hidden value=$pgid>
		<input type=submit style=\"background-color:#7B1B1B;color:#FFFFFF;font-weight:bold;width:100px;\" value=\"upload starten\" style=\"width:100px;background-color:#BBBBBB\">
		</form>";

	echo "<p><a href=\"morp_media.php?pgid=$pgid\" title=\"zur&uuml;ck\">" .backlink() ." EEEE zur&uuml;ck</a></p>";
}
elseif ($edit || $neu || $rn) {
	if (!$neu) {
		$query  = "SELECT * FROM $db WHERE pgid=$edit";
		$result = safe_query($query);
		$row = mysqli_fetch_object($result);
		$nm  = $row->pgname;
		$art = $row->pgart;
	}

	$bereich_bez = array("","Standard Download","Infomaterial Download mit Formular");
	$bereich_anz = count($bereich_bez)-1;
	if (!$bereich) $bereich = 1;

	for($i=1; $i <= $bereich_anz; $i++) {
		$radio .= '<p><input type="radio" name="pgart" value="'.$i.'"';
		if ($art == $i) $radio .= ' checked';
		$radio .= '> &nbsp; '.$bereich_bez[$i].'</p>';
	}

	echo "<form method=post name=morp_media>
		<input type=hidden name=save value=1>
		<input type=hidden name=edit value=$edit>
		<input type=hidden name=neu value=$neu>
		<p>Name der Download-Gruppe &nbsp; <input type=text name=pgname value='$nm'></p>
		<p>&nbsp;</p>
		<p>$radio</p>
		<p>&nbsp;</p>
		<p><input type=submit style=\"background-color:#7B1B1B;color:#FFFFFF;font-weight:bold;width:100px;\" name=erstellen value=speichern style=\"width:70;background-color:#BBBBBB;\"></p>
		</form>
		";

	echo "<p><a href=\"morp_media.php\" title=\"zur&uuml;ck\">ii " .backlink() ." JJJJ zur&uuml;ck</a></p>";
}
elseif($pdf) {
	$pfad = getDownloadDirectoy($pgid);
	$newpdf = $pdf;

	if (!copy($ptmp, $pfad.$newpdf)) {
		echo ("<p>failed to copy $tmp...$val<br>\n");
		die();
	}
	else {
		$size  = filesize($ptmp);
		$size  = $size/1024;
		$date = date(Y ."-" .m ."-" .d);
		if ($pid) $sql = "UPDATE morp_media SET pname='$newpdf', pdate='$date', psize=$size, edit=1, pgid=$pgid WHERE pid=$pid";
		else $sql = "INSERT morp_media SET pname='$newpdf', pdate='$date', psize=$size, pgid=$pgid";
		safe_query($sql);
		echo "<p>Upload erfolgreich abgeschlossen</p>
			<p><a href='morp_media.php?pgid=$pgid'>nn " .backlink() ." GGG zur&uuml;ck</a></p>";
	}
}
elseif ($pgid)	{
	$pfad = getMediaDirectoy($pgid);

	echo '
	<p class="mt2">
		<a href="morp_media_group.php" title="zur&uuml;ck" class="btn btn-info"><i class="fa fa-chevron-left"></i> zur&uuml;ck</a>  &nbsp; &nbsp; &nbsp; &nbsp;
		<a href="morp_media_upload.php?neu=1&pgid='.$pgid.'" class="btn btn-success"><i class="fa fa-plus"></i> Neue Dokumente uploaden</a>
	</p>

	<table class="autocol small left">
';

	echo '<tr>
			<th>name</th>
			<th></th>
			<th>beschreibung</th>
			<th>größe</th>
			<th>artnr</th>
			<th>shop</th>
			<th>ansicht</th>
			<th>datum</th>
			<th></th>
		</tr>
';

	$col = array("#FFFFFF","#EFECEC");
	$ct  = 0;

	$query  = "SELECT * FROM morp_media WHERE pgid=$pgid order by pname";
	$result = safe_query($query);
	while ($row = mysqli_fetch_object($result)) {
	 	$id = $row->pid;
		$de = $row->bezeichnung;
		$nm = $row->pname;
		$si = $row->psize;
		$da = $row->pdate;
	 	$da = euro_dat($da);
		$th = $row->thumb;

		$ar = $row->artnr;
		$an = $row->ansicht;
		$fn = $row->pshop;

	 	if(file_exists($pfad.$th) && $th) { $thumb = '<img src="mthumb.php?w=50&h=50&src='.$pfad.$th.'" />'; $class = ' class="nopad"'; }
	 	else { $thumb = ''; $class = ' '; }

		echo "<tr $class bgcolor=$col[$ct]>
				<td><a href=\"?edit=$id&pgid=$pgid\">$nm</a></td>
				<td><a name=\"Download anzeigen\" href=\"".$pfad."$nm\" target=\"_blank\" title=\"Download anzeigen\">$thumb</a></td>
				<td>$de</td>
				<td>$si kb</td>
				<td>$ar</td>
				<td align=\"center\">$fn</td>
				<td>$an</td>
				<td>$da</td>
				<td><a href=\"morp_media.php?edit=$id&pgid=$pgid\"><i class=\"fa fa-pencil-square-o\"></i></a></td>
				<td><a href=\"morp_media.php?del=$id&pgid=$pgid\"><i class=\"fa fa-trash-o\"></i></a></td>
			</tr>
			";
		if ($ct == 0) $ct = 1;		//farbendefenition
		else $ct = 0;
	}
	echo '</table>

		<p>&nbsp;</p>

		<p><a href="morp_media_upload.php?neu=1&pgid='.$pgid.'" class="btn btn-success"><i class="fa fa-plus"></i> Neue Dokumente uploaden</a></p>
';
}
else {
	$col = array("#FFFFFF","#EFECEC");
	$ct  = 0;

	echo 'UUUUUUUUU <table cellspacing="1">';

	$query  = "SELECT * FROM $db order by pgname";
	$result = safe_query($query);
	while ($row = mysqli_fetch_object($result)) {
	 	$id = $row->pgid;
	 	$nm = $row->pgname;
		echo "<tr bgcolor=$col[$ct] height=20><td width=250>&nbsp; <a href=\"morp_media.php?pgid=$id\">" .ilink() ." <b>$nm</b></a>";
		if ($admin) echo '&nbsp; &nbsp; <a href="morp_media.php?edit='.$id.'&db='.$db.'"><img src="images/stift.gif" width="9" height="9" alt="editiere name" border="0"></a>';
		echo '</td><td width=50 align="center"><a href="morp_media.php?pgid='.$id.'"><img src="images/edit.gif" alt="öffne ordner" border="0"></a></td></tr>';

		if ($ct == 0) $ct = 1;		//farbendefenition
		else $ct = 0;
	}
	echo "</table>";
	if ($admin) echo "<p><a href=\"morp_media.php?neu=1\">" .ilink() ." NEU</a></p>";
}
?>

</div>

<?php
include("footer.php");
?>