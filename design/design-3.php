        <section class="section_banner_sub2 mtop">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-left">
                        <h1 style="text-align: left">Aktuelles</h1>
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
/* pixel-dusche.de */


// $sql = "SELECT * FROM news WHERE ngid=1 AND `sichtbar`=1 ORDER BY nerstellt DESC LIMIT 0,100";
$heute = date("Y-m-d");
$sql = "SELECT * FROM morp_cms_news WHERE ngid=1 AND `sichtbar`=1 AND ( nvon='0000-00-00' OR ( nvon <= '$heute' AND nbis >= '$heute' ) ) ORDER BY nerstellt DESC";
$res = safe_query($sql);
$anz = mysqli_num_rows($res);
$x = 0;


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
	if($row->pid) {
		$sql = "SELECT * FROM morp_cms_pdf WHERE pid=".$row->pid;
		$rs = safe_query($sql);
		$rw = mysqli_fetch_object($rs);
		$pdf = $rw->pname;
		$pdf = '<a href="'.$dir.'pdf/'.$pdf.'" target="_blank" class="btn btn_goshop">Zum PDF</a></p>';

	}

	$news .= '
							<div class="box_content pb-4">
                                <p class="date">'.euro_dat($row->nerstellt).'</p>
                                <h3 class="mb-4">'.$row->ntitle.'<br>'.$row->nsubtitle.'</h3>
                                <div class="row">
                                    '.($row->img1 ? '<div class="col-12 col-md-3">
                                        <img src="'.$dir.'images/news/'.$row->img1.'" alt="'.$row->ntitle.'" class="img-fluid" />
                                    </div>' : '').'
                                    <div class="col-12 col-md-'.($row->img1 ? '9' : '12').'">
                                        <h5 class="mt-md-0 mt-3">'.$row->ntext.'</h5>
                                        <p>'.$row->nabstr.'</p>
                                        '.$pdf.'
                                    </div>
                                </div>
                            </div>';
}



?>
        	<section class="section_workshoppage my-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8">
<?php

	echo $news;

?>
                        </div>
                        <div class="col-12 col-md-4">
&nbsp;
                        </div>
                    </div>
                </div>
            </section>
        </main>