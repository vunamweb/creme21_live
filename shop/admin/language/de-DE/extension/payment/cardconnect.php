<?php
// Heading
$_['heading_title']                 = 'Cardconnect';

// Tab
$_['tab_settings']                  = 'Einstellungen';
$_['tab_order_status']              = 'Auftragsstatus';

// Text
$_['text_extension']                = 'Erweiterungen';
$_['text_success']                  = 'Einstellunegn erfolgreich gespeichert';
$_['text_edit']                     = 'Edit cardconnect';
$_['text_cardconnect']              = '<a href="http://www.cardconnect.com" target="_blank"><img src="view/image/payment/cardconnect.png" alt="CardConnect" title="CardConnect"></a>';
$_['text_payment']                  = 'Zahlung';
$_['text_authorize']                = 'Autorisieren';
$_['text_live']                     = 'Live';
$_['text_test']                     = 'Test';
$_['text_no_cron_time']             = 'Der Cron ist noch nicht ausgeführt';
$_['text_payment_info']             = 'Zahlungsinformationen';
$_['text_payment_method']           = 'Zahlungsmethode';
$_['text_card']                     = 'Karte';
$_['text_echeck']                   = 'Echeck';
$_['text_reference']                = 'Verweis';
$_['text_update']                   = 'Update';
$_['text_order_total']              = 'Bestellsumme';
$_['text_total_captured']           = 'Total erfasst';
$_['text_capture_payment']          = 'Aufnahme Zahlung';
$_['text_refund_payment']           = 'Erstattungs Zahlung';
$_['text_void']                     = 'Void';
$_['text_transactions']             = 'Transaktionen';
$_['text_column_type']              = 'Typ';
$_['text_column_reference']         = 'Verweis';
$_['text_column_amount']            = 'Menge';
$_['text_column_status']            = 'Status';
$_['text_column_date_modified']     = 'Datum geändert';
$_['text_column_date_added']        = 'Datum hinzu';
$_['text_column_update']            = 'Update';
$_['text_column_void']              = 'Void';
$_['text_confirm_capture']          = 'Sind Sie sicher, dass Sie die Zahlung erfassen wollen?';
$_['text_confirm_refund']           = 'Sind Sie sicher, dass Sie die Zahlung zurückerstatten wollen?';
$_['text_inquire_success']          = 'Befragte war erfolgreich';
$_['text_capture_success']          = 'Capture-Anfrage war erfolgreich';
$_['text_refund_success']           = 'Rückerstattungsantrag war erfolgreich';
$_['text_void_success']             = 'Ungültige Anfrage war erfolgreich';

// Entry
$_['entry_merchant_id']             = 'Merchant ID';
$_['entry_api_username']            = 'API username';
$_['entry_api_password']            = 'API Password';
$_['entry_token']                   = 'Geheime Token';
$_['entry_transaction']             = 'Transaktion';
$_['entry_environment']             = 'Umgebung';
$_['entry_site']                    = 'Website';
$_['entry_store_cards']             = 'Speicherkarten';
$_['entry_echeck']                  = 'Echeck';
$_['entry_total']                   = 'Total';
$_['entry_geo_zone']                = 'Geo Zone';
$_['entry_status']                  = 'Status';
$_['entry_logging']                 = 'Debug Logging';
$_['entry_sort_order']              = 'Sortier Auftrag';
$_['entry_cron_url']                = 'Cron Job URL';
$_['entry_cron_time']               = 'Cron Job Last Run';
$_['entry_order_status_pending']    = 'Ausstehende';
$_['entry_order_status_processing'] = 'Verarbeitung';

// Help
$_['help_merchant_id']              = 'Ihr persönlicher cardconnect-Konto Händler-ID.';
$_['help_api_username']             = 'Ihr Benutzername für den Zugriff auf die cardconnect API.';
$_['help_api_password']             = 'Ihr Passwort für den Zugriff auf die cardconnect API.';
$_['help_token']                    = 'Geben Sie einen zufälligen Token für die Sicherheit ein oder verwenden Sie den generierten.';
$_['help_transaction']              = 'Wählen Sie "Zahlung", um die Zahlung sofort zu erfassen oder "autorisieren", um Sie genehmigen zu müssen.';
$_['help_site']                     = 'Dies bestimmt den ersten Teil der API-URL. Nur ändern, wenn Sie angewiesen sind.';
$_['help_store_cards']              = 'Ob Sie Karten mit Tokenisierung speichern wollen.';
$_['help_echeck']                   = 'Ob Sie die Möglichkeit bieten wollen, mit einem eCheck zu bezahlen.';
$_['help_total']                    = 'Die Kasse muss die Bestellung erreichen, bevor diese Zahlungsmethode aktiv wird. Muss ein Wert ohne Währungszeichen sein.';
$_['help_logging']                  = 'Die Aktivierung von Debug wird sensible Daten in eine Log-Datei schreiben. Sie sollten immer deaktivieren, wenn Sie nicht anders angewiesen sind.';
$_['help_cron_url']                 = 'Stellen Sie einen cron-Job ein, um diese URL anzurufen, damit die Bestellungen automatisch aktualisiert werden. Sie soll wenige Stunden nach der letzten Einnahme eines Geschäftstages ran.';
$_['help_cron_time']                = 'Dies ist das letzte Mal, dass die cron-Job-URL ausgeführt wurde.';
$_['help_order_status_pending']     = 'Der Bestellstatus, wenn die Bestellung vom Kaufmann genehmigt werden muss.';
$_['help_order_status_processing']  = 'Der Bestellstatus, wenn die Bestellung automatisch erfasst wird.';

// Button
$_['button_inquire_all']            = 'Erkundigen Sie sich';
$_['button_capture']                = 'Erfassen';
$_['button_refund']                 = 'Rückerstattung';
$_['button_void_all']               = 'Nichtig alle';
$_['button_inquire']                = 'Fragen';
$_['button_void']                   = 'Void';

// Error
$_['error_permission']              = 'Achtung: Sie haben keine Erlaubnis, die Zahlung cardconnect zu ändern!';
$_['error_merchant_id']             = 'Händler Ausweis erforderlich!';
$_['error_api_username']            = 'API-Benutzername erforderlich!';
$_['error_api_password']            = 'API-Passwort erforderlich!';
$_['error_token']                   = 'Geheime Token erforderlich!';
$_['error_site']                    = 'Website erforderlich!';
$_['error_amount_zero']             = 'Der Betrag muss höher als NULL sein!';
$_['error_no_order']                = 'Keine passenden Bestellinformationen!';
$_['error_invalid_response']        = 'Ungültige Antwort erhalten!';
$_['error_data_missing']            = 'Fehlende Daten!';
$_['error_not_enabled']             = 'Modul nicht aktiviert!';