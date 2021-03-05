<?php
// HTTP
define('HTTP_SERVER', 'https://creme21.web-previews.de/shop/');

// HTTPS
define('HTTPS_SERVER', 'https://creme21.web-previews.de/shop/');

// DIR
define('DIR_APPLICATION', '/var/www/opencart/dev/pub/shop/catalog/');
define('DIR_SYSTEM', '/var/www/opencart/dev/pub/shop/system/');
define('DIR_IMAGE', '/var/www/opencart/dev/pub/shop/image/');
define('DIR_STORAGE', '/var/www/opencart/dev/pub/shop/storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');
define('IMAGE_DEFAULT', 'catalog/Duschen.jpg');
define('MIN_SHIP_GERMANY', 30);
// define('MIN_SHIP_EURO', 40);

define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'm2_dev');
define('DB_PASSWORD', 'm2_D3v#');
define('DB_DATABASE', 'm2_dev');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');