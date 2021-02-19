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
# print_r($_POST);

///////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
//// EDIT_SKRIPT
$um_wen_gehts 	= "Warengruppe";
$titel			= "warengruppe Verwaltung";
///////////////////////////////////////////////////////////////////////////////////////
$table 		= 'cc_warengruppe';
$tid 		= 'wgID';
$nameField 	= "S_KENNUNG";
$sortField 	= 'S_KENNUNG';

///////////////////////////////////////////////////////////////////////////////////////




$warengruppe = array(
	array("A_NUMMER", "string",),
	array("S_KENNUNG", "string",),
	array("BEZEICHNUNG", "string",),
	array("ID", "string",),
	array("BESCHREIBUNG", "text",),
	array("BESCHREIBUNG2", "text",),
	array("BESCHREIBUNG3", "text",),
	array("EINHEIT", "string",),
	array("NETTOPREIS", "float",),
	array("WAEHRUNG", "string",),
	array("STEUERSATZ", "int",),
	array("POS_EK", "int",),
	array("VERPACKUNGSEINH", "float",),
	array("GEWICHT_NETTO", "float",),
	array("GEWICHT_BRUTTO", "float",),
	array("KEIN_RABATT", "string",),
	array("A_GRUPPE", "string",),
	array("A_KLASSE", "string",),
	array("A_OBERGRUPPE", "string",),
	array("SORTIERUNG", "int",),
	array("VERTRIEBSMITARBEITER", "string",),
	array("AUF_PREISLISTE", "string",),
	array("NUR_HAENDLER", "string",),
	array("SERIENNR_BEI_UPD", "string",),
	array("NEUER_ARTIKEL", "string",),
	array("VERSANDKOSTENFREI", "string",),
	array("VERSION_PACKUNG", "string",),
	array("VERSION_DOWNLOAD", "string",),
	array("BETRIEBSSYSTEM", "string",),
	array("ARTIKELSTATUS", "string",),
	array("SOLL_BESTAND", "string",),
	array("PFAND", "string",),
	array("AKTIV", "string",),
	array("AKTIV_VON", "string19",),
	array("AKTIV_BIS", "string19",),
	array("SUCHBEGRIFFE", "string",),
	array("HERSTELLER", "string",),
	array("LAENGE", "string",),
	array("BREITE", "string",),
	array("HOEHE", "string",),
	array("EXT_URL_LINK", "string",),
	array("EXT_URL_TEXT", "string",),
	array("UVP", "string",),
	array("EXT_DATEI_LINK", "string",),
	array("EXT_DATEI_TEXT", "string",),
	array("KANN_GESUCHT_WERDEN", "string",),
	array("IMMATIERIELLES_PRODUKT", "string",),
	array("ARTIKEL_DAZU", "string",),
	array("ARTIKEL_IST_IN_DIESEN_GRUPPEN", "string",),
	array("LIEFERSTATUS", "string",),
	array("LIEFERBAR_AM", "string19",),
	array("MINDESTBESTAND", "string",),
	array("ERINNERUNG_MINDESTBESTAND", "string",),
	array("INFO_FALLS_ARTIKEL_AUF_LAGER", "string",),
	array("INFO_FALLS_ARTIKEL_NICHT_AUF_LAGER", "string",),
	array("ATTRIBUTE", "string",),
	array("CROSSSELLING", "string",),
	array("ZUBEHOER", "string",),
	array("VARIANTE_VON", "string",),
	array("VARIANTENAUSWAHLNAME", "string",),
	array("GEHOERT_ZU_AKTION", "string",),
	array("ANUMMER_MASTERARTIKEL", "string",),
	array("RANG_MERKMALE", "string",),
	array("MIT_KUNDENPREISEN", "string",),
	array("ERZEUGT_AM_UM", "string19",),
	array("GEAENDERT_AM_UM", "string19",),
	array("BRUTTOPREIS", "float",),
);

/*
$vorhanden = array();
$res 	= safe_query("SHOW COLUMNS FROM $table");
while ($row = mysqli_fetch_object($res)) {
        $vorhanden[] = $row->Field;
}

print_r($vorhanden);


$art_arr = array(
	"string"=>"VARCHAR( 255 ) NOT NULL",
	"string19"=>"VARCHAR( 19 ) NOT NULL",
	"int"=>"INT(11) NOT NULL",
	"float"=>"FLOAT(2)",
	"text"=>"TEXT NOT NULL",
);

foreach($warengruppe as $arr) {
	$feld = $arr[0];
	$art = $arr[1];

	$add = $art_arr[$art];

	//	$sql = "ALTER TABLE `cc_warengruppe` ADD `xx` INT NOT NULL AFTER `wgID`;"


	echo $sql = "ALTER TABLE `$table` ADD `$feld` $add;";
	echo "<br>";
	safe_query($sql);

}
*/




