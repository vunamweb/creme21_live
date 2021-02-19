<?php
  // Session starten (auch wenn vorher schonmal vorhanden)
  session_start();
  // Leeren des Wertes in der Session
  unset($_SESSION['captchacode']);

  // Zeichen, die der Captchacode enthalten darf
  $moeglicheZeichen = "abcdefghikmnpqrstuvwxy123456789";
  // Anzahl der Zeichen, die der Captchacode enthalten soll
  $anzahlZeichen = 4;

  // Definieren der Captchacode-Variable und "vorsorgliches" Leeren
  $captchacode = "";

  // F�llen der Captchacode-Variable mit der festgelegten Anzahl zuf�lliger Zeichen
  for($i = 0; $i < $anzahlZeichen; $i++)
    {
      $captchacode .= substr($moeglicheZeichen, (rand()%(strlen($moeglicheZeichen))), 1);
    }

  // Schreiben des Captchacodes in die Session
  $_SESSION['evC'] = '#/-'.$captchacode.'-Uhgtf';

  // Dem Browser vormachen, das Dokument w�re eine .jpg-Datei (Bildtyp)
  header('Content-type: image/jpg');

  // Ein Bild aus einem vorhandenem Bild erstellen
  $img = ImageCreateFromJPEG('images/xxxx.jpg');

  // Festlegen einer Farbe f�r die Schrift (mit Zufallswerten)
  $farbe = ImageColorAllocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
//  $farbe = ImageColorAllocate($img, 255, 255, 255);
  // Bestimmen der Schriftart relativ zum Dokumentroot
  $ttf = "fonts/arial.ttf";
  // Schriftgr��e
  $groesse = 13;
  // Winkel der Schrift (Zufallswert)
  $winkel = rand(0, 3);
  // Horizontale Position (Zufallswert)
  $x = rand(5, 20);
  // Vertikale Position (Schriftgr��e + Abstand zum Rand)
  $y = 16;

  // Belegen des Hintergrundbildes mit dem Code
  imagettftext($img, $groesse, $winkel, $x, $y, $farbe, $ttf, $captchacode);
  // Ausgabe des fertigen Bildes
  imagejpeg($img);
  // L�schen des Bildes aus dem Zwischenspeicher
  imagedestroy($img);

?>