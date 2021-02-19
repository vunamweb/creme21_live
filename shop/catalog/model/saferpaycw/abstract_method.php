<?php
/**
  * You are allowed to use this API in your web application.
 *
 * Copyright (C) 2018 by customweb GmbH
 *
 * This program is licenced under the customweb software licence. With the
 * purchase or the installation of the software in your application you
 * accept the licence agreement. The allowed usage is outlined in the
 * customweb software licence which can be found under
 * http://www.sellxed.com/en/software-license-agreement
 *
 * Any modification or distribution is strictly forbidden. The license
 * grants you the installation in one application. For multiuse you will need
 * to purchase further licences at http://www.sellxed.com/shop.
 *
 * See the customweb software licence agreement for more details.
 *
 */

require_once DIR_SYSTEM . '/library/cw/SaferpayCw/init.php';


require_once 'SaferpayCw/SessionOrderContext.php';
require_once 'SaferpayCw/Language.php';
require_once 'SaferpayCw/Util.php';
require_once 'SaferpayCw/IPaymentMethodDefinition.php';
require_once 'SaferpayCw/PaymentMethod.php';
require_once 'SaferpayCw/PaymentMethodWrapper.php';


abstract class ModelPaymentSaferpayCwAbstract extends Model implements SaferpayCw_IPaymentMethodDefinition
{
	/**
	 * @var SaferpayCw_PaymentMethod
	 */
	private $paymentMethod;
	
	/**
	 * @var SaferpayCw_SettingApi
	 */
	private $settingsApi;
	
	public function __construct($registry) {
		parent::__construct($registry);
		SaferpayCw_Util::setRegistry($registry);
	}
	
	public function getMethod($address, $total)
	{
		
		$this->paymentMethod = new SaferpayCw_PaymentMethod($this);
		$this->settingsApi = $this->paymentMethod->getSettingsApi();
		
		$method_data = array();
		if ($this->isEnabled($address, $total)) {
			
			$description = null;
			$descriptionData = $this->settingsApi->getValue('description');
			$langId = SaferpayCw_Language::getCurrentLanguageId();
			if (!empty($descriptionData) && isset($descriptionData[$langId]) && !empty($descriptionData[$langId])) {
				$description = $descriptionData[$langId];
			}
			
			$method_data = array(
				'code'       => 'saferpaycw_' . strtolower($this->paymentMethod->getPaymentMethodName()),
				'title'      => $this->paymentMethod->getPaymentMethodDisplayName(),
				'sort_order' => $this->paymentMethod->getPaymentMethodConfigurationValue('sort_order'),
				'terms'      => '',
				'description' => $description,
			);
		}
		
		return $method_data;
	}
	
	protected function isEnabled($address, $total) {
		return $this->isActive() && $this->checkTotal($total) && $this->checkZones($address) && $this->checkCurrency() && $this->validate();
	}
	
	protected function validate() {
		$orderContext = new SaferpayCw_SessionOrderContext(new SaferpayCw_PaymentMethodWrapper($this->paymentMethod), $this->registry);
		$adapter = SaferpayCw_Util::getAuthorizationAdapterFactory()->getAuthorizationAdapterByContext($orderContext);
		$customerContext =  SaferpayCw_Util::getPaymentCustomerContext($orderContext->getCustomerId());
		try {
			$adapter->preValidate($orderContext, $customerContext);
			SaferpayCw_Util::persistPaymentCustomerContext($customerContext);
			return true;
		}
		catch(SaferpayCw_IncompleteDataException $e) {
			// We let the customer continue, when we get a exception because some data is missing. This is indicator that the checkout is somehow changed and hence
			// the validation was never really executed.
			SaferpayCw_Util::persistPaymentCustomerContext($customerContext);
			SaferpayCw_Util::log("Validation failed with: " . $e->getMessage(), 'error');
			return true;
		}
		catch(Exception $e) {
			SaferpayCw_Util::persistPaymentCustomerContext($customerContext);
			SaferpayCw_Util::log("Validation failed with: " . $e->getMessage(), 'error');
			return false;
		}
	}
	
	protected function checkTotal($total) {
		$minTotal = (float)$this->settingsApi->getValue('min_total');
		if ($minTotal > 0 && $minTotal > $total) {
			return false;
		}
		
		$maxTotal = (float)$this->settingsApi->getValue('max_total');
		if ($maxTotal > 0 && $maxTotal < $total) {
			return false;
		}
		
		return true;
	}
	
	protected function isActive() {
		if ($this->settingsApi->getValue('status') == 'enabled' || $this->settingsApi->getValue('status') === '1') {
			return true;
		}
		else {
			return false;
		}
	}
		
	protected function checkZones($address) {
		
		$allowedZones = $this->settingsApi->getValue('allowed_zones');
		if (count($allowedZones) <= 0) {
			return true;
		}
		
		foreach ($allowedZones as $zoneId) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone 
				WHERE 
					geo_zone_id = '" . (int)$zoneId . "' AND 
					country_id = '" . (int)$address['country_id'] . "' AND 
					(zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
			if ($query->num_rows) {
				return true;
			}
		}

		return false;		
	}
	
	protected function checkCurrency() {
		$allowedCurrencies = $this->settingsApi->getValue('active_currencies');
		$session = $this->registry->get('session');
		$currencyCode = $session->data['currency'];
		
		if (!is_array($allowedCurrencies) || count($allowedCurrencies) <= 0) {
			return true;
		}
		else if (in_array($currencyCode, $allowedCurrencies)) {
			return true;
		}
		else {
			return false;
		}
	}

}