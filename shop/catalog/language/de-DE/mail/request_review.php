<?php
// Heading
$_['heading_title']             = 'Anfrage Bewertungen';

// Button
$_['button_send']               = 'E-Mails verschicken';
$_['button_delete_from_list']   = 'Von der Liste entfernen';
$_['button_settings']           = 'Einstellungen';
$_['button_save_settings']      = 'Allgemeine Einstellungen speichern';
$_['button_save_email_text']    = 'E-Mail speichern';
$_['button_send_test_emails']   = 'Test-E-Mails verschicken';

// Column
$_['column_name']               = 'Kundennamen';
$_['column_email']              = 'E-mail';
$_['column_order_id']           = 'Order ID';
$_['column_order_total']        = 'Bestellsumme'; // Added v1.1
$_['column_order_status_date']  = 'Bestell Status aktualisiert';
$_['column_language']           = 'Sprache';
$_['column_store_name']         = 'Filial Namen';

// Tab
$_['tab_general']               = 'Allgemeine';
$_['tab_email_text']            = 'E-Mail Text';
$_['tab_test_center']           = 'Test Center';
$_['tab_log']					= 'Protokoll';

// Text
$_['text_success_mail']         = 'Erfolg: %s e-Mail (s) gesendet, mit %s Produkt Links.';
$_['text_success_remove']       = 'Erfolg: %s Kunden (n) aus der Liste gestrichen.';
$_['text_success_settings']     = 'Erfolg: Einstellungen für <b>Anfrage prüfen</b> Updated.';
$_['text_success_email_text']   = 'Erfolg: e-Mail-Text wurde aktualisiert.';
$_['text_success_mail_test']    = 'Erfolg: %s Test-E-Mails gesendet (%s Sprachen). %s';
$_['text_failed_validation']    = '%s der mitgelieferten E-Mails scheiterte die Validierung!';

$_['text_success_clear_log']  	= 'Erfolg: Sie haben Ihr Log erfolgreich gelöscht!';

$_['text_install']              = 'Sie müssen Ihre bevorzugten Einstellungen eingeben und auf Speichern klicken. Diese Meldung wird nur einmal angezeigt. Anschließend können Sie die Einstellungen umschalten, indem Sie auf den Button in der oberen rechten Ecke klicken.';

$_['text_order_status']         = 'Bestell Status erforderlich:<br /><span class="help">Zeigt nur Aufträge mit diesem Status</span>'; 
$_['text_display']              = 'Tage vor Anfrage:<br /><span class="help">Anzahl der Tage vor dem mit dem obigen Bestellstatus gekennzeichneten Auftrag erscheint.</span>';
$_['text_display_before_review']              = 'Tage vor der Überprüfung:<br /><span class="help">Anzahl der Tage, bevor die Produkte im Kundenprofil zur Begutachtung erscheint.</span>';
$_['text_orders_per_page']      = 'Bestellungen pro Seite:<br /><span class="help">Anzahl der Bestellungen pro Seite. Das bestimmt auch, wie viele Mails auf einmal verschickt werden.</span>';
$_['text_fallback_language']    = 'Fallback-Sprache:<br /><span class="help">Verwendet diese Sprache als Fallback, um zu verhindern, dass leere Mails gesendet werden.</span>';
$_['text_append_language_code'] = 'Sprach Code an URLs anhängen:<br /><span class="help">Wird den Sprachcode an Produkt-URLs in der Mail Anhängen. Dies wählt automatisch die richtige Sprache für Ihren Kunden aus, wenn Sie auf den Link klicken.';
$_['text_min_amount']           = 'Mindestbetrag bestellen<br /><span class="help">Zeigt nur Aufträge mit einer Gesamtsumme als der eingegebene Wert an.<br />Beispiel: 50 zeigt nur Aufträge mit einem Gesamtauftragswert von $50, £50, €50 oder mehr an</span>'; // Added v1.1 

$_['text_subject']              = 'Betreff:';
$_['text_message']              = 'Nachricht:';
$_['text_footer']               = 'Fußzeile:';
$_['text_plural_placeholders']  = 'Plural-Platzhalter:<span class="help">Formulierungen, die für Mails mit mehr als einem Produkt verwendet werden.</span>';
$_['text_singular_placeholders']= 'Singuläre Platzhalter:<span class="help">Formulierungen, die für Mails mit einem einzigen Produkt verwendet werden.</span>';
$_['text_available_placeholders'] = 'Weitere verfügbare Platzhalter';

$_['text_test_emails']          = 'Test E-Mails:<br /><span class="help">Geben Sie alle e-Mail-Adressen ein, auf die Sie die Testmail erhalten möchten (Komma getrennt)</span>';
$_['text_test_languages']       = 'Sprachen:<br /><span class="help">Wählen Sie die Sprachen, in denen Sie die Test-e-Mail erhalten.</span>';
$_['text_number_of_products']   = 'Anzahl der Produkte:<br /><span class="help">Geben Sie die Anzahl der Produkte ein, die Sie in der Testmail sehen möchten. Wenn Sie leer bleiben, werden 4 Produkte enthalten sein.</span>';
$_['text_test_store']           = 'Speichern:';

$_['text_legend'] = '<span class="help">{order_id} = Order ID<br/>{firstname} {lastname} = Vorname Nachname<br />{store_name} = Filial Name<br />{store_url} = Store URL<br />{each} {product} {link}</span>';

$_['text_test_warning'] = '<br/>Warnung: Die Rezensions Links in der Test-e-Mail funktionieren nicht richtig, da die Kunden das Produkt gekauft haben müssen, damit es auf ihren Konten angezeigt wird.<br/>';

$_['text_cron_enable']        = 'Senden Sie e-Mails automatisch täglich?';
$_['text_cron_key'] = 'Cronjob Secret Key';
$_['text_cron_weekly'] = 'Wöchentliche';
$_['text_cron_daily'] = 'Täglich';
$_['text_cron_monthly'] = 'Monatliche';
$_['entry_cron_update'] = 'Aktualisierungszeit';

// Error
$_['error_no_selected']         = 'Anfrage Bewertungen: kein Kunde (s) ausgewählt.';
$_['error_no_test_mails']       = 'Test Center: keine E-Mails zur Verfügung gestellt Mindestens einen eingeben.';
$_['error_no_language_selected']= 'Test Center: keine Sprache (n) ausgewählt.';
$_['error_permission']          = 'Warnung: Sie haben keine Berechtigung, zu ändern oder zu verwenden <b>Anfrage Bewertungen</b>!';
?>