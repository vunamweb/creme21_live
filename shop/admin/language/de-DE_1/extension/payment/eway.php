<?php
// Heading
$_['heading_title']				= 'eWAY Payment (nur für austral. Kunden)';

// Text
$_['text_extension']			= 'Erweiterungen';
$_['text_success']				= 'Einstellungen erfolgreich bearbeitet';
$_['text_edit']					= 'Bearbeiten';
$_['text_eway']					= '<a target="_blank" href="http://www.eway.com.au/"><img src="view/image/payment/eway.png" alt="eWAY" title="eWAY" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_authorisation']		= 'Genehmigung';
$_['text_sale']					= 'Verkauf';
$_['text_transparent']			= 'Transparente Umleitung (Zahlungsformular vor Ort)';
$_['text_iframe']				= 'Iframe (Zahlungsformular im Fenster)';

// Entry
$_['entry_paymode']				= 'Bezahl Modus';
$_['entry_test']				= 'Testmodus';
$_['entry_order_status']		= 'Bestellstatus';
$_['entry_order_status_refund'] = 'Erstatteten Bestellstatus';
$_['entry_order_status_auth']	= 'Autorisierter Bestellstatus';
$_['entry_order_status_fraud']	= 'Verdacht auf Betrugs Bestellstatus';
$_['entry_status']				= 'Status';
$_['entry_username']			= '--API-Taste';
$_['entry_password']			= '-Passwort';
$_['entry_payment_type']		= 'Zahlungsart';
$_['entry_geo_zone']			= 'Geo Zone';
$_['entry_sort_order']			= 'Sortier Auftrag';
$_['entry_transaction_method']	= 'Transaktions Methode';

// Error
$_['error_permission']			= 'Achtung: Sie haben keine Berechtigung, das Zahlungsmodul der Auszahlung zu ändern';
$_['error_username']			= 'der--API-Schlüssel ist erforderlich!';
$_['error_password']			= 'das Passwort ist erforderlich!';
$_['error_payment_type']		= 'Mindestens ein Zahlentyp ist erforderlich!';

// Help hints
$_['help_testmode']				= 'Setzen Sie auf Ja, um den-Sandkasten zu benutzen.';
$_['help_username']				= 'Ihr Wege-API-Schlüssel von Ihrem myeway-Konto.';
$_['help_password']				= 'Ihr Wege-API-Passwort von Ihrem myeway-Konto.';
$_['help_transaction_method']	= 'Genehmigung gibt es nur für australische Banken';

// Order page - payment tab
$_['text_payment_info']			= 'Zahlungsinformationen';
$_['text_order_total']			= 'Zulässigen Gesamt';
$_['text_transactions']			= 'Transaktionen';
$_['text_column_transactionid'] = 'Abwicklung Transaction ID';
$_['text_column_amount']		= 'Menge';
$_['text_column_type']			= 'Typ';
$_['text_column_created']		= 'Erstellt';
$_['text_total_captured']		= 'Total erfasst';
$_['text_capture_status']		= 'Erfassten';
$_['text_void_status']			= 'Zahlung aufgehoben';
$_['text_refund_status']		= 'Zahlung erstattet';
$_['text_total_refunded']		= 'Total erstattet';
$_['text_refund_success']		= 'Rückerstattung gelungen!';
$_['text_capture_success']		= 'Capture gelungen!';
$_['text_refund_failed']		= 'Erstattung fehlgeschlagen: ';
$_['text_capture_failed']		= 'Capture scheiterte: ';
$_['text_unknown_failure']		= 'Ungültige Bestellung oder Menge';

$_['text_confirm_capture']		= 'Sind Sie sicher, dass Sie die Zahlung erfassen wollen?';
$_['text_confirm_release']		= 'Sind Sie sicher, dass Sie die Zahlung freigeben wollen?';
$_['text_confirm_refund']		= 'Sind Sie sicher, dass Sie die Zahlung zurückerstatten wollen?';

$_['text_empty_refund']			= 'Bitte geben Sie einen Betrag zur Rückerstattung';
$_['text_empty_capture']		= 'Bitte geben Sie einen Betrag zur Erfassung';

$_['btn_refund']				= 'Rückerstattung';
$_['btn_capture']				= 'Erfassen';

