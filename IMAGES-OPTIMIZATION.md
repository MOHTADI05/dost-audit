# Bilder optimieren (Lighthouse: „Improve image delivery“)

## WebP für die Hero-Bild (größter Effekt)

Die Seite nutzt für das Hero-Bild bereits `<picture>` mit WebP. Sobald die WebP-Datei existiert, wird sie in unterstützenden Browsern geladen (ca. 742 KiB Ersparnis).

**So erzeugst du die WebP-Datei:**

1. Gehe zu [Squoosh](https://squoosh.app/) oder [TinyPNG](https://tinypng.com/).
2. Lade **images/SITUATION-2-2.jpg** hoch.
3. Exportiere bzw. konvertiere nach **WebP** (Qualität z. B. 80–85 %).
4. Speichere die Datei als **images/SITUATION-2-2.webp** im Projekt und lade sie auf den Server in `~/www/images/` hoch.

Ohne diese Datei bleibt das JPG Fallback aktiv – die Seite funktioniert wie bisher.

## Optional: Weitere Bilder als WebP

Du kannst für **Myriam-3.jpg**, **Nuno DA SILVA .jpg**, **Birkan CETIN.jpg** und **logo.png** ebenfalls WebP-Versionen anlegen und im HTML per `<picture>` einbinden, um noch mehr zu sparen.

## decoding="async"

Alle `<img>` haben jetzt `decoding="async"`, damit das Dekodieren der Bilder den Haupt-Thread weniger blockiert.
