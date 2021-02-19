<?php

require_once 'Customweb/Core/Util/System.php';
require_once 'Customweb/Util/Currency.php';
require_once 'Customweb/Core/Util/Html.php';

require_once 'SaferpayCw/Language.php';
require_once 'SaferpayCw/Template.php';


class SaferpayCw_Twig_Extension extends Twig_Extension
{
    public function getFunctions()
    {
        return array(
        	new Twig_SimpleFunction('SaferpayCw_Translate', function($translate) {
        		return SaferpayCw_Language::_($translate);
        	}, array('needs_environment' => false)),
        	new Twig_SimpleFunction('SaferpayCw_IncludeCss', function($file) {
        		return SaferpayCw_Template::includeCSSFile($file);
        	}, array('needs_environment' => false)),
        	new Twig_SimpleFunction('SaferpayCw_IncludeJS', function($file) {
        		return SaferpayCw_Template::includeJavaScriptFile($file);
        	}, array('needs_environment' => false)),
        	new Twig_SimpleFunction('SaferpayCw_DefaultDateTimeFormat', function() {
        		return Customweb_Core_Util_System::getDefaultDateTimeFormat();
        	}, array('needs_environment' => false)),
        	new Twig_SimpleFunction('SaferpayCw_HtmlToText', function($text) {
        		return Customweb_Core_Util_Html::toText($text);
        	}, array('needs_environment' => false)),
        	new Twig_SimpleFunction('SaferpayCw_FormatAmount', function($amount, $currency) {
        		return Customweb_Util_Currency::formatAmount($amount, $currency);
        	}, array('needs_environment' => false)),
        	new Twig_SimpleFunction('SaferpayCw_DecimalPlaces', function($currency) {
        		return Customweb_Util_Currency::getDecimalPlaces($currency);
        	}, array('needs_environment' => false)),
        	//
        );
    }

    public function getName()
    {
        return 'saferpaycw_translate';
    }
}