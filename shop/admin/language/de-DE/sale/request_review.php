<?php

// Heading

$_['heading_title']             = 'Power Reviews-Anfrage Dashboard';



$_['breadcrumb'] = 'Power Reviews-Anfrage Bewertungen';



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

$_['text_success_settings']     = 'Erfolg: Einstellungen für <b>Power Reviews</b> Updated.';

$_['text_success_email_text']   = 'Erfolg: e-Mail-Text wurde aktualisiert.';

$_['text_success_mail_test']    = 'Erfolg: %s Test-E-Mails gesendet (%s Sprachen). %s';

$_['text_failed_validation']    = '%s der mitgelieferten E-Mails scheiterte die Validierung!';



$_['text_success_clear_log']  	= 'Erfolg: Sie haben Ihr Log erfolgreich gelöscht!';



$_['text_install']              = 'Sie müssen Ihre bevorzugten Einstellungen eingeben und auf Speichern klicken. Diese Meldung wird nur einmal angezeigt. Anschließend können Sie die Einstellungen umschalten, indem Sie auf den Button in der oberen rechten Ecke klicken.';



$_['text_order_status']         = 'Bestell Status erforderlich:<br /><span class="help">Zeigt nur Aufträge mit diesem Status</span>'; 

$_['text_display']              = 'Tage vor Anfrage:<br /><span class="help">Anzahl der Tage vor Bestellungen mit dem oben genannten Bestellstatus können Überprüfung Anfragen entweder manuell oder automatisch gesendet werden.</span>';

$_['text_display_before_review']              = 'Tage vor der Überprüfung:<br /><span class="help">Anzahl der Tage vor Bestellungen mit dem oben genannten Bestellstatus erscheinen im Kundenprofil zur Überprüfung.</span>';

$_['text_orders_per_page']      = 'Bestellungen pro Seite:<br /><span class="help">Anzahl der Bestellungen pro Seite. Das bestimmt auch, wie viele Mails auf einmal verschickt werden.</span>';

$_['text_fallback_language']    = 'Fallback-Sprache:<br /><span class="help">Verwendet diese Sprache als Fallback, um zu verhindern, dass leere Mails gesendet werden.</span>';

$_['text_append_language_code'] = 'Sprach Code an URLs anhängen:<br /><span class="help">Wird den Sprachcode an Produkt-URLs in der Mail Anhängen. Dies wählt automatisch die richtige Sprache für Ihren Kunden aus, wenn Sie auf den Link klicken.';

$_['text_min_amount']           = 'Mindestbetrag bestellen<br /><span class="help">Zeigt nur Aufträge mit einer Gesamtsumme als der eingegebene Wert an.<br />Beispiel: 50 zeigt nur Aufträge mit einem Gesamtauftragswert von $50, £50, €50 oder mehr an</span>'; // Added v1.1 



$_['text_subject']              = 'Betreff:';

$_['text_message']              = 'Nachricht:';

$_['text_footer']               = 'Fußzeile:';

$_['text_plural_placeholders']  = 'Plural-Platzhalter:<span class="help">Formulierungen, die für Mails mit mehr als einem Produkt verwendet werden.</span>';

$_['text_singular_placeholders']= 'Singuläre Platzhalter:<span class="help">Formulierungen, die für Mails mit einem einzigen Produkt verwendet werden.</span>';



$_['text_test_emails']          = 'Test E-Mails:<br /><span class="help">Geben Sie alle e-Mail-Adressen ein, auf die Sie die Testmail erhalten möchten (Komma getrennt)</span>';

$_['text_test_languages']       = 'Sprachen:<br /><span class="help">Wählen Sie die Sprachen, um die Test-e-Mail zu erhalten.</span>';

$_['text_number_of_products']   = 'Anzahl der Produkte:<br /><span class="help">Geben Sie die Anzahl der Produkte ein, die Sie in der Testmail sehen möchten. Bei Links leer werden 4 Produkte ausgewählt.</span>';

$_['text_test_store']           = 'Speichern:';



