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

# print_r($_REQUEST);

global $arr_form, $art;

$edit 	= $_REQUEST["edit"];
$neu	= $_REQUEST["neu"];
$save	= $_REQUEST["save"];
$del	= $_REQUEST["del"];
$delete	= $_REQUEST["delete"];
$id		= $_REQUEST["id"];
$art	= $_REQUEST["art"];
$parent	= $_REQUEST["parent"];
$parent2= $_REQUEST["parent2"];
$newpar = $_REQUEST["newpar"];

if ($parent) 	$_SESSION["pdfpar"] 	= $parent;
if ($parent2) 	$_SESSION["pdfpar2"] 	= $parent2;
if ($art) 		$_SESSION["pdfart"] 	= $art;

echo '<div id=vorschau>
	<h2>Dokumenten / Download Verwaltung</h2>

	'. ($edit || $neu ? '<p><a href="?pid='.$pid.'">&laquo; zur&uuml;ck</a></p>' : '') .'
	<form action="" onsubmit="" name="verwaltung" method="post">
';

$new = '<p>&nbsp;</p><p class="mb2"><a href="?neu=1" class="btn btn-info"><i class="fa fa-plus"></i> NEUER Ordner erste Ebene</a></p>';

$arr_form = array(
	array("pgname", "Ordner-Name",'<input type="Text" value="#v#" name="#n#" style="#s#">'),
);


// print_r($_COOKIE);

