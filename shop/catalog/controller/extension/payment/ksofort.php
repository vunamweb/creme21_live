<?php
class ControllerExtensionPaymentKsofort extends Controller {
	public function index() {
		$data['text_loading'] = $this->language->get('text_loading');

		$data['button_confirm'] = $this->language->get('button_confirm');

		$data['text_loading'] = $this->language->get('text_loading');

		$data['continue'] = $this->url->link('checkout/success');
		
		$this->load->model('checkout/order');
		
		if(isset($this->session->data['order_id']))
		{
			$order = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		}
		else
		{
			$order = "";
		}

		$data['action'] = $this->url->link('extension/payment/ksofort/checkout', '', 'SSL');

		return $this->load->view('extension/payment/ksofort', $data);
	}

	public function checkout() {
		spl_autoload_register(function ($class_name) {
			if(file_exists(DIR_SYSTEM . 'library/' . str_replace('\\','/', $class_name)  . '.php'))
				include DIR_SYSTEM . 'library/' . str_replace('\\','/', $class_name)  . '.php';
		});

		$this->load->language('extension/payment/ksofort');
		$this->load->model('checkout/order');

		if(isset($this->session->data['order_id']))
		{
			$order = $this->model_checkout_order->getOrder($this->session->data['order_id']);
			
		}
		else 
		{
			$order = null;
		}

		if(!isset($order))
		{			
			header('Location: ' . $this->url->link('checkout/checkout', '', 'SSL'));
		}
		else
		{					
			$configkey = $this->config->get('payment_ksofort_configkey');

			$Sofortueberweisung = new Sofort\SofortLib\Sofortueberweisung($configkey);
			
			$amount = round(($order['total'] * $this->currency->getValue($this->config->get('payment_ksofort_currency'))),2); 

			$Sofortueberweisung->setAmount($amount);
			$Sofortueberweisung->setCurrencyCode($this->config->get('payment_ksofort_currency'));

			$Sofortueberweisung->setReason("Sofort - " . $order['order_id'] . " - " . $order['lastname'] . " " . $order['firstname']);
			$Sofortueberweisung->setUserVariable($order['order_id']);
			$Sofortueberweisung->setSuccessUrl($this->url->link('checkout/success'), true);
			$Sofortueberweisung->setAbortUrl($this->url->link('extension/payment/ksofort/abort'));
			$Sofortueberweisung->setNotificationUrl($this->url->link('extension/payment/ksofort/confirm'));
			$Sofortueberweisung->setSenderCountryCode($order['payment_iso_code_2']);
		
			$Sofortueberweisung->setVersion('opencart_3/Karley_Sofort_1.0');

			$Sofortueberweisung->sendRequest();

			if($Sofortueberweisung->isError()) {

				$this->session->data['error'] = $this->language->get('error_payment');
	
				$this->response->redirect($this->url->link('checkout/checkout', '', true));

			} else {
				$paymentUrl = $Sofortueberweisung->getPaymentUrl();

				header('Location: '.$paymentUrl);
			}
		}
	}
	
	public function abort() {
		$this->load->model('checkout/order');

		if(isset($this->session->data['order_id'])){
			$this->db->query("Update `" . DB_PREFIX . "order` set order_status_id = " . $this->config->get('payment_ksofort_order_status_id_canceled') . " WHERE order_id = " . (int)$this->session->data['order_id']);
		}
		
		$this->response->redirect($this->url->link('checkout/checkout', '', 'SSL'));
	}
	
	public function confirm() {

		spl_autoload_register(function ($class_name) {
			if(file_exists(DIR_SYSTEM . 'library/' . str_replace('\\','/', $class_name)  . '.php'))
				include DIR_SYSTEM . 'library/' . str_replace('\\','/', $class_name)  . '.php';
		});
		
		$configkey = $this->config->get('payment_ksofort_configkey');


		$SofortLib_Notification = new Sofort\SofortLib\Notification();
		$TestNotification = $SofortLib_Notification->getNotification(file_get_contents('php://input'));
			
		 echo $SofortLib_Notification->getTransactionId();
		 echo '<br />';
		 echo $SofortLib_Notification->getTime();
		 echo '<br />';

		$SofortLibTransactionData = new Sofort\SofortLib\TransactionData($configkey);


		$SofortLibTransactionData->addTransaction($TestNotification);
		$SofortLibTransactionData->setApiVersion('2.0');

		$SofortLibTransactionData->sendRequest();
		$order_id = $SofortLibTransactionData->getUserVariable();

		$sofort_status = $SofortLibTransactionData->getStatus();
		$transaction_id = $SofortLibTransactionData->getTransaction();

		if($SofortLibTransactionData->isError()) {
			$text = $SofortLibTransactionData->getError();
			$email = $this->config->get('config_email');
			mail($email,'Sofort.com - Error',$text);
			
		} else {
			if(isset($order_id) && $sofort_status != "loss" && $sofort_status != "refunded")
			{
				$this->load->model('checkout/order');

				$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('payment_ksofort_order_status_id'), 'Sofort-ID: ' . $transaction_id);
			}
		}		
	}
}