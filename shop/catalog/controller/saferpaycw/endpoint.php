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

require_once 'Customweb/Payment/Endpoint/Dispatcher.php';
require_once 'Customweb/Core/Http/Response.php';

require_once 'SaferpayCw/Util.php';
require_once 'SaferpayCw/HttpRequest.php';
require_once 'SaferpayCw/AbstractController.php';


require_once 'Customweb/Licensing/SaferpayCw/License.php';
Customweb_Licensing_SaferpayCw_License::run('3nei8jgh8h7ftt41');