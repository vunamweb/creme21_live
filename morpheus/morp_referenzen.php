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
$myauth = 10;
include("cms_include.inc");

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

# print_r($_SESSION);
# print_r($_REQUEST);

///////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
//// EDIT_SKRIPT
$um_wen_gehts 	= "Referenzen";
$titel			= "Referenzen Verwaltung";
///////////////////////////////////////////////////////////////////////////////////////
$table 		= 'morp_referenzen';
$tid 		= 'refid';
$nameField 	= "name";
$sortField 	= 'reihenfolge';

///////////////////////////////////////////////////////////////////////////////////////

// $new = '<a href="?neu=1" class="btn btn-info"><i class="fa fa-plus"></i> NEU</a>';
$new = '<p><a href="?new=1" class="btn btn-info"><i class="fa fa-plus"></i> NEU</a></p>';

echo '<div id=vorschau>
	<h2>'.$titel.'</h2>

	'. ($edit || $neu ? '<p><a href="?">&laquo; zur&uuml;ck</a></p>' : '') .'
	<form action="" onsubmit="" name="verwaltung" method="post">
'.($edit || $neu ? '' : '').'
'.(!$edit && !$neu ? '' : '').'
';

// print_r($_POST);

/////////////////////////////////////////////////////////////////////////////////////////////////////
#$sql = "ALTER TABLE  $table ADD  `fFirmenFilterID` INT( 11 ) NOT NULL";
#safe_query($sql);
/////////////////////////////////////////////////////////////////////////////////////////////////////

