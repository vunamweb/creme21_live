<?php

/// ------------------ start der regulaeren sitemap.create


if(file_exists("../lokal.dat")) $xmlpfad = $morpheus["local"];
else $xmlpfad = $morpheus["url"];

$lang_arr = $morpheus["lan_arr"];

$multilang = $morpheus["multilang"];


foreach ($lang_arr as $lang_id=>$lan) {
	include("../nogo/navID_".$lan.".inc");


	// hauptnav, ohne meta menu, ohne footer menu
	// $que  	= "SELECT * FROM `morp_cms_nav` WHERE (sichtbar=1 AND `lock` < 1 AND lang=$lang_id AND bereich < 2 AND ebene=1) ORDER BY `sort` ASC";
	$que  	= "SELECT * FROM `morp_cms_nav` WHERE (sichtbar=1 AND lang=$lang_id AND bereich < 2 AND ebene=1) ORDER BY `sort` ASC";
	$res 	= safe_query($que);
	$menge	= mysqli_num_rows($res);

	$arr_H=array();

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//Struktur richtige Reihenfolge
	while ($row = mysqli_fetch_object($res)) {
		$startEbene1 = 1;

		$arr_H[] = $row->navid;

		//start ebene 2
		$res_2 = getNav($lang_id, $row->navid);
		while ($row2 = mysqli_fetch_object($res_2)) {
			$arr_H[] = $row2->navid;

			//start ebene 3
			$res_3 = getNav($lang_id, $row2->navid);
			while ($row3 = mysqli_fetch_object($res_3)) {
				$arr_H[] = $row3->navid;

			}
		}
	}

	// print_r($arr_H);
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *


	$homeID = $morpheus["home_ID"][$lan];

	$lnk_arr = array();
	$nm_arr  = array();

	$footer_set = '<?php  $nav = \'
';
	$sub_on	= 0;
	$sub_on2	= 0;
	$sub_on3	= 0;
	$subsub_ende = 0;
	$ausnahme = array(999);		// das sind hauptnavigatiosIDs, die direkt ein zusätzliches modul bedienen
	$start = 1;

	$par3	= 0;

	foreach ($arr_H as $val) {
		$y++;
		if ($lastid != $val) {
			$que  	= "SELECT * FROM `morp_cms_nav` WHERE navid=$val";
			$res 	= safe_query($que);
			$rw 	= mysqli_fetch_object($res);

			$nm 	= $rw->name;
			$par	= $rw->parent;
			$ebene	= $rw->ebene;
			$nid	= $rw->navid;
			$manuellerLink 	= $rw->lnk;
			$accesskey = $rw->accesskey;
			$anker = 0;

			// echo "$nm - $nid - $ebene - $par - \n";

			if($manuellerLink) {
				if(isin("http", $manuellerLink)) {
					$extern=1;
				}
				elseif(isin("#", $manuellerLink)) {
					$anker=1;
					$manuellerLink = explode('#', $manuellerLink);
					$manuellerLink = $xmlpfad.$navID[$manuellerLink[0]].'#'.$manuellerLink[1];
				}
				else $manuellerLink = $xmlpfad.$navID[$manuellerLink];
			}

			if ( $ebene < 2 ) {
				// wenn keine subnavigation gesetzt - platzhalter loeschen
				// ? $footer_set = str_replace(array('xx'.$par.'xx', 'dd'.$par3, 'SPAN', 'DPD'), array(''), $footer_set);
				$footer_set = str_replace(array('xx'.$par.'xx', 'SPAN', 'DPDS', 'DPD', 'YYY'), array(''), $footer_set);

				if($nid == $homeID && $lan == "de")		$url = $xmlpfad;
				elseif ($nid == $homeID)				$url = $xmlpfad.$lan.'/';
				else 									$url = $xmlpfad.($multilang ? $lan.'/' : '').$navID[$val];

				$lnk = '<a'.($accesskey != '' ? ' accesskey="'.$accesskey.'"' : '').' href="'.$url.'" class="nav-link DPD" itemprop="name">'.($nm).'SPAN</a>';

/*
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Dropdown</a>
					<ul class="dropdown-menu">
						<li><a href="#">Custom Menu</a></li>
						<li><a href="#">Custom Menu<p class="description">This is Description</p></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Dropdown</a>
							<ul class="dropdown-menu">
								<li><a href="#">Custom Menu</a></li>
								<li><a href="#">Custom Menu</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Dropdown</a>
									<ul class="dropdown-menu">
										<li><a href="#">Custom Menu</a></li>
										<li><a href="#">Custom Menu</a></li>
										<li><a href="#">Custom Menu</a></li>
									</ul>
								</li>
								<li><a href="#">Custom Menu</a></li>
							</ul>
						</li>
					</ul>
				</li>
*/

				// subnavigation abschliessen
				if($sub_on3) $footer_set .= '
							</div>
						
					</div>
				
';
				else if($sub_on2) $footer_set .= '
					</div>
				
';
				$footer_set .= $start || $sub_on2 ? '' : '';

				$start = 0;

				// hauptnav abschliessen
				$footer_set .= ($sub_on ? '
' : '') .'				<li class="nav-item '.($nid == $homeID ? ' ' : '').'n'.($nid).'n xx'.$nid.'xx" itemprop="url">'.$lnk.'';

				// parameter, die z.T. ueberpruefen, ob eine subnavi aufgerufen wird
				$lasturl = $navID[$val];
				$sub_on = 1;
				$sub_on2 = 0;
				$sub_on3 = 0;
				$subsub_ende = 0;

				$gesamtArray[] = $nid;
			}

			elseif ( $ebene == 2 ) {
				// platzhalter aus hauptnav beim ersten durchlauf loeschen
				if (!$sub_on2) $footer_set = str_replace(array('xx'.$par.'xx', 'SPAN', 'DPD'), array('dropdown', '', 'dropdown-toggle n'.$par.'" data-toggle="dropdown"'), $footer_set);
				$lasturl = 0;


/*

                    <ul class="navbar-nav navbar-mobile mr-0">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produkte</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="materials.php">Materialien</a></li>
*/




				if($sub_on3) $footer_set .= '
							</div>
';

				$footer_set .= (!$sub_on2 ? '
					<div class="dropdown-menu">' : '					<!-- weg -->');

				// parameter werden gesetzt. subnav vorhanden !!!!
				$sub_on2 = 1;
				$sub_on3 = 0;
				$subsub_ende = 1;

				$footer_set .= '
						<a'.($accesskey != '' ? ' accesskey="'.$accesskey.'"' : '').' href="'.($manuellerLink ? $manuellerLink : $xmlpfad.($multilang ? $lan.'/' : '').$navID[$val]).'"'.($extern ? ' target="_blank"' : '').' class="dropdown-item DPDS s'.($nid).' dd'.($nid).'" itemprop="name" YYY>'.($nm).'</a>';

				$gesamtArray[] = $nid;
				// $par3 = $nid;
			}

			elseif ( $ebene == 3 ) {
/*
				// platzhalter aus hauptnav beim ersten durchlauf loeschen
				// echo $par."<br>";
				if (!$sub_on3) $footer_set = str_replace(array('dd'.$par3, 'SPAN', 'DPDS', 'YYY'), array('dropdown', '', 'dropdown-toggle', ' data-toggle="dropdown" '), $footer_set);
				$lasturl = 0;

				$footer_set .= (!$sub_on3 ? '
							<div class="dropdown-menu" itemprop="url">' : '');

				// parameter werden gesetzt. subnav vorhanden !!!!
				$sub_on3 = 1;

				$footer_set .= '
							<a'.($accesskey != '' ? ' accesskey="'.$accesskey.'"' : '').' href="'.$xmlpfad.($multilang ? $lan.'/' : '').$navID[$val].'" class="s'.($nid).'" itemprop="name">'.($nm).'</a>';

				$gesamtArray[] = $nid;
*/
			}
		}
	}

	if($sub_on3) $footer_set .= '
							</div>
						
					</div>
				
';
	else if($sub_on2) $footer_set .= '
					</div>
				</li>
';
	else if($sub_on) $footer_set .= '
';


/*
	      <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">Something else here</a>
            <ul class="dropdown-menu">
              <a class="dropdown-item" href="#">A</a>
              <a class="dropdown-item" href="#">b</a>
            </ul>
          </li>
*/

	if ($lasturl) $footer_set = str_replace(array('SPAN', 'DPD'), '', $footer_set);

/*
	$que  	= "SELECT * FROM `morp_cms_nav` WHERE ebene=1 AND sichtbar=1 AND lang=$lan_id AND bereich = 2 ORDER BY `sort`";
	$res 	= safe_query($que);
	$nav_meta = '';

	while ($rw = mysqli_fetch_object($res)) {
		$par	 = $rw->parent;
		$nid	 = $rw->navid;
		$nm	 	 = $rw->name;
		$name	 = eliminiere($nm);

		$nav_meta .= '		<li><a href="'.$xmlpfad.($multilang ? $lan.'/' : '').$navID[$nid].'" title="'.$name.'"><strong>'.$nm.'</strong></a></li>'."\n\t";
	}
*/

#	$xmlpfad = "/peakom/";
	 $footer_set = $footer_set.'
\';
?>
';

	# print_r($gesamtArray);

	save_data("../nogo/nav_".$lan.".inc", $footer_set, "w");
	unset($footer_set);

	// echo $lan_id;
	$arr = readCompleteNavOrdered($lang_id);
	save_data("../nogo/orderedList_".$lan.".inc", $arr, "w");

}
 //  die();
?>