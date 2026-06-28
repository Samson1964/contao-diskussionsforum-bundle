<?php

declare(strict_types=1);

/*
 * Dieses Bundle stellt ein Diskussionsforum fuer Contao 4.13 bereit.
 *
 * @license LGPL-3.0-or-later
 */

/*
 * Backend-Modul registrieren
 *
 * Legt die eigene Backend-Modulgruppe "diskussionsforum" mit dem Modul "forum"
 * an. Das Modul verwaltet die Kategorien (tl_diskussionsforum) als Einstiegs-
 * punkt sowie deren Themen (tl_diskussionsforum_themen). Beide Tabellen muessen
 * aufgefuehrt sein, damit der Wechsel von einer Kategorie zu ihren Themen
 * (Schaltflaeche "Themen verwalten") erlaubt ist.
 */
$GLOBALS['BE_MOD']['diskussionsforum']['forum'] = array
(
    'tables' => array('tl_diskussionsforum', 'tl_diskussionsforum_themen'),
    'icon'   => 'bundles/schachbullecontaodiskussionsforum/icons/forum.svg',
);
