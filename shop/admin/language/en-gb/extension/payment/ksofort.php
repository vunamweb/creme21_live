<?php
// Heading
$_['heading_title']					= 'Online Bank Transfer';

// Text
$_['text_ksofort']					= '<a href="https://www.sofort.com/" target="_blank"><img src="https://cdn.klarna.com/1.0/shared/image/generic/logo/en_gb/basic/logo_black.svg" alt="Online Bank Transfer" title="Online Bank Transfer" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_payment']					= 'Payment';
$_['text_success']					= 'Success: You have modified Online Bank Transfer payment module!';
$_['text_edit']						= 'Edit Online Bank Transfer';

// Entry
$_['entry_total']					= 'Total';
$_['entry_order_status']			= 'Order Status';
$_['entry_order_status_canceled']	= 'Status Cancled Order';
$_['entry_geo_zone']				= 'Geo Zone';
$_['entry_status']					= 'Status';
$_['entry_sort_order']				= 'Sort Order';
$_['entry_configkey']				= 'Configuration-Key';
$_['entry_currency']				= 'Currency:';

// Help
$_['help_total']					= 'The checkout total the order must reach before this payment method becomes active.';
$_['help_configkey']				= 'This will be send to you, after the creation of a \'SOFORT-Gateway-Projekt\'.<br> It consists of<br>CustomerNr:Project-ID:API-Key<br>(12345:123456:edc788a4[..])';
$_['help_status_canceled']			= 'This status will shown if the customer cancels the order.';
$_['help_currency']					= 'This will be used for Sofort - The payment costs will be converted to this currency.';
$_['help_currency_bankaccount']			= 'The choosen currency must match the currency of your Bankaccount at Sofort.com';

// Error
$_['error_permission']				= 'Warning: You do not have permission to modify payment Online Bank Transfer!';
$_['error_configkey']				= 'Incorrect Configuration-Key. (e.g. 12345:123456:edc788a4[..])';
$_['error_sofort_currency']			= 'Sofort.com only supports currencys with following ISO 4217 codes : EUR,GBP,CHF,PLN,HUF,CZK .<br><b>- Please change the default currency or disable this payment method (System -> Settings -> Local -> Currency)</b>';

// Stati
$_['stati_cancelled']               = 'Missing';