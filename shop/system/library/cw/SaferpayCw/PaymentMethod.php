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


require_once 'Customweb/Payment/Authorization/IPaymentMethod.php';

require_once 'SaferpayCw/Util.php';
require_once 'SaferpayCw/Entity/Transaction.php';
require_once 'SaferpayCw/PaymentMethod.php';
require_once 'SaferpayCw/TransactionContext.php';
require_once 'SaferpayCw/PaymentMethodWrapper.php';
require_once 'SaferpayCw/Store.php';
require_once 'SaferpayCw/Language.php';
require_once 'SaferpayCw/DefaultPaymentMethodDefinition.php';
require_once 'SaferpayCw/SettingApi.php';
require_once 'SaferpayCw/OrderContext.php';


final class SaferpayCw_PaymentMethod implements Customweb_Payment_Authorization_IPaymentMethod{

	/**
	 * @var SaferpayCw_IPaymentMethodDefinition
	 */
	private $paymentMethodDefinitions;

	/**
	 * @var SaferpayCw_SettingApi
	 */
	private $settingsApi;

	private static $completePaymentMethodDefinitions = array(
		'creditcard' => array(
			'machineName' => 'CreditCard',
 			'frontendName' => 'Credit Card',
 			'backendName' => 'Saferpay: Credit Card',
 		),
 		'mastercard' => array(
			'machineName' => 'MasterCard',
 			'frontendName' => 'MasterCard',
 			'backendName' => 'Saferpay: MasterCard',
 		),
 		'visa' => array(
			'machineName' => 'Visa',
 			'frontendName' => 'Visa',
 			'backendName' => 'Saferpay: Visa',
 		),
 		'americanexpress' => array(
			'machineName' => 'AmericanExpress',
 			'frontendName' => 'American Express',
 			'backendName' => 'Saferpay: American Express',
 		),
 		'diners' => array(
			'machineName' => 'Diners',
 			'frontendName' => 'Diners Club',
 			'backendName' => 'Saferpay: Diners Club',
 		),
 		'jcb' => array(
			'machineName' => 'Jcb',
 			'frontendName' => 'JCB',
 			'backendName' => 'Saferpay: JCB',
 		),
 		'bonuscard' => array(
			'machineName' => 'BonusCard',
 			'frontendName' => 'Bonus Card',
 			'backendName' => 'Saferpay: Bonus Card',
 		),
 		'postfinanceefinance' => array(
			'machineName' => 'PostFinanceEFinance',
 			'frontendName' => 'PostFinance E-Finance',
 			'backendName' => 'Saferpay: PostFinance E-Finance',
 		),
 		'postfinancecard' => array(
			'machineName' => 'PostFinanceCard',
 			'frontendName' => 'PostFinance Card',
 			'backendName' => 'Saferpay: PostFinance Card',
 		),
 		'maestro' => array(
			'machineName' => 'Maestro',
 			'frontendName' => 'Maestro',
 			'backendName' => 'Saferpay: Maestro',
 		),
 		'vpay' => array(
			'machineName' => 'Vpay',
 			'frontendName' => 'V PAY',
 			'backendName' => 'Saferpay: V PAY',
 		),
 		'myone' => array(
			'machineName' => 'MyOne',
 			'frontendName' => 'myONE',
 			'backendName' => 'Saferpay: myONE',
 		),
 		'directdebits' => array(
			'machineName' => 'DirectDebits',
 			'frontendName' => 'Direct Debits',
 			'backendName' => 'Saferpay: Direct Debits',
 		),
 		'directebanking' => array(
			'machineName' => 'DirectEBanking',
 			'frontendName' => 'Sofort Banking',
 			'backendName' => 'Saferpay: Sofort Banking',
 		),
 		'paypal' => array(
			'machineName' => 'PayPal',
 			'frontendName' => 'PayPal',
 			'backendName' => 'Saferpay: PayPal',
 		),
 		'giropay' => array(
			'machineName' => 'Giropay',
 			'frontendName' => 'giropay',
 			'backendName' => 'Saferpay: giropay',
 		),
 		'ideal' => array(
			'machineName' => 'IDeal',
 			'frontendName' => 'iDEAL',
 			'backendName' => 'Saferpay: iDEAL',
 		),
 		'paydirekt' => array(
			'machineName' => 'Paydirekt',
 			'frontendName' => 'paydirekt',
 			'backendName' => 'Saferpay: paydirekt',
 		),
 		'eps' => array(
			'machineName' => 'Eps',
 			'frontendName' => 'EPS',
 			'backendName' => 'Saferpay: EPS',
 		),
 		'masterpass' => array(
			'machineName' => 'MasterPass',
 			'frontendName' => 'MasterPass',
 			'backendName' => 'Saferpay: MasterPass',
 		),
 		'applepay' => array(
			'machineName' => 'ApplePay',
 			'frontendName' => 'Apple Pay',
 			'backendName' => 'Saferpay: Apple Pay',
 		),
 		'openinvoice' => array(
			'machineName' => 'OpenInvoice',
 			'frontendName' => 'Open Invoice',
 			'backendName' => 'Saferpay: Open Invoice',
 		),
 		'bcmc' => array(
			'machineName' => 'Bcmc',
 			'frontendName' => 'Bancontact',
 			'backendName' => 'Saferpay: Bancontact',
 		),
 		'twint' => array(
			'machineName' => 'Twint',
 			'frontendName' => 'Twint',
 			'backendName' => 'Saferpay: Twint',
 		),
 		'chinaunionpay' => array(
			'machineName' => 'ChinaUnionpay',
 			'frontendName' => 'China Unionpay',
 			'backendName' => 'Saferpay: China Unionpay',
 		),
 		'alipay' => array(
			'machineName' => 'Alipay',
 			'frontendName' => 'Alipay',
 			'backendName' => 'Saferpay: Alipay',
 		),
 	);

