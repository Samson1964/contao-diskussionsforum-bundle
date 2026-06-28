<?php

declare(strict_types=1);

/*
 * Dieses Bundle stellt ein Diskussionsforum fuer Contao 4.13 bereit.
 *
 * @license LGPL-3.0-or-later
 */

/*
 * Tabelle tl_diskussionsforum_themen
 *
 * Kindtabelle des Forums. Sie speichert die Themen, die jeweils ueber das Feld
 * "pid" einer Kategorie aus tl_diskussionsforum zugeordnet sind. Die Anzeige
 * erfolgt als Eltern-Ansicht (Sortier-Modus 4): Beim Aufruf ueber eine Kategorie
 * werden ausschliesslich deren Themen aufgelistet. Eine Filter-, Sortier- und
 * Suchleiste erleichtert das Auffinden einzelner Themen.
 */
$GLOBALS['TL_DCA']['tl_diskussionsforum_themen'] = array
(
    'config' => array
    (
        'dataContainer'    => 'Table',
        'ptable'           => 'tl_diskussionsforum',
        'enableVersioning' => true,
        'sql' => array
        (
            'keys' => array
            (
                'id'    => 'primary',
                'pid'   => 'index',
                'alias' => 'index',
            ),
        ),
    ),

    'list' => array
    (
        'sorting' => array
        (
            'mode'                  => 4, // Eltern-Ansicht (Datensaetze einer Kategorie)
            'fields'                => array('sorting'),
            'headerFields'          => array('title', 'description', 'published', 'tstamp'),
            'panelLayout'           => 'filter;sort,search,limit',
            'child_record_callback' => static function (array $row): string
            {
                $title = htmlspecialchars((string) ($row['title'] ?? ''), ENT_QUOTES);

                // Unveroeffentlichte Themen ausgegraut darstellen
                if (empty($row['published']))
                {
                    return '<div class="tl_content_left"><span class="tl_gray">' . $title . '</span></div>';
                }

                return '<div class="tl_content_left">' . $title . '</div>';
            },
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
            'copy' => array
            (
                'href' => 'act=copy',
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
        'default'      => '{title_legend},title,alias;{meta_legend},author,date;{text_legend},text;{settings_legend},featured;{publish_legend},published',
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
            'sorting'   => true,
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
        'author' => array
        (
            'exclude'    => true,
            'filter'     => true,
            'sorting'    => true,
            'flag'       => 11,
            'inputType'  => 'select',
            'foreignKey' => 'tl_user.name',
            'eval'       => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'),
            'sql'        => "int(10) unsigned NOT NULL default 0",
            'relation'   => array('type' => 'hasOne', 'load' => 'lazy'),
        ),
        'date' => array
        (
            'exclude'   => true,
            'filter'    => true,
            'sorting'   => true,
            'flag'      => 6,
            'inputType' => 'text',
            'eval'      => array('rgxp' => 'date', 'datepicker' => true, 'tl_class' => 'w50 wizard'),
            'sql'       => "varchar(10) NOT NULL default ''",
        ),
        'text' => array
        (
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'textarea',
            'eval'      => array('rte' => 'tinyMCE', 'tl_class' => 'clr'),
            'sql'       => "text NULL",
        ),
        'featured' => array
        (
            'exclude'   => true,
            'filter'    => true,
            'inputType' => 'checkbox',
            'eval'      => array('tl_class' => 'w50 m12'),
            'sql'       => "char(1) NOT NULL default ''",
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
