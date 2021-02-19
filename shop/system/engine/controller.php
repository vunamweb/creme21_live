<?php
/**
 * @package		OpenCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2017, OpenCart, Ltd. (https://www.opencart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.opencart.com
*/

/**
* Controller class
*/
abstract class Controller {
	protected $registry;

	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function __get($key) {
		return $this->registry->get($key);
	}

	public function __set($key, $value) {
		$this->registry->set($key, $value);
	}
    
    public function checkMixMask() {
        return true;
        $products = $this->cart->getProducts();
        
        $group_mix_mask = array();
        $totals = array();
        
        foreach($products as $product) {
            if($product['cart_option'] != '[]' && !in_array($product['cart_option'], $group_mix_mask))
              $group_mix_mask[] = $product['cart_option'];
        }
        
        //print_r($group_mix_mask); die();
        
        if(count($group_mix_mask) == 0)
          return true;
        else {
            for($i = 0; $i < count($group_mix_mask); $i++) {
                $totals[$i] = 0;
                
                foreach($products as $product)
                  if($group_mix_mask[$i] == $product['cart_option'])
                   $totals[$i] = $totals[$i] + $product['quantity'];
            }
            
            //print_r($totals); die();
            foreach($totals as $total)
              if($total != 10)
                return false;
                
            return true;    
        }  
    }
}