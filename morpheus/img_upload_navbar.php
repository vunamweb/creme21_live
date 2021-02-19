<?php
session_start();
# # # # # # # # # # # # # # # # # # # # # # # # # # #
# www.pixel-dusche.de                               #
# björn t. knetter                                  #
# start 12/2003                                     #
#                                                   #
# post@pixel-dusche.de                              #
# frankfurt am main, germany                        #
# # # # # # # # # # # # # # # # # # # # # # # # # # #

// $box=1;
$myauth = 10;
include("cms_include.inc");

?>

<link rel="stylesheet" type="text/css" href="uploadifive/uploadifive.css">
<script src="uploadifive/jquery.min.js" type="text/javascript"></script>
<script src="uploadifive/jquery.uploadifive.min.js" type="text/javascript"></script>

<style type="text/css">
.uploadifive-button {
	float: left;
	margin-right: 10px;
}
#queue {
	border: 1px solid #E5E5E5;
	height: 277px;
	overflow: auto;
	margin-bottom: 10px;
	padding: 0 3px 3px;
	width: 500px;
}
.upload { display: none !important; }
.content_big i.fa {  color: #1997c6 !important; margin: 0; margin-right: .5em;  }
.uploadifive-button { background: #1997c6 !important; }
</style>

<?php

echo "<div id=content_big class=text>";

# wenn bild in content eingesetzt wird
$navid  = isset($_REQUEST["navid"]) ? $_REQUEST["navid"] : '';

?>

	<p>&nbsp;</p>
<?php

$edit 	 = isset($_GET["edit"]) ? $_GET["edit"] : '';
$back 	 = isset($_GET["back"]) ? $_GET["back"] : '';
$ebene 	 = isset($_GET["ebene"]) ? $_GET["ebene"] : '';
$sprache = isset($_GET["sprache"]) ? $_GET["sprache"] : '';

	echo '<p><a href="nav_edit.php?navid='.$edit.'&back='.$back.'&edit='.$edit.'&ebene='.$ebene.'&sprache='.$sprache.'" class="btn btn-info"><i class="fa fa-chevron-laft"></i> Zurück</a></p>';
?>
	<p>&nbsp;</p>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		<a style="position: relative; top: 8px; border:solid 1px #4595ce; color:#4595ce; font-weight:bold; height:27px; display:block; float:left; margin-top:-6px; padding:0 8px; text-transform:uppercase; line-height:28px; background:#f1f1f1;" href="javascript:$('#file_upload').uploadifive('upload')" class="upload">Upload Files</a>
	</form>

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadifive({
				'auto'             : true,
				'checkScript'      : 'uploadifive/check-exists_img.php',
				'formData'         : {
									   'timestamp' : '<?php echo $timestamp;?>',
									   'token'     : '<?php echo md5('pixeld' . $timestamp);?>',
									   'navid'	   : '<?php echo $navid; ?>'
				                     },
				'queueID'          : 'queue',
				'uploadScript'     : 'uploadifive/uploadifive_img_navbar.php',
				'onUploadComplete' : function(file, data) { console.log(data); }
			});
		});
	</script>