	public function __construct(SaferpayCw_IPaymentMethodDefinition $defintions) {
		$this->paymentMethodDefinitions = $defintions;
		$this->settingsApi = new SaferpayCw_SettingApi('payment_saferpaycw_' . $this->paymentMethodDefinitions->getMachineName());
	}

	public static function getPaymentMethod($paymentMethodMachineName) {
		$paymentMethodMachineName = strtolower($paymentMethodMachineName);

		if (isset(self::$completePaymentMethodDefinitions[$paymentMethodMachineName])) {
			$def = self::$completePaymentMethodDefinitions[$paymentMethodMachineName];
			return new SaferpayCw_PaymentMethod(new SaferpayCw_DefaultPaymentMethodDefinition($def['machineName'], $def['backendName'], $def['frontendName']));
		}
		else {
			throw new Exception("No payment method found with name '" . $paymentMethodMachineName . "'.");
		}
	}

	/**
	 * @return SaferpayCw_SettingApi
	 */
	public function getSettingsApi() {
		return $this->settingsApi;
	}

	/**
	 * (non-PHPdoc)
	 * @see Customweb_Payment_Authorization_IPaymentMethod::getPaymentMethodName()
	 */
	public function getPaymentMethodName() {
		return strtolower($this->paymentMethodDefinitions->getMachineName());
	}

	public function getPaymentMethodDisplayName() {
		$title = $this->getSettingsApi()->getValue('title');
		$langId = SaferpayCw_Language::getCurrentLanguageId();
		if (!empty($title) && isset($title[$langId]) && !empty($title[$langId])) {
			return $title[$langId];
		}
		else {
			return $this->paymentMethodDefinitions->getFrontendName();
		}
	}

	public function getPaymentMethodConfigurationValue($key, $languageCode = null) {

		if ($languageCode === null) {
			return $this->getSettingsApi()->getValue($key);
		}
		else {
			$languageId = null;
			$languageCode = (string)$languageCode;
			foreach (SaferpayCw_Util::getLanguages() as $language) {
				if ($language['code'] == $languageCode) {
					$languageId = $language['language_id'];
					break;
				}
			}

			if ($languageId === null) {
				throw new Exception("Could not find language with language code '" . $languageCode . "'.");
			}

			return $this->getSettingsApi()->getValue($key, null, $languageId);
		}
	}

	public function existsPaymentMethodConfigurationValue($key, $languageCode = null) {
		return $this->getSettingsApi()->isSettingPresent($key);
	}

	public function getBackendPaymentMethodName() {
		return $this->paymentMethodDefinitions->getBackendName();
	}

	/**
	 * @param Customweb_Payment_Authorization_IOrderContext $context
	 * @return SaferpayCw_Adapter_IAdapter
	 */
	public function getPaymentAdapterByOrderContext(Customweb_Payment_Authorization_IOrderContext $context) {
		$paymentAdapter = SaferpayCw_Util::getAuthorizationAdapterFactory()->getAuthorizationAdapterByContext($context);
		return SaferpayCw_Util::getShopAdapterByPaymentAdapter($paymentAdapter);

	}

	/**
	 * @param SaferpayCw_Entity_Transaction $transaction
	 * @return SaferpayCw_Adapter_IAdapter
	 */
	public function getPaymentAdapterByTransaction(SaferpayCw_Entity_Transaction $transaction) {
		$paymentAdapter = SaferpayCw_Util::getAuthorizationAdapterFactory()->getAuthorizationAdapterByName($transaction->getAuthorizationType());
		return SaferpayCw_Util::getShopAdapterByPaymentAdapter($paymentAdapter);
	}


	/**
	 * @return SaferpayCw_Entity_Transaction
	 */
	public function newTransaction(SaferpayCw_OrderContext $orderContext, $aliasTransactionId = null, $failedTransactionObject = null) {
		$transaction = new SaferpayCw_Entity_Transaction();

		$orderInfo = $orderContext->getOrderInfo();
		$transaction->setOrderId($orderInfo['order_id'])->setCustomerId($orderInfo['customer_id']);
		$transaction->setStoreId(SaferpayCw_Store::getStoreId());
		SaferpayCw_Util::getEntityManager()->persist($transaction);

		$transactionContext = new SaferpayCw_TransactionContext($transaction, $orderContext, $aliasTransactionId);
		$transactionObject = $this->getPaymentAdapterByOrderContext($orderContext)->getInterfaceAdapter()->createTransaction($transactionContext, $failedTransactionObject);
		
		unset($_SESSION['saferpaycw_checkout_id'][$orderContext->getPaymentMethod()->getPaymentMethodName()]);
		
		$transaction->setTransactionObject($transactionObject);
		SaferpayCw_Util::getEntityManager()->persist($transaction);

		return $transaction;
	}

	public function newOrderContext($orderInfo, $registry) {
		$order_totals = SaferpayCw_Util::getOrderTotals($registry);
		return new SaferpayCw_OrderContext(new SaferpayCw_PaymentMethodWrapper($this), $orderInfo, $order_totals);
	}
}