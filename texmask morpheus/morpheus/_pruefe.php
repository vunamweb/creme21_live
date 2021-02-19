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
$box=1;
include("cms_include.inc");

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

# print_r($_SESSION);
# print_r($_REQUEST);

global $arr_form, $table, $tid, $filter;

;

// print_r($_POST);

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

$table = "morp_settings";
$tid = "id";
$nameField = "name";

/////////////////////////////////////////////////////////////////////////////////////////////////////
#$sql = "ALTER TABLE  $table ADD  `fFirmenFilterID` INT( 11 ) NOT NULL";
#safe_query($sql);
/////////////////////////////////////////////////////////////////////////////////////////////////////

	$sql = "SELECT * FROM oc_order WHERE 1 ORDER BY order_id DESC";
	$res = safe_query($sql);

	while ($row = mysqli_fetch_object($res)) {
		// echo '<p>'.$row->order_id.' - '.$row->product_id.' - '.$row->name.' - '.$row->quantity.' - '.$row->	.' - '.$row->total.' - </p>';
		
		$sql = "SELECT * FROM oc_order_history WHERE order_id = ".$row->order_id;
		$rs = safe_query($sql);
		$rw = mysqli_fetch_object($rs);
		$x = mysqli_num_rows($rs);
		if(!$x) {
			echo '# '.$row->order_id.' - '.$row->lastname.' - '.$row->firstname.' - '.$row->email.' -  - '.$row->total.' - </p>';
			// echo ' / / / / /  '.$rw->order_status_id.'<br/><br/><br/>'; 
			
		}
		
	}


	$sql = "SELECT * FROM oc_order_product WHERE 1 ORDER BY order_id DESC";
	$res = safe_query($sql);

	while ($row = mysqli_fetch_object($res)) {
		// echo '<p>'.$row->order_id.' - '.$row->product_id.' - '.$row->name.' - '.$row->quantity.' - '.$row->	.' - '.$row->total.' - </p>';
		echo $row->order_id.' - '.$row->product_id.' - '.$row->name.' - '.$row->quantity.' -  - '.$row->total.' - </p>';
	}

















