<?php
class ControllerExtensionPaymentKsofort extends Controller {
	private $error = array();

	public function index() { 
		$this->load->language('extension/payment/ksofort');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			$this->model_setting_setting->editSetting('payment_ksofort', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}

		

		$this->load->model('localisation/currency');
		$data['currencies'] = $this->model_localisation_currency->getCurrencies();
		
		$data["sofortcurrencys"] = array("EUR","GBP","CHF","PLN","HUF","CZK");
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/ksofort', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);

		$data['action'] = $this->url->link('extension/payment/ksofort', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		if (isset($this->request->post['payment_ksofort_total'])) {
			$data['payment_ksofort_total'] = $this->request->post['payment_ksofort_total'];
		} else {
			$data['payment_ksofort_total'] = $this->config->get('payment_ksofort_total');
		}
		
		if (isset($this->request->post['payment_ksofort_configkey'])) {
			$data['payment_ksofort_configkey'] = $this->request->post['payment_ksofort_configkey'];
		} else {
			$data['payment_ksofort_configkey'] = $this->config->get('payment_ksofort_configkey');
		}
		
		if (isset($this->request->post['payment_ksofort_currency'])) {
			$data['payment_ksofort_currency'] = $this->request->post['payment_ksofort_currency'];
		} else {
			$data['payment_ksofort_currency'] = $this->config->get('payment_ksofort_currency');
		}

		if (isset($this->request->post['payment_ksofort_order_status_id'])) {
			$data['payment_ksofort_order_status_id'] = $this->request->post['payment_ksofort_order_status_id'];
		} else {
			$data['payment_ksofort_order_status_id'] = $this->config->get('payment_ksofort_order_status_id');
		}
		
		if (isset($this->request->post['payment_ksofort_order_status_id_canceled'])) {
			$data['payment_ksofort_order_status_id_canceled'] = $this->request->post['payment_ksofort_order_status_id_canceled'];
		} else {
			$data['payment_ksofort_order_status_id_canceled'] = $this->config->get('payment_ksofort_order_status_id_canceled');
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['payment_ksofort_geo_zone_id'])) {
			$data['payment_ksofort_geo_zone_id'] = $this->request->post['payment_ksofort_geo_zone_id'];
		} else {
			$data['payment_ksofort_geo_zone_id'] = $this->config->get('payment_ksofort_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['payment_ksofort_status'])) {
			$data['payment_ksofort_status'] = $this->request->post['payment_ksofort_status'];
		} else {
			$data['payment_ksofort_status'] = $this->config->get('payment_ksofort_status');
		}

		if (isset($this->request->post['payment_ksofort_sort_order'])) {
			$data['payment_ksofort_sort_order'] = $this->request->post['payment_ksofort_sort_order'];
		} else {
			$data['payment_ksofort_sort_order'] = $this->config->get('payment_ksofort_sort_order');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/ksofort', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/ksofort')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if(substr_count($this->request->post['payment_ksofort_configkey'], ':') != 2 ){
			$this->error['warning'] = $this->language->get('error_configkey');
		} 
		
		$sofortcurrencys = array("EUR","GBP","CHF","PLN","HUF","CZK");
		
		//if(!in_array($this->config->get('config_currency'), $sofortcurrencys) && $this->request->post['ksofort_status'] == 1)
		//{
		//	$this->error['warning'] = $this->language->get('error_sofort_currency');
		//}	

		return !$this->error;
	}
}