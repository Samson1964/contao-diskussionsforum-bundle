<?php

declare(strict_types=1);

/*
 * Dieses Bundle stellt ein Diskussionsforum fuer Contao 4.13 bereit.
 *
 * @license LGPL-3.0-or-later
 */

/*
 * Tabelle tl_diskussionsforum
 *
 * Haupttabelle des Forums. Sie bildet die Kategorien als selbstreferenzierende
 * Baumstruktur ab (Sortier-Modus 5, analog zur Seitenstruktur tl_page). Jede
 * Kategorie kann Unterkategorien besitzen und ist ueber die Kindtabelle
 * tl_diskussionsforum_themen mit ihren Themen verknuepft (ctable).
 */
$GLOBALS['TL_DCA']['tl_diskussionsforum'] = array
(
    'config' => array
    (
        'dataContainer'    => 'Table',
        'ctable'           => array('tl_diskussionsforum_themen'),
        'enableVersioning' => true,
        'sql' => array
        (
            'keys' => array
            (
                'id'  => 'primary',
                'pid' => 'index',
            ),
        ),
    ),

    'list' => array
    (
        'sorting' => array
        (
            'mode' => 5, // Baumstruktur (eine Tabelle), wie die Seitenstruktur
        ),
        'label' => array
        (
            'fields' => array('title'),
            'format' => '%s',
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
            ),
        ),
        'operations' => array
        (
            'edit' => array
            (
                'href' => 'act=edit',
                'icon' => 'edit.svg',
            ),
            'themen' => array
            (
                // Wechselt in die Kindtabelle und zeigt die Themen dieser Kategorie
                'href' => 'table=tl_diskussionsforum_themen',
                'icon' => 'articles.svg',
            ),
            'copy' => array
            (
                'href' => 'act=paste&mode=copy',
                'icon' => 'copy.svg',
            ),
            'cut' => array
            (
                'href' => 'act=paste&mode=cut',
                'icon' => 'cut.svg',
            ),
            'delete' => array
            (
                'href'       => 'act=delete',
                'icon'       => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? '') . '\'))return false;Backend.getScrollOffset()"',
            ),
            'show' => array
            (
                'href' => 'act=show',
                'icon' => 'show.svg',
            ),
        ),
    ),

    'palettes' => array
    (
        '__selector__' => array('published'),
        'default'      => '{title_legend},title,alias;{meta_legend},description;{publish_legend},published',
    ),

    'subpalettes' => array
    (
        'published' => 'start,stop',
    ),

    'fields' => array
    (
        'id' => array
        (
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ),
        'pid' => array
        (
            'sql' => "int(10) unsigned NOT NULL default 0",
        ),
        'sorting' => array
        (
            'sql' => "int(10) unsigned NOT NULL default 0",
        ),
        'tstamp' => array
        (
            'sql' => "int(10) unsigned NOT NULL default 0",
        ),
        'title' => array
        (
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) NOT NULL default ''",
        ),
        'alias' => array
        (
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => array('rgxp' => 'alias', 'unique' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) BINARY NOT NULL default ''",
        ),
        'description' => array
        (
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'textarea',
            'eval'      => array('style' => 'height:120px', 'tl_class' => 'clr'),
            'sql'       => "text NULL",
        ),
        'published' => array
        (
            'exclude'   => true,
            'filter'    => true,
            'inputType' => 'checkbox',
            'eval'      => array('doNotCopy' => true, 'submitOnChange' => true),
            'sql'       => "char(1) NOT NULL default ''",
        ),
        'start' => array
        (
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => array('rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'),
            'sql'       => "varchar(10) NOT NULL default ''",
        ),
        'stop' => array
        (
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => array('rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'),
            'sql'       => "varchar(10) NOT NULL default ''",
        ),
    ),
);
