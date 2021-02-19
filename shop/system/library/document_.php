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

	/**
     * 
     *
     * @param	string	$title
     */
	public function displayCard($product_options, &$option_data) {
	   foreach($product_options as $product_option) {
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
	}
    public function displayOrder(&$totals) {
	   //print_r($totals);
       if(count($totals) == 2) {
              //echo count($totals);
              $totals[2] = $totals[1];
              $value1= $totals[0]['value'];
              $value_ = ($value1) - ($value1)/1.077; 
              $totals[1]['title'] = 'enthaltene MwSt. (7,7%)';
              $totals[1]['value'] = $value_;  
            } else if(count($totals) == 3)  {
                //echo count($totals);
                $totals[3] = $totals[2];
               $value1= $totals[0]['value'];
            $value2= $totals[1]['value'];
            $value_ = ($value1 + $value2) - ($value1 + $value2)/1.077; 
            $totals[2]['title'] = 'enthaltene MwSt. (7,7%)';
            $totals[2]['value'] = $value_;
            } else {
                $totals[4] = $totals[3];
                
               $value1= $totals[0]['value'];
            $value2= $totals[1]['value'];
            $value3= $totals[2]['value'];
            
            $value_ = ($value1 + $value2 + $value3) - ($value1 + $value2 + $value3)/1.077; 
            //echo $value1 + $value2 + $value3;
            $totals[3]['title'] = 'enthaltene MwSt. (7,7%)';
            $totals[3]['value'] = $value_;
            }
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