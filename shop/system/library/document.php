<?php
/**
 * @package		OpenCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2017, OpenCart, Ltd. (https://www.opencart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.opencart.com
*/

/**
* Document class
*/
class Document {
	private $title;
	private $description;
	private $keywords;
	private $links = array();
	private $styles = array();
     private $scripts = array();
     private $db;

	/**
     * 
     *
     * @param	string	$title
     */
	public function displayCard($product_options, $product_options_1, &$option_data) {
	   //return;
       //print_r($product_options); die();
       $count = 0;
       
       foreach($product_options_1 as $item) {
         $option_data[] = array(
                       'name' => '',
                       'value' => $item['name'] . ': ' . $item['value']
                       ); 
       }
       
       $option_data[] = array(
                       'name' => '',
                       'value' => ''
                       ); 
       
       foreach($product_options as $product_option) {
                   if($count > 0) {
                       $product_option = explode(';', $product_option);
                       $product_option = str_replace('"', '', $product_option);
                       
                       $product_option = $product_option[0] . ' ' .  $product_option[1];
                       
                       $product_option = preg_replace('/[^a-zA-Z0-9_ -]/s','',$product_option);
                       
                       $product_option = preg_replace_callback('/\u([0-9a-fA-F]{4})/', function ($match) {
                         return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
                      }, $product_option);
                       
                       $option_data[] = array(
                       'name' => '',
                       'value' => $product_option
                       ); 
                   }
        $count++; 
      }
	}
    public function displayOrder(&$totals, $country_id = null) {
	  //echo $country_id; 
       $this->db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tax_rate");

        $taxObj = $query->row;
        //print_r($taxObj); die();
        $tax = (int) $taxObj['rate'];
        $tax = 1 + $tax/100;
        
        $taxName = $taxObj['name'];
        //print_r($totals);

          if (count($totals) == 2) {
               //print_r($totals);
               $totals[2] = $totals[1];
               $value1 = $totals[0]['value'];
               $value_ = ($value1) - ($value1) / $tax;
               $totals[1]['title'] = $taxName;
               $totals[1]['value'] = $value_;
          } else if (count($totals) == 3) {
               // set shipping free or not free
               // if germany
               if ($country_id == 81){
                    if ((int) $totals[0]['value'] >= MIN_SHIP_GERMANY) {
                         $totals[1]['title'] = 'Versand';
                         $totals[1]['value'] = 0;

                         $totals[2]['value'] = $totals[0]['value'] + $totals[1]['value'];
                    }
               } else {
                    /*if ((int) $totals[0]['value'] >= 40) {
                         $totals[1]['title'] = 'Shipping';
                         $totals[1]['value'] = 0;

                         $totals[2]['value'] = $totals[0]['value'] + $totals[1]['value'];
                    }*/
               }
               //end set shipping
               //print_r($totals);
               if($totals[1]['code'] == 'coupon') {
                  $totals[0]['value'] = $totals[2]['value'];
                  $totals[1]['value'] = ($totals[0]['value']) - ($totals[0]['value']) / $tax;
               }else {
                    $totals[3] = $totals[2];
                    $value1 = $totals[0]['value'];
                    $value2 = $totals[1]['value'];
                    $value_ = ($value1 + $value2) - ($value1 + $value2) / $tax;
                    $totals[2]['title'] = $taxName;
                    $totals[2]['value'] = $value_;
               }
                
               //print_r($totals);
          } else {
               print_r($totals);
               $totals[4] = $totals[3];

               $value1 = $totals[0]['value'];
               $value2 = $totals[1]['value'];
            $value3= $totals[2]['value'];
            
            $value_ = ($value1 + $value2 + $value3) - ($value1 + $value2 + $value3)/$tax; 
            //echo $value1 + $value2 + $value3;
            $totals[3]['title'] = $taxName;
            $totals[3]['value'] = $value_;
            }
     }
     
     public function displayOrderAgain(&$total_data, $totals) {
          $total_data[4] = $total_data[3];
          $total_data[3] = $total_data[2];
          $total_data[2]['title'] = 'Gesamt (netto)';
          $total_data[2]['text'] = round($totals[3]['value'], 1) - round($totals[2]['value'], 2);
          $total_data[2]['text'] .= '€';
     }
    
    public function setTitle($title) {
		$this->title = $title;
	}

	/**
     * 
	 * 
	 * @return	string
     */
	public function getTitle() {
		return $this->title;
	}

	/**
     * 
     *
     * @param	string	$description
     */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
     * 
     *
     * @param	string	$description
	 * 
	 * @return	string
     */
	public function getDescription() {
		return $this->description;
	}

	/**
     * 
     *
     * @param	string	$keywords
     */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

	/**
     *
	 * 
	 * @return	string
     */
	public function getKeywords() {
		return $this->keywords;
	}
	
	/**
     * 
     *
     * @param	string	$href
	 * @param	string	$rel
     */
	public function addLink($href, $rel) {
		$this->links[$href] = array(
			'href' => $href,
			'rel'  => $rel
		);
	}

	/**
     * 
	 * 
	 * @return	array
     */
	public function getLinks() {
		return $this->links;
	}

	/**
     * 
     *
     * @param	string	$href
	 * @param	string	$rel
	 * @param	string	$media
     */
	public function addStyle($href, $rel = 'stylesheet', $media = 'screen') {
		$this->styles[$href] = array(
			'href'  => $href,
			'rel'   => $rel,
			'media' => $media
		);
	}

	/**
     * 
	 * 
	 * @return	array
     */
	public function getStyles() {
		return $this->styles;
	}

	/**
     * 
     *
     * @param	string	$href
	 * @param	string	$postion
     */
	public function addScript($href, $postion = 'header') {
		$this->scripts[$postion][$href] = $href;
	}

	/**
     * 
     *
     * @param	string	$postion
	 * 
	 * @return	array
     */
	public function getScripts($postion = 'header') {
		if (isset($this->scripts[$postion])) {
			return $this->scripts[$postion];
		} else {
			return array();
		}
	}
}