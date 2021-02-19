<?php
/* pixel-dusche.de */
global $templCt, $cid, $dir;


if(!$templCt) $templCt = 1;
else $templCt++;
if($templCt == 4) $templCt = 1;

$colors = array(1=>"orange", 2=>"green", 3=>"rot");
$thisColor = $colors[$templCt];

$colorFollows = array("orange"=>"green", "green"=>"rot", "rot"=>"orange");
$pfeilColor = $colorFollows[$thisColor];



if($text) {
	$table = "morp_mitarbeiter";
	$tid = "mid";
	$sql = "SELECT * FROM $table WHERE $tid=".$text."";
	$res = safe_query($sql);
	$row = mysqli_fetch_object($res);

	$output .= '

			<div class="swiper-slide">
			    <div class="col pad0 myslide" style="background: url('.$dir.'images/team/'.urlencode($row->img1).') no-repeat center top; background-size: cover; height: 100%;"></div>
			    <div class="sliderBorder">
				    <span class="next '.$pfeilColor.'"></span>
			    </div>
			    <div class="col colored '.$thisColor.'">
				      <div class="text">'.$row->beschreibung.'</div>
				      <div class="name">'.$row->vorname.' '.$row->name.'</div>
				      '.($row->img2 ? '<div class="img"><img src="'.$dir.'mthumb.php?w=200&amp;src=images/team/'.urlencode($row->img2).'" alt="'.$row->img2.'" class="img-fluid" /></div>' : '').'
			    </div>
			</div>';

}


$morp = "Mitarbeiter / ";

?>