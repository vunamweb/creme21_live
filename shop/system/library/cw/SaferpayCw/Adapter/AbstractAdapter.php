<?php

/**
 *  * You are allowed to use this API in your web application.
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

require_once 'Customweb/Util/Html.php';

require_once 'SaferpayCw/Form/FrontendRenderer.php';
require_once 'SaferpayCw/Language.php';
require_once 'SaferpayCw/Util.php';
require_once 'SaferpayCw/Entity/Transaction.php';
require_once 'SaferpayCw/Adapter/IAdapter.php';

abstract class SaferpayCw_Adapter_AbstractAdapter implements SaferpayCw_Adapter_IAdapter {
	private $interfaceAdapter;
	protected $registry;
	
	/**
	 *
	 * @var Customweb_Payment_Authorization_IOrderContext
	 */
	private $orderContext;
	
	/**
	 *
	 * @var SaferpayCw_PaymentMethod
	 */
	protected $paymentMethod;
	
	/**
	 *
	 * @var SaferpayCw_Entity_Transaction
	 */
	protected $failedTransaction = null;
	
	/**
	 *
	 * @var SaferpayCw_Entity_Transaction
	 */
	protected $aliasTransaction = null;
	protected $aliasTransactionId = null;

	public function setInterfaceAdapter(Customweb_Payment_Authorization_IAdapter $interface){
		$this->interfaceAdapter = $interface;
	}

	public function getInterfaceAdapter(){
		return $this->interfaceAdapter;
	}

	public function getCheckoutPageHtml(SaferpayCw_PaymentMethod $paymentMethod, Customweb_Payment_Authorization_IOrderContext $orderContext, $registry, $failedTransaction){
		$this->registry = $registry;
		$this->paymentMethod = $paymentMethod;
		$this->failedTransaction = $failedTransaction;
		$this->orderContext = $orderContext;
		
		$this->aliasTransaction = null;
		$this->aliasTransactionId = null;
		if (isset($_REQUEST['saferpaycw_alias']) && $_REQUEST['saferpaycw_alias'] != 'new') {
			$this->aliasTransaction = SaferpayCw_Entity_Transaction::loadById((int) $_REQUEST['saferpaycw_alias']);
			if ($this->aliasTransaction !== null) {
				$this->aliasTransactionId = $this->aliasTransaction->getTransactionId();
			}
		}
		else if(!isset($_REQUEST['saferpaycw_alias'])) {
			$aliasTransactions = SaferpayCw_Util::getAliasHandler()->getAliasTransactions($orderContext);
			if (count($aliasTransactions) > 0) {
				$this->aliasTransaction = array_shift($aliasTransactions);
				$this->aliasTransactionId = $this->aliasTransaction->getTransactionId();
			}
		}
		
		$output = '<div id="saferpaycw-checkout-page">';
		
		$output .= $this->getAliasDropDown();
		$output .= $this->getPaymentFormPane();
		
		$output .= '</div>';
		
		return $output;
	}

	protected function getAliasDropDown(){
		$orderContext = $this->getOrderContext();
		$handler = SaferpayCw_Util::getAliasHandler();
		
		if (!SaferpayCw_Util::isAliasManagerActive($orderContext)) {
			return '';
		}
		$aliasTransactions = $handler->getAliasTransactions($orderContext);
		if (count($aliasTransactions) <= 0) {
			return '';
		}
		
		$output = '<form class="form-horizontal saferpaycw-alias-manager-form"><div class="saferpaycw-alias-pane form-group"><label for="saferpaycw_alias" class="control-label col-sm-4">' .
				 SaferpayCw_Language::_("Use Stored Card") . '</label>';
		
		$output .= '<div class="col-sm-8 "><select name="saferpaycw_alias" id="saferpaycw_alias" class="form-control saferpaycw-alias-dropdown">';
		$output .= '<option value="new">' . SaferpayCw_Language::_("Use a new Card") . '</option>';
		foreach ($aliasTransactions as $transaction) {
			$output .= '<option ';
			if ($this->aliasTransactionId == $transaction->getTransactionId()) {
				$output .= 'selected="selected" ';
			}
			$output .= 'value="' . $transaction->getTransactionId() . '">' . $transaction->getAliasForDisplay() . '</option>';
		}
		
		$output .= '</select></div></div></form>';
		
		return $output;
	}

	protected function getOrderContext(){
		return $this->orderContext;
	}

	/**
	 *
	 * @return SaferpayCw_Entity_Transaction
	 */
	protected function createNewTransaction(){
		$orderContext = $this->getOrderContext();
		return $this->paymentMethod->newTransaction($this->getOrderContext(), $this->aliasTransactionId, $this->getFailedTransactionObject());
	}

	protected function getAliasTransactionObject(){
		$aliasTransactionObject = null;
		$orderContext = $this->getOrderContext();
		if (SaferpayCw_Util::isAliasManagerActive($orderContext)) {
			$aliasTransactionObject = 'new';
			if ($this->aliasTransaction !== null && $this->aliasTransaction->getCustomerId() == $orderContext->getCustomerId()) {
				$aliasTransactionObject = $this->aliasTransaction->getTransactionObject();
			}
		}
		
		return $aliasTransactionObject;
	}

	protected function getFailedTransactionObject(){
		$failedTransactionObject = null;
		$orderContext = $this->getOrderContext();
		if ($this->failedTransaction !== null && $this->failedTransaction->getCustomerId() == $orderContext->getCustomerId()) {
			$failedTransactionObject = $this->failedTransaction->getTransactionObject();
		}
		return $failedTransactionObject;
	}

	protected function getPaymentFormPane(){
		$this->preparePaymentFormPane();
		
		$output = '<div id="saferpaycw-checkout-form-pane">';
		
		$actionUrl = $this->getFormActionUrl();
		
		if ($actionUrl !== null && !empty($actionUrl)) {
			$output .= '<form action="' . $actionUrl . '" method="POST" class="saferpaycw-confirmation-form form-horizontal">';
		}
		
		$visibleFormFields = $this->getVisibleFormFields();
		if ($visibleFormFields !== null && count($visibleFormFields) > 0) {
			$renderer = new SaferpayCw_Form_FrontendRenderer();
			$renderer->setCssClassPrefix('saferpaycw-');
			$output .= $renderer->renderElements($visibleFormFields);
		}
		
		$hiddenFormFields = $this->getHiddenFormFields();
		if ($hiddenFormFields !== null && count($hiddenFormFields) > 0) {
			$output .= Customweb_Util_Html::buildHiddenInputFields($hiddenFormFields);
		}
		
		$output .= $this->getAdditionalFormHtml();
		
		$output .= $this->getOrderConfirmationButton();
		
		if ($actionUrl !== null && !empty($actionUrl)) {
			$output .= '</form>';
		}
		
		$output .= '</div>';
		
		return $output;
	}

	protected function getAdditionalFormHtml(){
		return '';
	}

	/**
	 * Method to load some data before the payment pane is rendered.
	 */
	protected function preparePaymentFormPane(){}

	protected function getVisibleFormFields(){
		return array();
	}

	protected function getFormActionUrl(){
		return null;
	}

	protected function getHiddenFormFields(){
		return array();
	}

	protected function getOrderConfirmationButton(){
		$confirmText = $this->paymentMethod->getPaymentMethodConfigurationValue('confirm_button_name', 
				SaferpayCw_Language::getCurrentLanguageCode());
		
		if ($confirmText === null || empty($confirmText)) {
			$confirmText = SaferpayCw_Language::_('button_confirm');
		}
		
		$backButton = '';
		if ($this->failedTransaction !== null) {
			$backUrl = SaferpayCw_Util::getUrl('checkout', '', array(), true, 'checkout');
			$backButton = '<div class="pull-left left">
			       		<a href="' .
					 $backUrl . '" id="back-button"  class="button btn btn-danger">' . SaferpayCw_Language::_('Cancel') . '</a>
			    </div>';
		}
		
		return '<div class="buttons saferpaycw-confirmation-buttons">
			    
				' . $backButton . '
				
				<div class="pull-right right">
			       		<input type="submit" value="' . $confirmText . '" id="button-confirm"  class="button btn btn-primary" />
			    </div>
			</div>';
	}
}