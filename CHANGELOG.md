# Diskussionsforum Changelog

## Version 0.0.1 (2026-06-28)

* Initiale Version
* Bundle-Grundgerüst: `composer.json` (Typ `contao-bundle`), Haupt-Bundle-Klasse und Contao-Manager-Plugin zur automatischen Erkennung
* DependencyInjection-Extension zum Laden der `services.yaml`
* Service-Konfiguration (`services.yaml`) mit aktivem Autowiring/Autoconfiguration
* DCA `tl_diskussionsforum` (Forum-Kategorien) als Baumstruktur (Sortier-Modus 5, analog zur Seitenstruktur); über `ctable` mit der Themen-Tabelle verknüpft; Felder: Bezeichnung, Alias, Beschreibung, Veröffentlichung mit Zeitsteuerung (Start/Stopp)
* DCA `tl_diskussionsforum_themen` (Forum-Themen) als Kindtabelle in Eltern-Ansicht (Sortier-Modus 4, über `pid`/`ptable` an die Kategorie gebunden); Felder: Titel, Alias, Autor (Verweis auf `tl_user`), Datum, Text (Rich-Text), Angeheftet, Veröffentlichung mit Zeitsteuerung
* Filter-, Sortier- und Suchleiste für die Themen (Autor, Datum, Status, Hervorhebung); unveröffentlichte Themen werden ausgegraut dargestellt
* Deutsche Sprachdateien für beide Tabellen (Feld-Labels, Legenden, Schaltflächen)
* Backend-Modul „Forum" in eigener Modulgruppe „Diskussionsforum" (`BE_MOD` in `config.php`) inklusive Icon; verwaltet die Kategorien- und die Themen-Tabelle

### Offen / nächste Schritte

* Automatische Alias-Erzeugung aus dem Titel (über einen getaggten Callback-Service gemäß CLAUDE.md)
* Frontend-Ausgabe des Forums
