<?php
error_reporting(0);
session_start();
# # # # # # # # # # # # # # # # # # # # # # # # # # #
# www.pixel-dusche.de                               #
# björn t. knetter                                  #
#                                                   #
# post@pixel-dusche.de                              #
# frankfurt am main, germany                        #
# # # # # # # # # # # # # # # # # # # # # # # # # # #

global $kat_arr;

# mail('post@pixel-dusche.de', 'haendler update gestartet', "haendler update gestartet\n".date("d.m-Y H:i"));

$file = "import/haendlerliste.txt";

if (file_exists($file)) {
	mail('post@pixel-dusche.de', 'haendler update start', "haendler update start \n".date("d.m-Y H:i"));
}
else {
	mail('post@pixel-dusche.de', 'haendler update fehlgeschlagen - haendlerliste.txt fehlt', "haendler update fehlgeschlagen - haendlerliste.txt fehlt \n".date("d.m-Y H:i"));
	die();
}

include("../nogo/config.inc");
include("../nogo/db.php");
dbconnect();
include("../nogo/funktion.inc");

$start = 1; #$_GET["start"];

#	echo "\n\n<div id=content_big class=text>\n<p><strong>H&auml;nlder Verwaltung</strong></p>\n\n";

if ($start) {
	$sql  = "UPDATE morp_haendler set upd='0' WHERE 1";
	$res  = safe_query($sql);

# "Distribute";"Kundennr";"Adressnr";"Kundenart";"NAME1";"NAME2";"NAME3";"LAND";"Staat";"PLZ";"ORT";"STRASSE";"TELEFON1";"FAX";"Email";"Homepage";"AGR";"Webshop"
# "Distribute";"Kundennr";"Adressnr";"Kundenart";"NAME1";"NAME2";"NAME3";"LAND";"Staat";"PLZ";"ORT";"STRASSE";"TELEFON1";"FAX";"Email";"Homepage";"AGR"

	$want = array("Kundennr", "Adressnr", "NAME1", "NAME2", "STRASSE", "LAND", "PLZ", "ORT", "TELEFON1", "FAX", "Email", "Homepage", "Distribute", "Kundenart", "Webshop", "AGR");
	$bez  = array("Kundennr"=>"knr", "Adressnr"=>"x", "NAME1"=>"name1", "NAME2"=>"name2", "STRASSE"=>"strasse", "LAND"=>"lid", "PLZ"=>"plz", "ORT"=>"ort", "TELEFON1"=>"fon1", "FAX"=>"fax", "Email"=>"email1","Homepage"=>"internet","Distribute"=>"distributor","Kundenart"=>"kundenart", "Webshop"=>"webshop", "AGR"=>"agr");
	$land = array("DE"=>1, "AT"=>2, "AUS"=>3, "CH"=>18,"US"=>15,"NO"=>"10","GB"=>"6","HU"=>"14","ES"=>"13","JP"=>"8","CZ"=>"4","IT"=>"7","RUS"=>"19","SK"=>"22","HR"=>"23", "ZA"=>16, "MAL"=>9, "CA"=>21, "SE"=>12, "HK"=>27, "SI"=>25, "UA"=>24, "FR"=>20);
	$set  = array("knr"=>"Kundennummer", "name1"=>"Name 1", "name2"=>"Name 2", "textde"=>"Text DE", "texten"=>"Text EN", "ansprech"=>"Ansprechpartner", "plz"=>"PLZ", "ort"=>"Ort", "strasse"=>"Strasse", "lid"=>"Land", "fon1"=>"Telefon 1", "fon2"=>"Telefon 2", "fax"=>"Telefax", "email1"=>"E-Mail 1", "email2"=>"E-Mail 2", "internet"=>"Internet","distributor"=>"Distributor","kundenart"=>"Kundenart", "webshop"=>"Webshop", "agr"=>"AGR");

	$tab 	= array_flip($set);

	//
	// datensaetze zuruecksetzen
	# $sql  = "UPDATE morp_haendler set upd=0 WHERE lid=1 OR lid=2 OR lid=18";
	//$sql  = "UPDATE morp_haendler set upd=0 WHERE 1";
	//$res  = safe_query($sql);
	//
	//

	$row = 1;
	# if (($handle = fopen("import/haendler.csv", "r")) !== FALSE) {
	if (($handle = fopen($file, "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
	        $num = count($data);
	        $row++;
			$tmp = "";
	        for ($c=0; $c < $num; $c++) {
	            $tmp .= $data[$c] . "\t";
	        }

			# echo $tmp."<br>";
#			if (!isin("^Silber", $tmp) && !isin("^Gold", $tmp) && !isin("^G-LORD", $tmp) && !isin("^Inter", $tmp)) {  if ($row > 2) $tmp = "-\t".$tmp; }
			$tmp = explode("\t", $tmp);
			$zeilen[] = $tmp;
		#	echo "\n\n";
	    }
	    fclose($handle);
	}

	$check = ($zeilen[0]);
	$check = array_flip($check);
#	 echo "---------".$check["Kundennr"]."-------------";;

	$zahlen = array();

	//////////////////////////////////////////
	//// auslesen, welche spalten wir brauchen
	foreach($want as $ar) {
		if ($bez[$ar] == "fon1") $get_fon = $check[$ar];  // ich brauche die id um die italienische nummer zu erhalten
		$zahlen[$bez[$ar]] = $check[$ar];
	}

	#	print_r($zahlen);
	#	print_r($zeilen);
	#   die();
	//////////////////////////////////////////
	//////////////////////////////////////////
	$y = 0;
	$ctx = 0;

	foreach($zeilen as $ar) {
		# print_r($ar);
		if ($y > 0) {
			$kundennr = $ar[$zahlen["knr"]]; //.$ar[$zahlen["x"]];
			$knr = preg_replace("/-/", "", $kundennr);
			$ctx++;

			# echo "## $ctx ##<br>";
			$x = 0;
			$sql_arr = array();

			foreach ($zahlen as $key=>$ct) {
				$x++;
#				echo $key."<br>";
				if ($key == "lid") {
					if ($ar[$ct] == "IT" && isin("^0043", $ar[$get_fon])) $sql_arr[] = $key."='2'";
					else $sql_arr[] = $key."='".$land[$ar[$ct]]."'";
				}

				elseif ($key == "kundenart") {
					if ($ar[$ct] == "Fachhand")			$tmp = 1;
					elseif ($ar[$ct] == "Premium") 		$tmp = 2;
//					elseif ($ar[$ct] == "AGR zert") 	$tmp = 3;
					else $tmp = 0;
					// echo $tmp.": $ct -- ".$ar[4]."<br>";
					$sql_arr[] = $key."='".$tmp."'";
				}

				elseif ($key == "agr" || $key == "webshop") {
					if ($ar[$ct] == "Ja")	$tmp = 1;
					else $tmp = 0;
					$sql_arr[] = $key."='".$tmp."'";
				}

				elseif ($x > 2) $sql_arr[] = $key."='".addslashes(utf8_encode($ar[$ct]))."'";
			}

			$sql_arr = implode(", ", $sql_arr).", upd=1, knrkurz='$knr' ";

			$sql  = "SELECT kid FROM morp_haendler WHERE knr='$kundennr'";
			$res  = safe_query($sql);
			$n    = mysqli_num_rows($res);

			if ($n > 0) 	$sql = "UPDATE morp_haendler set ".$sql_arr." WHERE knr='$kundennr'";
			else 			$sql = "INSERT morp_haendler set ".$sql_arr." , knr='$kundennr'";
			# die();
			$res 	 = safe_query($sql);
			 echo $sql."<br>\n<br>\n";
 	#	 die();
		}
		$y++;
	}

	//
	// datensaetze zuruecksetzen
	$sql  = "SELECT kid FROM morp_haendler WHERE upd='0'";
	$res  = safe_query($sql);
	if($res) $n = mysqli_num_rows($res);

#	$sql  = "DELETE FROM morp_haendler WHERE upd='0' AND (lid=1 OR lid=2 OR lid=18)";
#	$sql  = "DELETE FROM morp_haendler WHERE upd='0'";
#	$res  = safe_query($sql);
	$sql  = "OPTIMIZE TABLE `morp_haendler`";
	$res  = safe_query($sql);
#	echo "<p>&nbsp;</p><h2>$n Datens&auml;tze nicht mehr aktuell</h2><p>&nbsp;</p>";
	//
	//

#	echo "<h2>FERTIG</h2>";
//	unlink("import/haendlerliste.txt");
	 mail('post@pixel-dusche.de', 'chung shi haendler aktualisiert', "$n Datens&auml;tze nicht mehr aktuell\n".date("d.m-Y H:i"));

}

# mail('post@pixel-dusche.de', 'haendler update fertig', "haendler update fertig\n".date("d.m-Y H:i"));

#$tmp = $arr[0];
#print_r[$tmp];
?>