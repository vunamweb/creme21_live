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
$images_in = 'in';
$ms_active = ' class="active"';

include("cms_include.inc");

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

# print_r($_SESSION);
# print_r($_REQUEST);

///////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
//// EDIT_SKRIPT
$um_wen_gehts 	= "Slides";
$titel			= "Slides Verwaltung";
///////////////////////////////////////////////////////////////////////////////////////
$table 		= 'morp_masterslider_slides';
$tid 		= 'slidesID';
$nameField 	= "slidesName";
$sortField 	= 'slidesPos';

$table2 	= 'morp_masterslider';
$tid2 		= 'msID';
$nameField2 = "msName";
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

/*
msID
slidesPos
slidesImg
slidesText
slidesAni
slidesAlt
slidesLeft
slidesTop
*/

$arr_form = array(
//	array("reihenfolge", "Reihenfolge", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
	array("slidesName", "Name (optional)", '<input type="Text" value="#v#" class="form-control" name="#n#" style="width:150px;" />'),
	array("msID", "Slider", '<input type="Text" readonly value="#v#" class="form-control" name="#n#" style="width:50px;" />'),
	array("slidesAlt", "Image ALT Text", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
	array("slidesTop", "Abstand Top", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
	array("slidesLeft", "Abstand Left", '<input type="Text" value="#v#" class="form-control" name="#n#" />'),
	array("slidesAni", "Animation", '<textarea class="form-control" name="#n#" />#v#</textarea>'),


array("", "CONFIG", '</div><div class="col-md-3">'),

	array("slidesImg", "Bild", 'foto', 'image', 'imgname', 6, 'gid'),
array("", "CONFIG", '<div class="mt2"></div>'),
	array("slidesText", "Slider Text", '<textarea class="form-control" name="#n#" />#v#</textarea>'),

array("", "CONFIG", '</div>'),


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
global $msID;

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
$imgFolder = "../images/masterslider/";
$imgFolderShort = "masterslider/";

$repair = isset($_GET["repair"]) ? $_GET["repair"] : 0;
$vis = isset($_GET["vis"]) ? $_GET["vis"] : 0;
$sichtbar = isset($_GET["sichtbar"]) ? $_GET["sichtbar"] : 0;

$msID = isset($_GET["msID"]) ? $_GET["msID"] : 0;

if($msID) $_SESSION["msID"] = $msID;
elseif(!$msID) $msID = $_SESSION["msID"];

$scriptname = basename(__FILE__);

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

function liste() {
	global $arr_form, $table, $tid, $filter, $nameField, $sortField, $imgFolderShort, $table2, $tid2, $nameField2, $msID, $imgFolder;

	/// parent table
	$sql = "SELECT * FROM $table2 WHERE $tid2=$msID";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);
	$sliderName = $row->$nameField2;
	$bgImage = $row->msBgImg;
	$delay = $row->msDelay;
	//// ______________________________________________________________


	//// EDIT_SKRIPT
	$ord = "$sortField, $tid";
	$anz = $nameField;

	////////////////////
	$where = " t1.$tid2 = t2.$tid2 AND t1.msID=$msID ";

	$echo .= '<p>&nbsp;</p>

	<h5>'.$sliderName.'</h5>
	<p class="mt2 mb2"><a href="morp_masterslider.php" class="btn btn-info"><i class="fa fa-chevron-left"></i> zurück</a></p>
	<p><a href="?repair=1&edit='.$edit.'" class="button"><i class="fa fa-refresh"></i> REFRESH</a></p>

<div id="sortable" class="grid muuri">

';

	$sql = "SELECT * FROM $table t1, $table2 t2 WHERE $where ORDER BY ".$ord."";
	$res = safe_query($sql);
	// echo mysqli_num_rows($res);

	$slider = '';

	while ($row = mysqli_fetch_object($res)) {
		$edit = $row->$tid;

		$slider .= setMasterSliderSingle($row->slidesImg, $row->slidesText, $row->slidesAni, $row->slidesAlt, $row->slidesLeft, $row->slidesTop, 'images/'.$imgFolderShort, '../');

		$echo .= '
	<div class="zeile item row"  id="'.$row->$tid.'">
			<div class="col-md-2">
				<a href="?edit='.$edit.'&msID='.$msID.'"><span class="small light">'.$row->$sortField.'</span>
					<span class=" ml2 btn btn-primary"><i class="fa fa-pencil-square-o"></i><span class="small light"> &nbsp; '.$row->$tid.'</span>
				</a>
			</div>
			<div class="col-md-1">
				<input class="setform " name="slidesTop" id="slidesTop" ref="'.$edit.'" col="slidesTop" value="'.$row->slidesTop.'">
			</div>
			<div class="col-md-1">
				<input class="setform " name="slidesLeft" id="slidesLeft" ref="'.$edit.'" col="slidesLeft" value="'.$row->slidesLeft.'">
			</div>
			<div class="col-md-2">
				<a href="?edit='.$edit.'&msID='.$msID.'">'.$row->$anz.' </a>
			</div>
			<div class="col-md-1">
				'.($row->slidesImg ? '<a href="?edit='.$edit.'&msID='.$msID.'">
					<img src="../mthumb.php?w=50&amp;src=images/'.$imgFolderShort.$row->slidesImg.'" class="" />
				</a>' : $row->slidesText).'
			</div>
			<div class="col-md-1 text-right">
				<a href="?copy='.$edit.'&msID='.$msID.'"><i class="fa fa-copy"></i></a>
			</div>
			<div class="col-md-1 text-right">
				<a href="?del='.$edit.'&msID='.$msID.'"><i class="fa fa-trash-o"></i></a>
			</div>
	</div>
';
	}



	$echo .= '

</div>

	<div class="mt3"></div>

	<!-- masterslider -->

	<div class="master-slider ms-skin-default" id="masterslider">
	    <div class="ms-slide slide-1" data-delay="'.$delay.'">

	        <!-- slide background -->
	        <img src="../images/blank.gif" data-src="'.$imgFolder.$bgImage.'" alt="Slide background"/>

'.$slider.'

	    </div>
	    <!-- end of slide -->
	</div>

<p>&nbsp;</p>
';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function edit($edit) {
	global $arr_form, $table, $tid, $imgFolder, $imgFolderShort, $um_wen_gehts, $scriptname, $table2, $tid2, $msID;

	/// parent table
	$sql = "SELECT * FROM $table2 WHERE $tid2=$msID";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);
	$bgImage = $row->msBgImg;
	//// ______________________________________________________________


	$sql = "SELECT * FROM $table WHERE $tid=".$edit."";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);

	$echo .= '

	<p class="mt2"><a href="?msID='.$msID.'" class="btn btn-info"><i class="fa fa-chevron-left"></i> &nbsp; zurück</a>
	&nbsp; &nbsp; &nbsp; &nbsp; <a href="../master-slider/transition-gallery/index.html" class="btn btn-success" target="_blank"><i class="fa fa-chevron-right"></i> &nbsp; Transitions</a></p>

		<input type="Hidden" name="edit" value="'.$edit.'">
		<input type="Hidden" name="save" value="1">
		<input type="hidden" value="0" name="back" id="back" />

		<div class="row">
			<div class="col-md-6 mt3">

	';

	foreach($arr_form as $arr) {
		$echo .= setMorpheusForm($row, $arr, $imgFolderShort, $edit, substr($scriptname,0,(strlen($scriptname)-4)), $tid);
	}


	$slider = setMasterSliderSingle($row->slidesImg, $row->slidesText, $row->slidesAni, $row->slidesAlt, $row->slidesLeft, $row->slidesTop, 'images/'.$imgFolderShort, '../');


	$echo .= '</div>
		</div>

				<button type="submit" id="savebtn" class="btn btn-success"><i class="fa fa-save"></i> &nbsp; '.$um_wen_gehts.' speichern / aktualisieren</button>
				<button type="submit" id="savebtn2" value="hier" class="btn btn-success"><i class="fa fa-save"></i> &nbsp; '.$um_wen_gehts.' speichern und zurück</button>



	<div class="mt3"></div>

	<!-- masterslider -->

	<div class="master-slider ms-skin-default" id="masterslider">
	    <div class="ms-slide slide-1" data-delay="5">

	        <!-- slide background -->
	        <img src="../images/blank.gif" data-src="'.$imgFolder.$bgImage.'" alt="Slide background"/>

'.$slider.'

	    </div>
	    <!-- end of slide -->
	</div>
';


	$sql = "SELECT * FROM $table WHERE $tid2=".$msID."";
	$res = safe_query($sql);
	$slider = '';
	while($row = mysqli_fetch_object($res)) {
		$slider .= setMasterSliderSingle($row->slidesImg, $row->slidesText, $row->slidesAni, $row->slidesAlt, $row->slidesLeft, $row->slidesTop, 'images/'.$imgFolderShort, '../');
	}


	$echo .= '
	<div class="master-slider ms-skin-default mt2" id="masterslider2">
	    <div class="ms-slide slide-1" data-delay="5">

	        <!-- slide background -->
	        <img src="../images/blank.gif" data-src="'.$imgFolder.$bgImage.'" alt="Slide background"/>

'.$slider.'

	    </div>
	    <!-- end of slide -->
	</div>





</div>

';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////




function neu() {
	global $arr_form, $table, $tid, $um_wen_gehts, $msID;

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


			<input type="Hidden" name="msID" value="'.$msID.'">


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


?>
<link rel="stylesheet" href="../css/masterslider.css" />

<style>
@font-face {
  font-family: 'ClanPro-NarrNewsItalic';
  src: url('../css/fonts/ClanPro-NarrNewsItalic.woff') format('woff');
  font-weight: normal;
  font-style: normal;
}

.master-slider div, .section_banner .caption h2 {
  font-family: 'ClanPro-NarrNewsItalic';
  font-size: 3rem;
  line-height: 1em;
  text-transform: none;
  margin-bottom: 0;
/*   letter-spacing: .05em; */
}
.master-slider div span, .section_banner .caption h2 .f_first {
  font-size: 1.88rem;
  display: block;
  margin-left: -100px;
  letter-spacing: -.01em;
}
.master-slider div span, .section_banner .caption h2 .f_last {
  font-size: 1.88rem;
  display: block;
  text-align: right;
  margin-right: 50px;
}

</style>

<script src="../js/masterslider.min.js"></script>
	<script type="text/javascript">
	    var slider = new MasterSlider();

	    // adds Arrows navigation control to the slider.
	    slider.control('arrows');
	    slider.control('timebar' , {insertTo:'#masterslider'});
	    slider.control('bullets');

	     slider.setup('masterslider' , {
	         width:1300,    // slider standard width
	         height:400,   // slider standard height
	         space:1,
//	         layout:'fullwidth',
	         loop:true,
	         preload:0,
	         instantStartLayers:true,
	         autoplay:true
	    });


	    var slider2 = new MasterSlider();

	    // adds Arrows navigation control to the slider.
	    slider2.control('arrows');
	    slider2.control('timebar' , {insertTo:'#masterslider2'});
	    slider2.control('bullets');

	     slider2.setup('masterslider2' , {
	         width:1000,    // slider standard width
	         height:400,   // slider standard height
	         space:1,
//	         layout:'fullwidth',
	         loop:true,
	         preload:0,
	         instantStartLayers:true,
	         autoplay:true
	    });

	</script>

<?php

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



