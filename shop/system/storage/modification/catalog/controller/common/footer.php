<?php
class ControllerCommonFooter extends Controller {
	public function index() {
		$this->load->language('common/footer');

		$this->load->model('catalog/information');

		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}

		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', true);
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['tracking'] = $this->url->link('information/tracking');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', true);
		$data['affiliate'] = $this->url->link('affiliate/login', '', true);
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['newsletter'] = $this->url->link('account/newsletter', '', true);
						
				$data['block4'] = $this->load->controller('common/block4');			
				$data['block5'] = $this->load->controller('common/block5');				
				$data['block6'] = $this->load->controller('common/block6');				
				$data['block7'] = $this->load->controller('common/block7');				
				$data['block8'] = $this->load->controller('common/block8');				
				$data['block9'] = $this->load->controller('common/block9');				
				if ($this->request->server['HTTPS']) {
					$server = $this->config->get('config_ssl');
				} else {
					$server = $this->config->get('config_url');
				}
			

		$data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = ($this->request->server['HTTPS'] ? 'https://' : 'http://') . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
		}

		$data['scripts'] = $this->document->getScripts('footer');
        
        $data['social'] = file_get_contents('include/14.php');
        $data['col_1'] = file_get_contents('include/15.php');
        
        //cookie
        $content = '';
        
        if (!isset($_COOKIE["disclaim"])) {
           $mail = 'fragmich@mytexmask.ch';
           $kunde = 'Andrea Skurnia';
           
           $content = '<div id="cookie_disclaimer">
          <div><p>
            '.$kunde.' benutzt Cookies, um seinen Benutzern das beste Webseiten-Erlebnis zu ermöglichen. Außerdem werden teilweise auch Cookies von Diensten Dritter gesetzt. Weiterführende Informationen erhalten Sie in der Datenschutzerklärung.
<a href="./datenschutz" title="Weiterlesen …">Weiterlesen …</a>
            <a href="#" id="cookie_stop">Ich akzeptiere</a></p>
        </div>
    </div>'; 
        } 
		$data['cookie']= $content;
		
		$data['footer_meta'] = ((int)$this->config->get('config_language_id') == 2) ? file_get_contents('../nogo/meta_de.inc') : file_get_contents('../nogo/meta_en.inc');
		
		return $this->load->view('common/footer', $data);
	}
}