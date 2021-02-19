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

require_once 'Customweb/Saferpay/Container.php';
require_once 'Customweb/Payment/ExternalCheckout/AbstractCheckout.php';



/**
 * MasterPass checkout object.
 *
 * @author Thomas Hunziker
 *
 */
abstract class Customweb_Saferpay_ExternalCheckout_AbstractCheckout extends Customweb_Payment_ExternalCheckout_AbstractCheckout{

	
	public function __construct(Customweb_DependencyInjection_IContainer $container) {
		parent::__construct(new Customweb_Saferpay_Container($container));
	}
	
	/**
	 * Returns the widget for this checkout.
	 * 
	 * @param Customweb_Payment_ExternalCheckout_IContext $context
	 */
	abstract public function getWidget(Customweb_Payment_ExternalCheckout_IContext $context);
	
	/**
	 * @return Customweb_Saferpay_Container
	 */
	protected function getContainer() {
		return parent::getContainer();
	}
}