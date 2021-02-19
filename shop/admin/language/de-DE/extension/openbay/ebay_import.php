<?php
// Heading
$_['heading_title']              = 'Artikel Import';
$_['text_openbay']               = 'Openbay pro';
$_['text_ebay']                  = 'Ebay';

// Text
$_['text_sync_import_line1']     = '<strong>Vorsicht!</strong> Dies wird alle Ihre eBay-Produkte importieren und eine Kategorienstruktur in Ihrem Geschäft erstellen. Es wird empfohlen, dass Sie alle Kategorien und Produkte löschen, bevor Sie diese Option ausführen. <br />Die Kategorie Struktur ist von den normalen eBay-Kategorien, nicht Ihre Shop-Kategorien (wenn Sie einen eBay-Shop haben). Sie können die importierten Kategorien umbenennen, entfernen und bearbeiten, ohne Ihre eBay-Produkte zu beeinträchtigen.';
$_['text_sync_import_line3']     = 'Sie müssen sicherstellen, dass Ihr Server große Post-Datengrößen akzeptieren und verarbeiten kann. 1000 eBay-Artikel ist etwa 40MB groß, müssen Sie berechnen, was Sie benötigen. Wenn Ihr Anruf ausfällt, ist es wahrscheinlich, dass Ihre Einstellung zu klein ist. Ihr PHP-Speicherlimit muss etwa 128MB betragen.';
$_['text_sync_server_size']      = 'Zur Zeit kann Ihr Server akzeptieren: ';
$_['text_sync_memory_size']      = 'Ihr PHP-Speicherlimit: ';
$_['text_import_confirm']		 = 'Dies wird alle Ihre eBay-Artikel als neue Produkte importieren, sind Sie sicher? Das kann man nicht rückgängig gemacht werden! Stellen Sie sicher, dass Sie zuerst ein Backup haben!';
$_['text_import_notify']		 = 'Ihr Import Antrag wurde zur Bearbeitung zugestellt. Ein Import dauert etwa 1 Stunde pro 1000 Artikel.';
$_['text_import_images_msg1']    = 'Bilder sind bis zum Import/Copy von eBay. Aktualisieren Sie diese Seite, wenn die Zahl nicht abnimmt, dann';
$_['text_import_images_msg2']    = 'Hier klicken';
$_['text_import_images_msg3']    = 'und warten. Weitere Informationen darüber, warum das passiert ist, finden Sie <a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=8_45" target="_blank">Hier</a>';

// Entry
$_['entry_import_item_advanced'] = 'Erhalten Sie erweiterte Daten';
$_['entry_import_categories']    = 'Import Kategorien';
$_['entry_import_description']	 = 'Artikelbeschreibungen importieren';
$_['entry_import']				 = 'EBay-Artikel Importieren';

// Buttons
$_['button_import']				 = 'Importieren';
$_['button_complete']			 = 'Vollständige';

// Help
$_['help_import_item_advanced']  = 'Bis zu 10-mal länger dauern wird, um Artikel zu importieren. Importiert Gewichte, Größen, ISBN und mehr, wenn vorhanden';
$_['help_import_categories']     = 'Baut eine Kategoriestruktur in Ihrem Geschäft aus den eBay-Kategorien';
$_['help_import_description']    = 'Dies wird alles importieren, einschließlich HTML, Besuchs Zähler usw.';

// Error
$_['error_import']               = 'Nicht geladen';
$_['error_maintenance']			 = 'Ihr Geschäft befindet sich im Wartungsmodus. Der Import wird scheitern!';
$_['error_ajax_load']			 = 'Keine Verbindung zum Server';
$_['error_validation']			 = 'Sie müssen sich für Ihr API-Token registrieren und das Modul aktivieren.';