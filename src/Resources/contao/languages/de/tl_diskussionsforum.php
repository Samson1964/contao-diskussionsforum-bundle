<?php

declare(strict_types=1);

/*
 * Dieses Bundle stellt ein Diskussionsforum fuer Contao 4.13 bereit.
 *
 * @license LGPL-3.0-or-later
 */

/*
 * Deutsche Sprachdatei der Tabelle tl_diskussionsforum (Forum-Kategorien).
 */

// Felder
$GLOBALS['TL_LANG']['tl_diskussionsforum']['title']       = array('Bezeichnung', 'Geben Sie die Bezeichnung der Kategorie ein.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['alias']       = array('Alias', 'Der Alias ist eine eindeutige Referenz, die anstelle der numerischen ID aufgerufen werden kann.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['description'] = array('Beschreibung', 'Geben Sie eine optionale Beschreibung der Kategorie ein.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['published']   = array('Kategorie veröffentlichen', 'Die Kategorie im Forum sichtbar schalten.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['start']       = array('Anzeigen ab', 'Die Kategorie erst ab diesem Tag anzeigen.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['stop']        = array('Anzeigen bis', 'Die Kategorie nur bis zu diesem Tag anzeigen.');

// Legenden
$GLOBALS['TL_LANG']['tl_diskussionsforum']['title_legend']   = 'Titel und Alias';
$GLOBALS['TL_LANG']['tl_diskussionsforum']['meta_legend']    = 'Beschreibung';
$GLOBALS['TL_LANG']['tl_diskussionsforum']['publish_legend'] = 'Veröffentlichung';

// Schaltflächen
$GLOBALS['TL_LANG']['tl_diskussionsforum']['new']    = array('Neue Kategorie', 'Eine neue Kategorie anlegen.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['edit']   = array('Kategorie bearbeiten', 'Kategorie ID %s bearbeiten.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['themen'] = array('Themen verwalten', 'Themen der Kategorie ID %s verwalten.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['copy']   = array('Kategorie kopieren', 'Kategorie ID %s kopieren.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['cut']    = array('Kategorie verschieben', 'Kategorie ID %s verschieben.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['delete'] = array('Kategorie löschen', 'Kategorie ID %s löschen.');
$GLOBALS['TL_LANG']['tl_diskussionsforum']['show']   = array('Kategoriedetails', 'Details der Kategorie ID %s anzeigen.');
