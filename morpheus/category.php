<?php
session_start();
# # # # # # # # # # # # # # # # # # # # # # # # # # #
# www.pixel-dusche.de                               #
# bj&ouml;rn t. knetter                                  #
# start 12/2003                                     #
#                                                   #
# post@pixel-dusche.de                              #
# frankfurt am main, germany                        #
# # # # # # # # # # # # # # # # # # # # # # # # # # #

$images_in = 'in';
include("cms_include.inc");

$del 	 = $_REQUEST["del"];
$delete	 = $_REQUEST["delete"];

# wenn bild in content eingesetzt wird
$back	= $_REQUEST["back"];
$imglnk = $_REQUEST["imglnk"];
$stelle = $_REQUEST["stelle"];
$navid  = $_REQUEST["navid"];
$edit  = $_REQUEST["edit"];
$imageHeader = $_REQUEST["image_header"];
$save  = $_REQUEST["save"];
$cedit  = $_REQUEST["cedit"];
$db		= $_REQUEST["db"];
$art	= $_REQUEST["art"];
$vorlage= $_REQUEST["vorlage"];

# wenn bild in news eingesetzt wird
$nid	= $_REQUEST["nid"];
$ngid	= $_REQUEST["ngid"];

$newsletter = $_REQUEST["newsletter"];

$language = 2;

if ($_GET["db"] == "ec_kurs_art") $kurs = 1;

# deko bilder bestimmen
$inr 	= $_REQUEST["inr"];
$cid	= $_REQUEST["cid"];
$back	= $_REQUEST["back"];


if ($navid || $kurs)  $incl_lnk = "image_liste.php?stelle=$stelle&navid=$navid&edit=$edit&cedit=$cedit&vorlage=$vorlage";

if ($save) {
    $query = "update morp_cms_img_group set category = 0 where category = ".$edit."";
    safe_query($query);

    $query = "update morp_cms_img_group set category = ".$edit." where gid = ".$imageHeader."";
    safe_query($query);
    
    //return;
}

if ($edit && !$save) {
    echo '<form method="post"><h5>Select header image</h5><br><select name="image_header"><option value="0">None</option>';

    $query  = "SELECT * FROM morp_cms_img_group order by name";
    $result = safe_query($query);

    while ($row = mysqli_fetch_object($result)) {
        $select = ($edit == $row->category) ? "selected" : "";
        echo '<option '.$select.' value=' . $row->gid . '>' . $row->name . '</option>';
    }

    echo '</select><br><br>
<input type="submit" value="save"/>    
<input type="hidden" name="save" value="save"/>
</form>';


    return;
}

if ($del ) {
	$sql = "SELECT imgid FROM morp_cms_image WHERE gid=$del";
	$res = safe_query($sql);
	$x = mysqli_num_rows($res);
	if($x > 0) $warnung = "<p><font color=#ff0000><b> Der Image-Ordner enthält noch $x Images!</b></font></p>
				<a href=\"image.php\" title=\"abbruch\">" .ilink() ." ABBRUCH</a>";
	else $warnung = "<p><font color=#ff0000><b>$x - Wollen Sie den Image-Ordner wirklich l&ouml;schen?</b></font></p>
				<a href=\"image.php?delete=$del\" title=\"Content l&ouml;schen!\">" .ilink() ." endg&uuml;ltig l&ouml;schen</a> &nbsp; &nbsp; &nbsp; <a href=\"image.php\" title=\"abbruch\">" .ilink() ." ABBRUCH</a>";
}
# ein imageordner wird endg&uuml;ltig gel&ouml;scht
elseif ($delete) {
	$query = "delete from morp_cms_img_group where gid=$delete";
	safe_query($query);
}

echo "<div>
	<h2>Category</h2><br>";
if ($warnung) die ($warnung ."</div></body></html>");

if ($nid) 		echo "<p><a href='news.php?edit=$nid&ngid=$ngid'>" .'<i class="fa fa-arrow-circle-left"></i>' ." zur&uuml;ck</a></p>\n";
elseif ($back) 	echo "<p><a href='content_foto.php?edit=$cid&db=content&back=$back'>" .'<i class="fa fa-arrow-circle-left"></i>' ." zur&uuml;ck</a></p>\n";

$query  = "SELECT * FROM `oc_category` oc, `oc_category_description` ocd where oc.parent_id = 0 and oc.column = 0 and oc.category_id = ocd.category_id and ocd.language_id = ".$language."";
$result = safe_query($query);

echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" class='autocol p10' id=\"sverw\">";

$x = 0;
$y = mysqli_num_rows($result);

while ($row = mysqli_fetch_object($result)) {
    $id = $row->category_id;
    
    $nm = $row->name;
    $nm = str_replace(array("#"), " ", $nm);

	if ($nm) {
		$x++;
		echo "<tr>
			<td width=\"50\" align=\"center\"><a>$x</a></td>
			<td valign=\"top\">";
        echo "<a href='category.php?edit=$id'>";

		echo "$nm</a>\n";

		if ($admin && !$back && !$nid && !$kurs && $db != "template") echo "&nbsp;
			<td width=50 align=center>$lnk".'<a href="category.php?edit='.$id.'"><i class="fa fa-pencil-square-o"></i></a>'."
			<td width=50 align=center>";

		echo "</td>
		</tr>\n";

		if ($ct == 0) $ct = 1;		//farbendefenition
		else $ct = 0;
	}
}
echo "</table>";


echo '<p>&nbsp;</p>
<!-- <p><a href="image_top.php" title="Top Bilder verwalten">'. ilink().' Top Bilder verwalten</a></p> -->
';

?>

</div>

<?php
include("footer.php");
?>