$arr_form = array(
//	array("reihenfolge", "Reihenfolge", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
	array("sn", "Kurzname", '<input type="Text" value="#v#" class="form-control" name="#n#" style="width:150px;" />'),
	array("kunde", htmlspecialchars("Kunde // light italic <i> – bold italic <bi> – light <l>"), '<textarea class="form-control" name="#n#">#v#</textarea>'),
	array("kategorie", "Kategorie", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
	array("abstract", "Leistung", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),

	array("name", "Name", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
	array("land", "Land", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
	array("rgb", "RGB Wert", '<input type="Text" value="#v#" class="form-control" name="#n#" placeholder="179,134,127"  style="width:150px;" />'),

 	array("beschreibung", "Beschreibung Absatz 1", '<textarea class="form-control" name="#n#">#v#</textarea>'),
 	array("beschreibung2", "Beschreibung Absatz 2", '<textarea class="form-control" name="#n#">#v#</textarea>'),
	array("tags", "Tags", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
# 	array("weitere", "Weitere Projekte", '<textarea class="form-control" name="#n#">#v#</textarea>'),

array("", "CONFIG", '</div><div class="col-md-3">'),

	array("img14", "Übersichtsbild Home", 'fotoG', 'image', 'imgname', 6, 'gid'),
	array("img", "Übersichtsbild Referenzen", 'fotoG', 'image', 'imgname', 6, 'gid'),

array("", "CONFIG", '</div><div class="col-md-3">'),

	array("abstract_pos", "Position Text Startseite", 'dropdown_array', array(1=>"Links oben",2=>"Links unten",3=>"rechts oben",4=>"rechts unten") ),
	array("abstract_color", "Textfarbe Startseite", 'dropdown_array', array('#fff'=>'weiss', '#2F404C'=>'grau')),

array("", "CONFIG", '</div><div class="col-md-6">'),

	array("img_header", "<hr>Header Bild groß", 'foto', 'image', 'imgname', 6, 'gid'),

array("", "CONFIG", '</div><div class="col-md-6">'),

array("", "CONFIG", '<div><br><hr>Referenz Bilder</div>'),

	array("img1", "1", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu1", "Bildunterschrift 1", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),


	array("img2", "2", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu2", "Bildunterschrift 2", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),

	array("img3", "3", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu3", "Bildunterschrift 3", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),

	array("img4", "4", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu4", "Bildunterschrift 4", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),

	array("img5", "5", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu5", "Bildunterschrift 5", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),

	array("img6", "6", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu6", "Bildunterschrift 6", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),


	array("img7", "7", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu7", "Bildunterschrift 7", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),

	array("img8", "8", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu8", "Bildunterschrift 8", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),

	array("img9", "9", 'fotoG', 'image', 'imgname', 6, 'gid'),
	array("img10", "10", 'fotoG', 'image', 'imgname', 6, 'gid'),
	array("img11", "11", 'fotoG', 'image', 'imgname', 6, 'gid'),
	array("img12", "12", 'fotoG', 'image', 'imgname', 6, 'gid'),
	array("img13", "13", 'fotoG', 'image', 'imgname', 6, 'gid'),
#	array("bu9", "Bildunterschrift 9", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),


#	array("img2", "Foto 2", 'sel', 'image', 'imgname', 6, 'gid'),
#	array("img3", "Foto 3", 'sel', 'image', 'imgname', 6, 'gid'),
);
/*
		array("eventName", "Titel Event", '<input type="Text" value="#v#" class="form-control" name="#n#" required />'),
		array("eventOrt", "Ort", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
		array("eventDatum", "Datum", '<input type="Text" value="#v#" class="form-control" name="#n#" />', 'date'),
		array("eventStartZeit", "Uhrzeit Beginn", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),

		array("eventBegleitung", "Anzahl Begleitpersonen je Mitarbeiter", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
		array("eventAnzahlTeilnehmer", "Anzahl Teilnehmer", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
//		array("datumende", "End Datum", '<input type="Text" value="#v#" class="form-control" name="#n#" required />'),
//		array("", "CONFIG", '</div><div class="col-md-6">'),

		array("eventText", "Beschreibung", '<textarea class="form-control" name="#n#" />#v#</textarea>'),

//		array("", "CONFIG", '</div><div class="col-md-12 mb3 mt2">'),
//		array("img1", "Foto 1", 'img'),
//		array("", "CONFIG", '</div></div>'),
*/

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

$neuerDatensatz = isset($_GET["new"]) ? $_GET["new"] : 0;
$edit = isset($_REQUEST["edit"]) ? $_REQUEST["edit"] : 0;
$save = isset($_REQUEST["save"]) ? $_REQUEST["save"] : 0;
$del = isset($_REQUEST["del"]) ? $_REQUEST["del"] : 0;
$delete = isset($_REQUEST["delete"]) ? $_REQUEST["delete"] : 0;
$back = isset($_POST["back"]) ? $_POST["back"] : 0;

$delimg = isset($_GET["delimg"]) ? $_GET["delimg"] : 0;

$down = isset($_GET["down"]) ? $_GET["down"] : 0;
$up = isset($_GET["up"]) ? $_GET["up"] : 0;
$col = isset($_GET["col"]) ? $_GET["col"] : 0;
$copy = isset($_GET["copy"]) ? $_GET["copy"] : 0;
$imgFolder = "../images/referenzen/";
$imgFolderShort = "referenzen/";

$repair = isset($_GET["repair"]) ? $_GET["repair"] : 0;
$vis = isset($_GET["vis"]) ? $_GET["vis"] : 0;
$sichtbar = isset($_GET["sichtbar"]) ? $_GET["sichtbar"] : 0;

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

function liste() {
	global $arr_form, $table, $tid, $filter, $nameField, $sortField, $imgFolderShort;

	//// EDIT_SKRIPT
	$ord = "$sortField, sn ASC, $tid ,".$nameField;
	$anz = $nameField;

	////////////////////
	$where = 1;

	$echo .= '<p>&nbsp;</p>

	<p><a href="?repair=1&edit='.$edit.'" class="button"><i class="fa fa-refresh"></i> repariere Sortierung</a></p>

<div id="sortable" class="grid muuri">

';

	$sql = "SELECT * FROM $table WHERE $where ORDER BY ".$ord."";
	$res = safe_query($sql);
	// echo mysqli_num_rows($res);

	while ($row = mysqli_fetch_object($res)) {
		$edit = $row->$tid;
		$echo .= '
	<div class="zeile item row"  id="'.$row->$tid.'">
			<div class="col-md-2">
				<a href="?edit='.$edit.'"><span class="small light">'.$row->reihenfolge.'</span>
					<span class=" ml2 btn btn-primary"><i class="fa fa-pencil-square-o"></i><span class="small light"> &nbsp; '.$row->$tid.'</span>
				</a>
			</div>
			<div class="col-md-1">
				<a href="?edit='.$edit.'">'.$row->sn.' </a>
			</div>
			<div class="col-md-2">
				<a href="?edit='.$edit.'">'.$row->$anz.' </a>
			</div>
			<div class="col-md-2">
				<a href="?edit='.$edit.'">'.$row->kunde.' </a>
			</div>
			<div class="col-md-2">
				<a href="?edit='.$edit.'">'.$row->abstract.' </a>
			</div>
			<div class="col-md-1">
				<a href="?edit='.$edit.'">
					<img src="../mthumb.php?w=50&amp;src=images/'.$imgFolderShort.$row->img1.'" class="" style="float:left;" />
					<img src="../mthumb.php?w=50&amp;src=images/'.$imgFolderShort.$row->img14.'" class="" />
				</a>
			</div>
			<div class="col-md-1 text-right">
				<a href="?sichtbar='.($row->sichtbar ? 0 : 1).'&vis='.$edit.'"><i class="fa fa-eye'.($row->sichtbar ? '' : '-slash gray').'"></i></a>
			</div>
			<div class="col-md-1 text-right">
				<a href="?copy='.$edit.'"><i class="fa fa-copy"></i></a>
				<a href="?del='.$edit.'"><i class="fa fa-trash-o"></i></a>
			</div>
	</div>
';
	}

	$echo .= '
</div>
<p>&nbsp;</p>
';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function edit($edit) {
	global $arr_form, $table, $tid, $imgFolder, $imgFolderShort, $um_wen_gehts;

	$sql = "SELECT * FROM $table WHERE $tid=".$edit."";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);

	$echo .= '
		<input type="Hidden" name="edit" value="'.$edit.'">
		<input type="Hidden" name="save" value="1">
		<input type="hidden" value="0" name="back" id="back" />

		<div class="row" style="margin:2em 0;">
				<button type="submit" id="savebtn" class="btn btn-success"><i class="fa fa-save"></i> &nbsp; '.$um_wen_gehts.' speichern / aktualisieren</button>
				<button type="submit" id="savebtn2" value="hier" class="btn btn-success"><i class="fa fa-save"></i> &nbsp; '.$um_wen_gehts.' speichern und zurück</button>
		</div>

		<div class="row">
			<div class="col-md-6">

	';

	foreach($arr_form as $arr) {
		$echo .= setMorpheusForm($row, $arr, $imgFolderShort, $edit, 'morp_referenzen', $tid);
	}

	$echo .= '</div>
		</div>

				<button type="submit" id="savebtn" class="btn btn-success"><i class="fa fa-save"></i> &nbsp; '.$um_wen_gehts.' speichern / aktualisieren</button>
				<button type="submit" id="savebtn2" value="hier" class="btn btn-success"><i class="fa fa-save"></i> &nbsp; '.$um_wen_gehts.' speichern und zurück</button>
	</div>
';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function neu() {
	global $arr_form, $table, $tid, $um_wen_gehts;

	$x = 0;


	$echo .= '<input type="Hidden" name="neu" value="1"><input type="Hidden" name="save" value="1">

	<table cellspacing="6" style="width:100%;">';

	foreach($arr_form as $arr) {
		if ($x < 1) $echo .= '<tr>
			<td>'.$arr[1].':</td>
			<td>'. str_replace(array("#v#", "#n#", "#s#"), array($get, $arr[0], 'width:400px;'), $arr[2]).'</td>
		</tr>';
		$x++;
	}

	$echo .= '<tr>
		<td></td>
		<td>
			<br>
			<button type="submit" id="savebtn" class="btn btn-success"><i class="fa fa-save"></i> &nbsp; '.$um_wen_gehts.' speichern</button>
		</td>
	</tr>
</table>';


	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if ($save) {
	$neu = isset($_POST["neu"]) ? $_POST["neu"] : 0;

	// echo "save";
	$edit = saveMorpheusForm($edit, $neu);

	// if(neu) unset($neu);

	$scriptname = basename(__FILE__);

	if($back) {
?>
	<script>
		location.href='<?php echo $scriptname; ?>';
	</script>
<?php
	}
	elseif($neu) {
?>
	<script>
		location.href='<?php echo $scriptname; ?>?edit=<?php echo $edit; ?>';
	</script>
<?php
	}

	// unset($edit);
}

elseif ($delimg) {
	deleteImage($delimg, $edit, $imgFolder, 0);
}

elseif($delete) {
	$sql = "DELETE FROM `$table` WHERE $tid=$delete ";
	safe_query($sql);
}

elseif($repair) {
	repair();
}
elseif ($vis) {
	$sql = "UPDATE $table SET sichtbar=$sichtbar WHERE $tid=".$vis;
	safe_query($sql);
}
elseif($copy) {
	$sql  	= "SELECT * FROM $table WHERE $tid=$edit";
	$res 	= safe_query($sql);
	$y		= mysqli_num_rows($res);
	$y++;

	$sql  	= "SELECT * FROM $table WHERE $tid=$copy";
	$res 	= safe_query($sql);
	$row 	= mysqli_fetch_object($res);

	saveMorpheusForm($edit, 1, $row);

	repair();
}

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

if($up || $down) {
	if($down) { $sort1 = $down; $sort2 = $down+1; }
	elseif($up) { $sort1 = $up; $sort2 = $up-1; }

	$col1 = $col.$sort1;
	$col2 = $col.$sort2;

	$sql = "SELECT $col1, $col2 FROM $table WHERE $tid = $edit";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);
	$file1 = $row->$col1;
	$file2 = $row->$col2;

	$sql = "UPDATE $table SET $col2='$file1', $col1='$file2' WHERE $tid = $edit";
	safe_query($sql);
}

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if($del) {
	echo '	<h2>Wollen Sie '.$um_wen_gehts.' wirklich löschen?</h2>
			<p>&nbsp;</p>
			<p><a href="?delete='.$del.'" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp; Ja</a>
			<a href="?" class="btn btn-info"><i class="fa fa-remove"></i> &nbsp; Nein / Abbruch</a></p>

';
}
elseif ($neuerDatensatz) 	echo neu("neu");
elseif ($edit) 			echo edit($edit);
else						echo liste().$new;

echo '
</form>
';

include("footer.php");

?>

<script>
	  $(".form-control").on("change", function() {
	  	$("#savebtn").addClass("btn-danger");
	  	$("#savebtn2").addClass("btn-danger");
	  });
	  $("#savebtn2").on("click", function() {
	  	$("#back").val(1);
	  });
</script>

<script>

$( function() {
	var grid = new Muuri('.grid', {
		dragEnabled: true,
		dragAxis: 'y',
		threshold: 10,
		action: 'swap',
		distance: 0,
		delay: 100,
		layoutOnResize: true,
		setWidth: true,
		setHeight: true,
		sortData: {
			foo: function (item, element) {
				//console.log(item);
			},
			bar: function (item, element) {
				//console.log(77);
			}
  		}
	});

	grid.on('dragEnd', function (item) {

		var order = grid.getItems().map(item => item.getElement().getAttribute('id'));

		console.log(order);

		pos = "<?php echo $sortField; ?>";
		feld = "<?php echo $tid; ?>";
		table = "<?php echo $table; ?>";

	    request = $.ajax({
	        url: "UpdatePos.php",
	        type: "post",
	        data: "data="+order+"&pos="+pos+"&feld="+feld+"&table="+table+"&id=<?php echo $edit; ?>",
	        success: function(data) {
				console.log(data);
  			}
	    });

		// MuuriPosition = ($.inArray(ref, order));

	});
});
</script>



