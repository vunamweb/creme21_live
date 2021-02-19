<?php
// Headings
$_['heading_title']        	   = 'Einstellungen';
$_['text_openbay']             = 'Openbay pro';
$_['text_fba']                 = 'Erfüllung durch Amazon';

// Text
$_['text_success']     		   = 'Ihre Einstellungen wurden gespeichert';
$_['text_status']         	   = 'Status';
$_['text_account_ok']  		   = 'Anschluss an die Erfüllung durch Amazon OK';
$_['text_api_ok']       	   = 'API Connection OK';
$_['text_api_status']          = 'API Connection';
$_['text_edit']           	   = 'Erfüllung durch Amazon-Einstellungen bearbeiten';
$_['text_standard']            = 'Standard';
$_['text_expedited']           = 'Beschleunigte';
$_['text_priority']            = 'Priorität';
$_['text_fillorkill']          = 'Füllen oder töten';
$_['text_fillall']             = 'Füllen alle';
$_['text_fillallavailable']    = 'Füllen Sie alle verfügbaren';
$_['text_prefix_warning']      = 'Ändern Sie diese Einstellung nicht, nachdem Bestellungen an Amazon gesendet wurden, setzen Sie diese nur, wenn Sie die erste Installation.';
$_['text_disabled_cancel']     = 'Behinderte-nicht automatisch Erfüllungen stornieren';
$_['text_validate_success']    = 'Ihre API-Details funktionieren korrekt! Sie müssen speichern drücken, um sicherzustellen, dass die Einstellungen gespeichert werden.';
$_['text_register_banner']     = 'Klicken Sie hier, wenn Sie sich für ein Konto registrieren müssen';

// Entry
$_['entry_api_key']            = 'API Token';
$_['entry_encryption_key']     = 'Verschlüsselungsschlüssel 1';
$_['entry_encryption_iv']      = 'Verschlüsselungsschlüssel 2';
$_['entry_account_id']         = 'Account ID';
$_['entry_send_orders']        = 'Bestellungen automatisch versenden';
$_['entry_fulfill_policy']     = 'Erfüllungs Politik';
$_['entry_shipping_speed']     = 'Standard-Versand Geschwindigkeit';
$_['entry_debug_log']          = 'Aktivieren Sie Debug-Logging';
$_['entry_new_order_status']   = 'Neuer Erfüllungs Auslöser';
$_['entry_order_id_prefix']    = 'Bestell Ausweis';
$_['entry_only_fill_complete'] = 'Alle Artikel müssen FBA sein';

// Help
$_['help_api_key']             = 'Dies ist Ihr API-Token, erhalten Sie dies von Ihrem openbay pro-Account-Bereich';
$_['help_encryption_key']      = 'Dies ist Ihr Verschlüsselungsschlüssel #1, erhalten Sie dies von Ihrem openbay pro-Account-Bereich';
$_['help_encryption_iv']       = 'Dies ist Ihr Verschlüsselungsschlüssel #2, erhalten Sie dies von Ihrem openbay pro-Account-Bereich';
$_['help_account_id']          = 'Dies ist die Kontonummer, die mit dem registrierten Amazon-Konto für openbay pro übereinstimmt, erhalten Sie dies von Ihrem openbay pro-Account-Bereich';
$_['help_send_orders']  	   = 'Bestellungen, die die passende Erfüllung durch Amazon-Produkte enthalten, werden automatisch an Amazon gesendet';
$_['help_fulfill_policy']  	   = 'Die Standard-Fulfillment-Richtlinien (fillall-alle erfüllbaren Gegenstände in der Erfüllungs Reihenfolge werden ausgeliefert. Der Erfüllungs Auftrag bleibt in einem Bearbeitungs Zustand, bis alle Artikel entweder von Amazon versandt oder vom Verkäufer storniert werden. Fillallavailable-alle erfüllbaren Gegenstände in der Erfüllungs Reihenfolge werden ausgeliefert. Alle unerfüllbaren Gegenstände in der Bestellung werden von Amazon storniert. fillorkill-wenn ein Gegenstand in einem Erfüllungs Auftrag bestimmt ist, unerfüllbar zu sein, bevor sich eine Sendung in der Bestellung in den anhängigen Status bewegt (der Prozess der Kommissionierung aus dem Inventar hat begonnen), dann ist die die gesamte Bestellung gilt als unerfüllbar. Wenn jedoch ein Gegenstand in einem Erfüllungs Auftrag nach einer Sendung in der Bestellung zum anstehenden Status nicht erfüllbar ist, kündigt Amazon so viel wie möglich der Erfüllungs Folge an.)';
$_['help_shipping_speed']  	   = 'Dies ist die Standard-Kategorie für die Versand Geschwindigkeit, die für neue Bestellungen gilt, unterschiedliche Serviceniveaus können unterschiedliche Kosten verursachen.';
$_['help_debug_log']  		   = 'Debug-Protokolle werden Informationen zu einer Log-Datei über Aktionen aufzeichnen, die das Modul macht. Dies sollte in die Lage versetzt werden, bei der Suche nach der Ursache von Problemen zu helfen.';
$_['help_new_order_status']    = 'Dies ist der Bestellstatus, der die Bestellung für die Erfüllung auslösen wird. Stellen Sie sicher, dass dies erst nach Erhalt der Zahlung einen Status verwendet.';
$_['help_order_id_prefix']     = 'Mit einer Bestell Vorwahl werden Sie Bestellungen identifizieren, die aus Ihrem Geschäft stammen, und nicht aus anderen Integrationen. Das ist sehr hilfreich, wenn Händler auf vielen Marktplätzen verkaufen und FBA nutzen';
$_['help_only_fill_complete']  = 'Dies erlaubt es nur, Bestellungen zur Erfüllung zu versenden, wenn alle Artikel in der Bestellung auf eine Erfüllung durch Amazon-Artikel abgestimmt sind. Wenn ein Artikel nicht dann ist, bleibt die ganze Bestellung unbesetzt.';

// Error
$_['error_api_connect']        = 'Keine Verbindung zur API';
$_['error_account_info']       = 'Keine API-Verbindung zur Erfüllung durch Amazon verifizieren ';
$_['error_api_key']    		   = 'Das API-Token ist ungültig';
$_['error_api_account_id']     = 'Die Kontonummer ist ungültig';
$_['error_encryption_key']     = 'Der Verschlüsselungsschlüssel #1 ist ungültig';
$_['error_encryption_iv']      = 'Der Verschlüsselungsschlüssel #2 ist ungültig';
$_['error_validation']    	   = 'Es gab einen Fehler, der Ihre Daten bestätigt';

// Tabs
$_['tab_api_info']             = 'API Details';

// Buttons
$_['button_verify']            = 'Details verifizieren';
