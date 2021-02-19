<?php
/* pixel-dusche.de */
global $dir, $navID;

// $sql = "SELECT * FROM news WHERE ngid=1 AND `sichtbar`=1 ORDER BY nerstellt DESC LIMIT 0,100";
$heute = date("Y-m-d");
$sql = "SELECT * FROM morp_cms_news WHERE ngid=1 AND `sichtbar`=1 AND ( nvon='0000-00-00' OR ( nvon <= '$heute' AND nbis >= '$heute' ) ) ORDER BY nerstellt DESC LIMIT 0,2";
$res = safe_query($sql);
$anz = mysqli_num_rows($res);
$x = 0;


$output .= '                    <div class="row">
';

while ($row = mysqli_fetch_object($res)) {

	$x++;

	$link = '';
/*
	if($row->nlink) {
		if(isin("http", $row->nlink)) {
			$link = '<p class="pt2"><a href="'.$row->nlink.'" target="_blank"><i class="fa fa-external-link"></i> &nbsp; '.$row->nlink.'</a></p>';
		}
		else $link = '<p class="pt2"><a href="'.$dir.$navID[$row->nlink].'"><i class="fa fa-external-link"></i>  &nbsp; weitere Informationen</a></p>';

	}
*/
	$pdf = '';
/*
	if($row->pid) {
		$sql = "SELECT * FROM morp_cms_pdf WHERE pid=".$row->pid;
		$rs = safe_query($sql);
		$rw = mysqli_fetch_object($rs);
		$pdf = $rw->pname;
		$pdf = '<p class="pt2"><a href="'.$dir.'pdf/'.$pdf.'" target="_blank"><i class="fa fa-download"></i> &nbsp; PDF / '.$rw->pdesc.'</a></p>';

	}
*/

	$output .= '

                        <div class="col-12 col-md-6">
                            <div class="box_news">
                                <p class="date">'.euro_dat($row->nerstellt).' / Januar 2020</p>
                                <h3>'.$row->ntitle.'<br>
                                '.$row->nsubtitle.'</h3>
                                <h4>'.$row->ntext.'</h4>
                                <p>'.$row->nabstr.'</p>
                                <a href="'.$dir.$navID[8].'" class="btn btn-link btn_goshop">zu Aktuelles</a>
                            </div>
                        </div>

	';
}


$output .= '</div>';

?>