        <section class="section_banner_sub2 mtop">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-left">
                        <h1 style="text-align: left">Workshops</h1>
                    </div>
                </div>
            </div>
            <div class="box_contact">
                    <p class="mobile mb-md-2"><img src="<?php echo $dir.'images/SVG/i_call.svg'; ?>" alt="Beratung Leipzig" class="img-fluid" width="27"> Mobil: <a href="tel:<?php echo $morpheus["fon"]; ?>"> <?php echo $morpheus["fon"]; ?></a></p>
                    <p class="mb-0 email"><a href="mailto:<?php echo $morpheus["email"]; ?>"><?php echo $morpheus["email"]; ?></a></p>
            </div>
        </section>


        <main>
<?php
$heute = date("Y-m-d");

/*
$sql = "SELECT * FROM morp_events e, morp_event_kategorie k, morp_event_orte o
	WHERE
		e.oid = o.oid
		AND e.kid=k.kid
		AND eventDatum >= '$heute'
	ORDER by eventDatum DESC, eventName ASC, o.stadt ASC";
*/

$sql = "SELECT * FROM morp_events e, morp_event_orte o
	WHERE
		e.oid = o.oid
	ORDER by eventDatum ASC, eventKat ASC, o.stadt ASC";

$res = safe_query($sql);

$oldKat = '';
$oldDat = '';
$endTable = 0;


$left__side = '';
$right__side = '';


while($row = mysqli_fetch_object($res)) {
	$startDat = $row->eventDatum;
	$endDat = $row->eventEndDatum;
	$uhrzeit = $row->zusatz;
	$zusatz = $row->zusatz2;

	$plz = $row->plz;
	$stadt = $row->stadt;
	$veranstOrt = $row->veranstOrt;
	$www = $row->www;
	$strasse = $row->strasse;

	$name = $row->name;
	$vorname = $row->vorname;

	//$bezeichnung = $row->bezeichnung;
	$bezeichnung = $row->eventKat;
	//
	// if($row->kid == 13 || $row->kid == 10) 	$mail = $row->email;
	// if($row->kid == 10) 	$mail = $row->email;

	$mail = $row->vpipmail ? $row->vpipmail : $row->email;

	$kat = $row->bezeichnung;

	$veranstaltung = $row->eventName;

	$month = dat_monat($startDat, 1, 1);

	$left__side .= '
                            <div class="box_content">
                                <p class="date">'.nl2br($row->zusatz2).'</p>
                                <h3>'.$bezeichnung.':<br>'.$row->eventName.'</h3>
                                <p>'.$row->eventText.'</p>
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Uhrzeit:</td>
                                        <td>'.$row->zusatz.'</td>
                                    </tr>
                                    <tr>
                                        <td>Ort:</td>
                                        <td>'.$veranstOrt.'<br>
                                        '.$strasse.'<br>
                                        '.$plz.' '.$stadt.'</td>
                                    </tr>
                                    <tr>
                                        <td>Kosten:</td>
                                        <td>'.$row->preis.'</td>
                                    </tr>
                                    '.( $row->anmeldung ? '<tr>
                                        <td>Anmeldung:</td>
                                        <td>'.$row->anmeldung.'</td>
                                    </tr>' : '').'
                                    '.( $row->anmeldung ? '<tr>
                                        <td>Anmeldeschluss:</td>
                                        <td>'.nl2br($row->event_zusage).'</td>
                                    </tr>' : '').'
                                </table>
                            </div>
	';

	$right__side .= '
	                            <div class="box_overview_content">
                                    <p class="date">'.nl2br($row->zusatz2).'</p>
                                    <h3>'.$bezeichnung.':<br>
                                    '.$row->eventName.'</h3>
                                </div>
';


}
?>
        	<section class="section_workshoppage my-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8">
<?php

	echo $left__side;

?>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="box_overview">
                                <h2>Übersicht</h2>
 <?php

	echo $right__side;

?>                          </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>