// Validation Error codes
$_['text_card_message_V6000']	= 'Undefinierter Validierungs Fehler';
$_['text_card_message_V6001'] 	= 'Ungültige Kunden-IP';
$_['text_card_message_V6002'] 	= 'Ungültige DeviceID';
$_['text_card_message_V6011'] 	= 'Ungültiger Betrag';
$_['text_card_message_V6012'] 	= 'Ungültige Rechnungs Beschreibung';
$_['text_card_message_V6013'] 	= 'Ungültige Rechnungsnummer';
$_['text_card_message_V6014'] 	= 'Ungültiger Rechnungs Bezug';
$_['text_card_message_V6015'] 	= 'Ungültiger Währungs Code';
$_['text_card_message_V6016'] 	= 'Zahlung erforderlich';
$_['text_card_message_V6017'] 	= 'Zahlungs Währungscode erforderlich';
$_['text_card_message_V6018'] 	= 'Unbekannter Zahlungs Währungs Code';
$_['text_card_message_V6021'] 	= 'Name des Karteninhabers erforderlich';
$_['text_card_message_V6022'] 	= 'Erforderliche Kartennummer';
$_['text_card_message_V6023'] 	= 'CVN erforderlich';
$_['text_card_message_V6031'] 	= 'Ungültige Kartennummer';
$_['text_card_message_V6032'] 	= 'Ungültiges CVN';
$_['text_card_message_V6033'] 	= 'Ungültiges Verfallsdatum';
$_['text_card_message_V6034'] 	= 'Ungültige Ausgabe Nummer';
$_['text_card_message_V6035'] 	= 'Ungültiges Start Datum';
$_['text_card_message_V6036'] 	= 'Ungültiger Monat';
$_['text_card_message_V6037'] 	= 'Ungültiges Jahr';
$_['text_card_message_V6040'] 	= 'Ungültige Token-Kunden-ID';
$_['text_card_message_V6041'] 	= 'Kunden benötigte';
$_['text_card_message_V6042'] 	= 'Kunden Vorname erforderlich';
$_['text_card_message_V6043'] 	= 'Nachname des Kunden erforderlich';
$_['text_card_message_V6044'] 	= 'Kundenländer Code erforderlich';
$_['text_card_message_V6045'] 	= 'Kunden Titel erforderlich';
$_['text_card_message_V6046'] 	= 'Token Customer ID erforderlich';
$_['text_card_message_V6047'] 	= 'RedirectURL erforderlich';
$_['text_card_message_V6051'] 	= 'Ungültiger Vorname';
$_['text_card_message_V6052'] 	= 'Ungültiger Nachname';
$_['text_card_message_V6053'] 	= 'Ungültiger Länder Code';
$_['text_card_message_V6054'] 	= 'Ungültige e-Mail';
$_['text_card_message_V6055'] 	= 'Ungültiges Telefon';
$_['text_card_message_V6056'] 	= 'Ungültiges Handy';
$_['text_card_message_V6057'] 	= 'Ungültiges Fax';
$_['text_card_message_V6058'] 	= 'Ungültiger Titel';
$_['text_card_message_V6059'] 	= 'URL ungültig';
$_['text_card_message_V6060'] 	= 'URL ungültig';
$_['text_card_message_V6061'] 	= 'Ungültigen Verweis';
$_['text_card_message_V6062'] 	= 'Ungültiger Firmen Name';
$_['text_card_message_V6063'] 	= 'Ungültige Stellenbeschreibung';
$_['text_card_message_V6064'] 	= 'Ungültig Street1';
$_['text_card_message_V6065'] 	= 'Ungültig Street2';
$_['text_card_message_V6066'] 	= 'Ungültige Stadt';
$_['text_card_message_V6067'] 	= 'Ungültigen Zustand';
$_['text_card_message_V6068'] 	= 'Ungültiger PostalCode';
$_['text_card_message_V6069'] 	= 'Ungültige e-Mail';
$_['text_card_message_V6070'] 	= 'Ungültiges Telefon';
$_['text_card_message_V6071'] 	= 'Ungültiges Handy';
$_['text_card_message_V6072'] 	= 'Ungültige Kommentare';
$_['text_card_message_V6073'] 	= 'Ungültiges Fax';
$_['text_card_message_V6074'] 	= 'Ungültige URL';
$_['text_card_message_V6075'] 	= 'Ungültige Versandadresse Vorname';
$_['text_card_message_V6076'] 	= 'Ungültige Versandadresse Nachname';
$_['text_card_message_V6077'] 	= 'Ungültige Versandadresse Street1';
$_['text_card_message_V6078'] 	= 'Ungültige Versandadresse Street2';
$_['text_card_message_V6079'] 	= 'Ungültige Versandadresse Stadt';
$_['text_card_message_V6080'] 	= 'Ungültiger Versandadresse Zustand';
$_['text_card_message_V6081'] 	= 'Ungültige Versandadresse PostalCode';
$_['text_card_message_V6082'] 	= 'Ungültige Versandadresse e-Mail';
$_['text_card_message_V6083'] 	= 'Ungültiges Versandadresse Telefon';
$_['text_card_message_V6084'] 	= 'Ungültiges Versandadresse Land';
$_['text_card_message_V6091'] 	= 'Unbekannter Landesvorwahl';
$_['text_card_message_V6100'] 	= 'Ungültiger Karten Name';
$_['text_card_message_V6101'] 	= 'Ungültige Karte Auslauf Monat';
$_['text_card_message_V6102'] 	= 'Ungültige Karte Auslauf Jahr';
$_['text_card_message_V6103'] 	= 'Ungültiger Karten Start Monat';
$_['text_card_message_V6104'] 	= 'Ungültiges Karten Startjahr';
$_['text_card_message_V6105'] 	= 'Ungültige Karten Ausgabe Nummer';
$_['text_card_message_V6106'] 	= 'Ungültige Karte CVN';
$_['text_card_message_V6107'] 	= 'Ungültigen accesscode';
$_['text_card_message_V6108'] 	= 'Ungültiges customerhostaddress';
$_['text_card_message_V6109'] 	= 'Ungültiger UserAgent';
$_['text_card_message_V6110'] 	= 'Ungültige Kartennummer';
$_['text_card_message_V6111'] 	= 'Unerlaubter API-Zugriff, Konto nicht PCI-zertifiziert';
$_['text_card_message_V6112'] 	= 'Redundante Kartendaten außer Ablauf Jahr und Monat';
$_['text_card_message_V6113'] 	= 'Ungültige Transaktion zur Rückerstattung';
$_['text_card_message_V6114'] 	= 'Gateway Validation Fehler';
$_['text_card_message_V6115'] 	= 'Ungültige directrefundrequest, Transaction ID';
$_['text_card_message_V6116'] 	= 'Ungültige Kartendaten auf Original TransactionId';
$_['text_card_message_V6124'] 	= 'Ungültigen Linien. Die linienposten wurden zur Verfügung gestellt, aber die Gesamtsumme entspricht nicht dem TotalAmount-Feld';
$_['text_card_message_V6125'] 	= 'Ausgewählter Zahlentyp nicht aktiviert';
$_['text_card_message_V6126'] 	= 'Ungültige verschlüsselte Kartennummer, Entschlüsselung gescheitert';
$_['text_card_message_V6127'] 	= 'Ungültiges verschlüsseltes CVN, Entschlüsselung gescheitert';
$_['text_card_message_V6128'] 	= 'Ungültige Methode zur Zahlungsart';
$_['text_card_message_V6129'] 	= 'Transaktion wurde nicht zur Erfassung/Stornierung zugelassen';
$_['text_card_message_V6130'] 	= 'Generischer Kunden Informations Fehler';
$_['text_card_message_V6131'] 	= 'Generischer Versand Informations Fehler';
$_['text_card_message_V6132'] 	= 'Transaktion ist bereits abgeschlossen oder entfällt, Betrieb nicht erlaubt';
$_['text_card_message_V6133'] 	= 'Kasse nicht für Zahlungsart verfügbar';
$_['text_card_message_V6134'] 	= 'Ungültige auth-Transaktionsnummer zur Erfassung/leere';
$_['text_card_message_V6135'] 	= 'PayPal Fehler Bearbeitung Rückerstattung';
$_['text_card_message_V6140'] 	= 'Händlerkonto wird suspendiert';
$_['text_card_message_V6141'] 	= 'Ungültige Paypal-Kontodaten oder API-Signatur';
$_['text_card_message_V6142'] 	= 'Genehmigung nicht für Bank/Filiale verfügbar';
$_['text_card_message_V6150'] 	= 'Ungültiger Erstattungsbetrag';
$_['text_card_message_V6151'] 	= 'Erstattungsbetrag größer als die ursprüngliche Transaktion';
$_['text_card_message_D4406'] 	= 'Unbekannter Fehler';
$_['text_card_message_S5010'] 	= 'Unbekannter Fehler';