$_['text_legend'] = '<span class="help">{order_id} = Order ID<br/>{firstname} {lastname} = Vorname Nachname<br />{store_name} = Filial Name<br />{store_url} = Store URL<br />{store_review} = Review Store URL<br />{each} {product} {link}</span>';



$_['text_test_warning'] = '<br/>Warnung: Die Rezensions Links in der Test-e-Mail funktionieren nicht richtig, da die Kunden das Produkt gekauft haben müssen, damit es auf ihren Konten angezeigt wird.<br/>';



$_['text_available_placeholders'] = 'Verfügbare Platzhalter';



$_['text_cron_enable']        = 'Senden Sie e-Mails automatisch täglich?';

$_['text_cron_key'] = 'Cronjob Secret Key';

$_['text_cron_weekly'] = 'Wöchentliche';

$_['text_cron_daily'] = 'Täglich';

$_['text_cron_monthly'] = 'Monatliche';

$_['entry_cron_update'] = 'Aktualisierungszeit';

$_['text_cron_command'] = '<strong>Fügen Sie diesen String in Ihren Server crontab ein:</strong>';



// Error

$_['error_no_selected']         = 'Power Reviews: kein Kunde (s) ausgewählt.';

$_['error_no_test_mails']       = 'Test Center: keine E-Mails zur Verfügung gestellt Mindestens einen eingeben.';

$_['error_no_language_selected']= 'Test Center: keine Sprache (n) ausgewählt.';

$_['error_permission']          = 'Warnung: Sie haben keine Berechtigung, zu ändern oder zu verwenden <b>Power Reviews</b>!';

$_['entry_review_services'] = 'Revisions Dienste hinzufügen';
$_['entry_review_own_store'] = 'Eigenen Laden';
$_['entry_review_image'] = 'Service Image';
$_['entry_review_icon'] = 'Service Icon';
$_['entry_review_link'] = 'Service Link';
$_['entry_review_name'] = 'Service Name';
$_['entry_review_remove_service'] = 'Service entfernen';
$_['entry_review_add_service'] = 'Add Service';
$_['entry_review_service_order'] = 'Sortier Auftrag';
$_['tab_review_services'] = 'Überprüfungs Dienste';
$_['button_save_service_settings'] = 'Service-Einstellungen speichern';
$_['text_success_services'] = 'Sie haben die Rezensions Dienste geändert!';
$_['help_service_icon'] = 'Wenn ein Icon ausgewählt ist, wird es als Button anstelle des Service-Bildes angezeigt.';
$_['entry_store_icon'] = 'Store Icon';

// Help
$_['help_service'] = "<strong>Wo finden Sie den richtigen Link für Rezensionen?</strong><br/><br/>
<strong>Facebook:</strong> Ihre Facebook-Seite URL mit einem <strong><i>/Reviews</i></strong> am Ende hinzugefügt, z.b. https://www.Facebook.com/<strong><i>Yourfacebookseite</i></strong>Bewertungen <br/><br/>
<strong>Google:</strong> Zu Google Maps gehen. Suchen Sie nach Ihrer Organisation. Klicken Sie auf den Artikel/PIN für Ihre Organisation unter den Ergebnissen. Als nächstes klicken Sie auf <strong><i>x Reviews</i></strong> (z.b. 36 Bewertungen) in der Blue Band, die Ihren Organisationsnamen zeigt. Schnappen Sie sich die URL aus der Adressleiste des Browsers. <br/><br/>
<strong>Tripadvisor:</strong> Besuchen Sie die TripAdvisor-Seite Ihres Hauses. Als nächstes klicken Sie auf <strong><i>x Reviews</i></strong> (z.b. 36 Bewertungen) unter dem Namen Ihres Hauses im Titel. Schnappen Sie sich die URL aus der Adressleiste des Browsers.<br/><br/>
<strong>Trustpilot:</strong> Die URL der Trust Pilot-Seite Ihrer Organisation kann direkt genutzt werden. <br/><br/>
<strong>Yelp:</strong> Die URL der yelp-Seite Ihrer Organisation kann direkt verwendet werden.";

?>