//===================================================================================================
// konvert_table();
function konvert_table() {
	$sql = "SELECT  * FROM  `morp_media` p, morp_media_group g WHERE p.pgid = g.pgid AND pgart =2 ";
	$res = safe_query($sql);
	$pfad = "../secure/dfiles/vxcDfgH/";
	$x=0;
	while ($row = mysqli_fetch_object($res)) {
		$typ = explode(".", $row->pname);
		$c = count($typ);
		$c = $c-1;
		$typ = strtolower($typ[$c]);
		$size = getimagesize($pfad.$row->pname);
		$w = $size[0];
		$h = $size[1];
		if($typ == "jpg" || $typ == "png") {
			$x++;
			$sql = "UPDATE morp_media set ptyp='$typ', pw='$w', ph='$h' WHERE pid=".$row->pid;
			safe_query($sql);
//			echo " - ".$x."<br/>";
		}
	}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function liste($par=0, $par2=0) {
	global $art;

	$db = "morp_media_group";
	$id = "pgid";
	$ord = "pgname";
	$anz = "pgname";

	$level = $_COOKIE["level1"];

	$echo .= '<ul id="myUL">';

	$sql = "SELECT * FROM $db WHERE parent=0 ORDER BY pgart, ".$ord."";
	$res = safe_query($sql);

	while ($row = mysqli_fetch_object($res)) {
		$th_id = $row->$id;
		$pgart = $row->pgart;

		$cp = check_par($th_id);

		$echo .= '
		<li>
			'.($cp ? '<span class="caret'.($level == $th_id ? ' caret-down' : '').'" ref="'.$th_id.'" data-level="1">' : '<span class="caret-leer">').'
				<div class="colm1">
					'.$row->$anz.'

					<a href="morp_media.php?pgid='.$th_id.'"><i class="fa fa-sign-out ml1"></i></a>
				</div>

				<div class="colm2">
					<a href="?edit='.$th_id.'&parent='.$par.'&parent2='.$par2.'" class="btn btn-info"><i class="fa fa-cogs"></i> &nbsp; settings</a>
					<a href="?neu=1&art='.$art.'&me='.$th_id.'&newpar='.$th_id.'&parent='.$par.'&parent2='.$par2.'" class="btn btn-success">Unterordner erstellen</a>
					<a href="?del='.$th_id.'" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
				</div>
			</span>

';
		$echo .= $cp ?  ebene($db, $id, $th_id, $par2, $ord, $anz, 40, $level, 2) : '';

		$echo .= '
		</li>
';

	}

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
function ebene($db, $id, $par, $par2, $ord, $anz, $einz=40, $level, $levelNumber) {

		// echo "<pre> $db, $id, $par, $par2, $ord, $anz, $einz=40, $level </pre>\n\n";

		$sql = "SELECT * FROM $db WHERE parent=$par ORDER BY ".$ord."";
		$res = safe_query($sql);

		$tmp = '
			<ul class="nested'.($level == $par ? ' active' : '').'">
';

		$levelCookie = "level".$levelNumber;
		$level = $_COOKIE[$levelCookie];

		while ($row = mysqli_fetch_object($res)) {
			$th_id = $row->$id;
			$pgart = $row->pgart;

			$cp = check_par($th_id);

			$tmp .= '
			<li>
				'.($cp ? '<span class="caret'.($level == $th_id ? ' caret-down' : '').'" ref="'.$th_id.'" data-level="'.$levelNumber.'">' : '').''.$row->$anz.'
				<div class="colm1">
					<a href="morp_media.php?pgid='.$th_id.'"><!--'.$row->$anz.'--><i class="fa fa-sign-out ml1"></i></a>
				</div>
				<div class="colm2">
					<a href="?edit='.$th_id.'&noart=1&parent='.$par.'&parent2='.$par2.'" class="btn btn-info"><i class="fa fa-cogs"></i> &nbsp; settings</a>
					<a href="?neu=1&art='.$art.'&me='.$th_id.'&newpar='.$th_id.'&parent='.$par.'&parent2='.$par2.'" class="btn btn-success">Unterordner erstellen</a>
					<a href="?del='.$th_id.'" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
				</div>

				'.($cp ? '</span>' : '').'
';

			$tmp .= $cp ?  ebene($db, $id, $th_id, $par2, $ord, $anz, 60, $level, 3) : '';

			$tmp .= '</li>';
		}

		return $tmp.'</ul>';
}
/////////////////////////////////////////////////////////////////////////////////////////////////////

function check_par($par) {
	$db = "morp_media_group";
	$id = "pgid";
	$sql = "SELECT * FROM $db WHERE parent=$par";
	$res = safe_query($sql);
	$x   = mysqli_num_rows($res);
	return $x;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function set_image($par=0, $par2=0, $left=10) {
	global $parent, $parent2;

	if ($par2 === $parent2 || $par === $parent)
			$img = '<img src="images/open.gif" alt="" width="9" height="9" border="0" style="margin:0 20px 0 '.$left.'px;">';
	else	$img = '<img src="images/dupl.gif" alt="" width="9" height="9" border="0" style="margin:0 20px 0 '.$left.'px;">';

	return $img;
}

function set_lnk($par=0, $par2=0, $art=1) {
	global $parent, $parent2;

	if ($par && $par2) {
		if ($par == $parent && $par2 == $parent2) 	$lnk = '<a href="?parent='.$par.'&art='.$art.'">';
		else					$lnk = '<a href="?parent='.$par.'&parent2='.$par2.'&art='.$art.'">';
	}
	elseif ($par) {
		if ($par == $parent) 	$lnk = '<a href="?">';
		else					$lnk = '<a href="?parent='.$par.'&parent2='.$par2.'&art='.$art.'">';
	}

	return $lnk;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

function edit($edit) {
	global $arr_form, $parent, $parent2, $art;

	$db = "morp_media_group";
	$id = "pgid";

	$sql = "SELECT * FROM $db WHERE $id=".$edit."";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);
	$art = $row->pgart;
	if(!$art) $art = 1;

	$echo .= '<input type="Hidden" name="neu" value="'.$neu.'">
		<input type="Hidden" name="edit" value="'.$edit.'">
		<input type="Hidden" name="save" value="1">

		<input type="Hidden" name="parent" value="'.$parent.'">
		<input type="Hidden" name="parent2" value="'.$parent2.'">
		<input type="Hidden" name="art" value="'.$art.'">

	<table class="autocol">';

	$echo .= '<tr>
		<td></td>
	</tr>
';

	foreach($arr_form as $arr) {
		if ($arr[0] == "aktiv") {
			if ($row->$arr[0] == "1") $sel1 = " checked";
			else $sel2 = " checked";
		}

		$echo .= '<tr>
		<td>'.$arr[1].':</td>
		<td>'. str_replace(
					array("#v#", "#n#", "#s#", "#db#", '#e#', '#id#', '#s1#', '#s0#'),
					array($row->$arr[0], $arr[0], 'width:400px;', $db2, $edit, $id2, $sel1, $sel2),
			$arr[2]).'</td>
	</tr>';
	}

	// Bereiche Zuordnen
	$bereich_bez = array("","Standard Download","Interner Bereich / SECURE Download");
	$bereich_anz = count($bereich_bez)-1;
	if (!$art) $art = 1;

	for($i=1; $i <= $bereich_anz; $i++) {
		$radio .= '<p><input type="radio" name="pgart" value="'.$i.'"';
		if ($art == $i) $radio .= ' checked';
		$radio .= '> &nbsp; '.$bereich_bez[$i].'</p>';
	}

	$echo .= '
	<tr>
		<td></td>
		<td>'.$radio.'</td>
	</tr>
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
	global $arr_form, $art, $newpar, $parent, $parent2;

	$x = 0;

	$echo .= '<input type="Hidden" name="neu" value="1"><input type="Hidden" name="save" value="1">

	<table class="autocol">';

	foreach($arr_form as $arr) {
		$echo .= '<tr>
			<td>'.$arr[1].':</td>
			<td>'. str_replace(array("#v#", "#n#", "#s#"), array($row->$arr[0], $arr[0], 'width:400px;'), $arr[2]).'</td>
		</tr>';
	}

	$bereich_bez = array("","Standard Download","Interner Bereich / SECURE Download");
	$bereich_anz = count($bereich_bez)-1;

	for($i=1; $i <= $bereich_anz; $i++) {
		$radio .= '<p><input type="radio" name="pgart" value="'.$i.'"';
		if ($art == $i) $radio .= ' checked';
		$radio .= '> &nbsp; '.$bereich_bez[$i].'</p>';
	}

	$echo .= '
	<tr>
		<td></td>
		<td>'.$radio.'</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="Hidden" value="'.$newpar.'" name="newpar">
			<input type="Hidden" value="'.$parent.'" name="parent"><input type="Hidden" value="'.$parent2.'" name="parent2">
			<input type="submit" name="speichern" value="speichern"></td>
	</tr>
</table>';

	return $echo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if ($save) {
	global $arr_form, $art, $newpar;

	$db = "morp_media_group";
	$id = "pgid";
	$pfad = "../secure/dfiles/vxcDfgH/";

	$sql = '';

	foreach($arr_form as $arr) {
		$tmp = $arr[0];
		if ($tmp == "pgname") $val = ($_POST[$tmp]);
		else $val = $_POST[$tmp];

		if ($val) $sql .= $tmp. "='" .$val. "', ";
	}

	if ($neu) {
		$art = $_REQUEST["pgart"];
		$sql .= "pgart=". ($art ? $art : 1) . ($newpar ? ", parent=$newpar" : '');
		$sql  = "INSERT $db set $sql";
		$res  = safe_query($sql);
		// $edit = mysqli_insert_id();
		unset($neu);
		// if ($art == 2) mkdir($pfad.eliminiere($_POST["pgname"]));
	}
	else {
		$sql .= "pgart=".$_POST["pgart"];
		$sql = "UPDATE $db set $sql WHERE $id=$edit";
		$res = safe_query($sql);

		$sql = "UPDATE $db set pgart=".$_POST["pgart"]." WHERE parent=$edit";
		$res = safe_query($sql);

		$db = "morp_media_group";
		$id = "pgid";
		$sql = "SELECT * FROM $db WHERE parent=".$edit."";
		$res = safe_query($sql);
		while ($row = mysqli_fetch_object($res)) {
			$id  = $row->pgid;
			$sq = "UPDATE $db set pgart=".$_POST["pgart"]." WHERE parent=$id";
			$rs = safe_query($sq);
		}
	}
	unset($edit);
}
elseif ($del) {
	$db = "morp_media_group";
	$id = "pgid";

	echo '<p>&nbsp;</p><p><font color=#ff0000><b>Sind Sie sich sicher, dass sie den Download Ordner löschen wollen?</b></font></p>
		<p>&nbsp; &nbsp; &nbsp; <a href="?delete=' .$del .'">Ja</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="?">Nein</a></p></body></html>';
	die();
#	$sql = "DELETE FROM $db WHERE $id=$del";
#	$res = safe_query($sql);
}
elseif ($delete) {
	$db = "morp_media_group";
	$id = "pgid";

	$sql = "DELETE FROM $db WHERE $id=$delete";
	$res = safe_query($sql);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if ($neu) 		echo neu("neu");
elseif ($edit) 	echo edit($edit);
else			echo $new.liste($parent,$parent2);

echo '
</form>
';

include("footer.php");

?>

<script>
	$('.pageSel').click(function () {
		ischeck = $(this).prop('checked');
		checkValue = $(this).val();

	    request = $.ajax({
	        url: "UpdateBoxenPos.php",
	        type: "post",
	        dataType : 'html',
	        data: 'bid='+1+'&todel='+ischeck+'&cid='+checkValue,
	        success: function(msg) {
                console.log(msg);
            }
	    });

	});

var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");

    status = $(this).hasClass("caret-down");

    if(status == 'true') ref = $(this).attr("ref");
    else ref = 0;

    level = $(this).attr("data-level");

    // console.log(status+' - '+ref);

		var nDays = 1;
		if(level == 1) var cookieName = "level1";
		else var cookieName = "level2";
		var cookieValue = ref;
		var today = new Date();
		var expire = new Date();
		expire.setTime(today.getTime() + 3600000*24*nDays);
		document.cookie = cookieName+"="+escape(cookieValue)+";expires="+expire.toGMTString()+";path=/";
		// location.reload();
  });
}

</script>