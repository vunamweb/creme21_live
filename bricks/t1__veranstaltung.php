<?php
/* pixel-dusche.de */
global $cid, $dir, $navID, $uri;

$_SESSION["lastPage"] = $uri;

$heute = date("Y-m-d");

/*
$sql = "SELECT * FROM morp_events e, morp_event_kategorie k, morp_event_orte o
	WHERE
		e.oid = o.oid
		AND e.kid=k.kid
		AND eventDatum >= '$heute'
	ORDER by eventDatum ASC, eventName ASC, o.stadt ASC LIMIT 0,3";
*/

$sql = "SELECT * FROM morp_events e, morp_event_orte o
	WHERE
		e.oid = o.oid
		AND eventDatum >= '$heute'
	ORDER by eventDatum ASC, eventName ASC, o.stadt ASC LIMIT 0,3";

$res = safe_query($sql);

$oldKat = '';
$oldDat = '';
$endTable = 0;

$output .= '
                    <div class="row">
';

while($row = mysqli_fetch_object($res)) {
	$startDat = $row->eventDatum;
	$endDat = $row->eventEndDatum;
	$uhrzeit = $row->zusatz;
	$zusatz = $row->zusatz2;

	$plz = $row->plz;
	$stadt = $row->stadt;
	$veranstOrt = $row->veranstOrt;
	$www = $row->www;

	$name = $row->name;
	$vorname = $row->vorname;
	//
	// if($row->kid == 13 || $row->kid == 10) 	$mail = $row->email;
	// if($row->kid == 10) 	$mail = $row->email;

	$mail = $row->vpipmail ? $row->vpipmail : $row->email;

	$kat = $row->bezeichnung;

	$veranstaltung = $row->eventName;

	$month = dat_monat($startDat, 1, 1);


	$output .= '
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box_workshop">
                                <p class="date">'.nl2br($row->zusatz2).'</p>
                                <h3>'.$row->eventKat.':<br>
                                '.$row->eventName.'</h3>
                                <p>'.$row->eventAbstract.'</p>
                                <a href="'.$dir.$navID[4].'" class="btn btn-link btn_goshop">zu Workshops</a>
                            </div>
                        </div>

';

}

$output .= '
			    </div>


';

$morp = "Veranstaltung / ";

?>