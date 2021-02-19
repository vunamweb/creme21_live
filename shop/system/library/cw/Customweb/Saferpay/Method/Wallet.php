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

require_once 'Customweb/Saferpay/Method/Default.php';



/**
 *
 * @author Sebastian Bossert
 * @Method(paymentMethods={'Masterpass', 'ApplePay'})
 */
class Customweb_Saferpay_Method_Wallet extends Customweb_Saferpay_Method_Default {


	public function getPaymentMeanParameter(){
		return array(
			'Wallets' => array($this->getPaymentMean())
		);
	}
}